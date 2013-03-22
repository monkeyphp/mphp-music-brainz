<?php
/**
 * LabelTest.php
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
 * LabelTest
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainzTest\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class LabelTest extends \PHPUnit_Framework_TestCase
{
 
    protected function getAdapter()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-04T13:33:48.337Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><label-list count="13" offset="0"><label id="f70c5cab-f703-42c9-8783-b7a4c53f1a73" type="Production" ext:score="100"><name>Yellow Sunshine Explosion Recordings</name><sort-name>Yellow Sunshine Explosion Recordings</sort-name><label-code>2323</label-code><country>GB</country><life-span><begin>2001</begin><ended>false</ended></life-span><alias-list><alias>Yellow Sunshine Explosion</alias></alias-list></label></label-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);
        
        $domElement = $xpath->query('/ns:metadata/ns:label-list/ns:label')->item(0);
        
        $adapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($domElement);
        
        return $adapter;
    }
    
    /**
     * Test that we can construct an instance of MphpMusicBrainz\Result\Label
     * 
     * @covers MphpMusicBrainz\Result\Label::__construct()
     */
    public function testCanConstructInstance()
    {
        $label = new \MphpMusicBrainz\Result\Label($this->getAdapter());
        $this->assertInstanceOf('MphpMusicBrainz\Result\Label', $label);
    }
    
}