<?php
/**
 * WorkTest.php
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Result;

/**
 * WorkTest
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainzTest\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class WorkTest extends \PHPUnit_Framework_TestCase
{
    
    protected function getAdapter()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-04T13:23:02.571Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><work-list count="177" offset="0"><work id="2e9136a2-90a9-3144-b4c1-8aba75b8e459" type="Song" ext:score="77"><title>Ain’t No Sunshine</title><language>eng</language><alias-list><alias>Ain\'t No Sunshine When She\'s Gone</alias><alias>Ain\'t No Sunshine (extended mix)</alias><alias>Ain\'t No Sunshine (4 the Cause version)</alias><alias>Ain\'t No Sunshine (Groove-Co dub)</alias></alias-list><relation-list target-type="artist"><relation type="composer"><direction>backward</direction><artist id="fd1a2d9d-9bb6-44de-83a3-41560658aba9"><name>Bill Withers</name><sort-name>Withers, Bill</sort-name></artist></relation><relation type="lyricist"><direction>backward</direction><artist id="fd1a2d9d-9bb6-44de-83a3-41560658aba9"><name>Bill Withers</name><sort-name>Withers, Bill</sort-name></artist></relation></relation-list></work></work-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);
        
        $domElement = $xpath->query('/ns:metadata/ns:work-list/ns:work')->item(0);
        
        $adapter = new \MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter($domElement);
        
        return $adapter;
    }
    
    /**
     * Test that we can construct an instance of \MphpMusicBrainz\Result\Work
     * 
     * @covers MphpMusicBrainz\Result\Work::__construct()
     */
    public function testCanConstructInstance()
    {
        $work = new \MphpMusicBrainz\Result\Work($this->getAdapter());
        
        $this->assertInstanceOf('MphpMusicBrainz\Result\Work', $work);
    }
    
    
}

