<?php
/**
 * ReleaseGroupTest.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainzTest\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Result;

/**
 * ReleaseGroupTest
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainzTest\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ReleaseGroupTest extends \PHPUnit_Framework_TestCase
{

    public function getAdapter()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-04T13:27:17.883Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><release-group-list count="593" offset="0"><release-group id="a70665a6-394a-3940-b5c7-f8e272d8a62d" type="Album" ext:score="100"><primary-type>Album</primary-type><title>Sunshine</title><artist-credit><name-credit joinphrase=""><name>S Club 7</name><artist id="c4901095-0bc2-4cea-a8d3-e76de3cc325e"><name>S Club</name><sort-name>S Club</sort-name><disambiguation>formerly "S Club 7"</disambiguation></artist></name-credit></artist-credit><release-list count="3"><release id="f7912309-0665-4136-a999-a3fd4ec04f14"><title>Sunshine</title><status>Official</status></release><release id="8512cd31-c07f-3080-85dc-a143117ee994"><title>Sunshine</title><status>Official</status></release><release id="8de8a91e-ae04-4a59-9cc1-e66aea65253c"><title>Sunshine</title><status>Official</status></release></release-list><tag-list><tag count="1"><name>jazz vocals</name></tag></tag-list></release-group></release-group-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);
        
        $domElement = $xpath->query('/ns:metadata/ns:release-group-list/ns:release-group')->item(0);
        
        $adapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($domElement);
        
        return $adapter;
    }
    
    /**
     * Test that we can construct an instance of MphpMusicBrainz\Result\ReleaseGroup
     * 
     * @covers MphpMusicBrainz\Result\ReleaseGroup::__construct
     */
    public function testCanConstructInstance()
    {
        $releaseGroup = new \MphpMusicBrainz\Result\ReleaseGroup($this->getAdapter());
        
        $this->assertInstanceOf('MphpMusicBrainz\Result\ReleaseGroup', $releaseGroup);
    }
    
}

