<?php
/**
 * RecordingResultAdapterTest.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Result\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Adapter\Result\Xml\Result;

/**
 * RecordingResultAdapterTest
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Result\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class RecordingResultAdapterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that we can construct and instance of RecordingResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::__construct()
     */
    public function testCanConstructInstance()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter', $recordingAdapter);
    }

    /**
     * Test that we can retrieve the id from the RecordingResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getId()
     */
    public function testCanGetId()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $this->assertEquals('ca1c3a57-077f-4678-b9ce-edc595b82ec4', $recordingAdapter->getId());
    }

    /**
     * Test that we can retrieve the score from the RecordingResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getScore()
     */
    public function testCanGetScore()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $this->assertEquals('100', $recordingAdapter->getScore());
    }

    /**
     * Test that we can retrieve the Artist from the RecordingResultAdapter
     *
     * <artist id="03f6d51c-1682-4978-bfc5-4bf2d2de98ad">
     *  <name>Les Enfoirés</name>
     *  <sort-name>Enfoirés, Les</sort-name>
     *  <disambiguation></disambiguation>
     * </artist>
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getArtist()
     */
    public function testCanGetArtist()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $recordingAdapter->getArtist());
        $this->assertEquals('03f6d51c-1682-4978-bfc5-4bf2d2de98ad', $recordingAdapter->getArtist()->getId());
    }

    /**
     * Test that calling getArtistQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getArtistQuery()
     */
    public function testCanGetArtistQuery()
    {
        $recordingResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($recordingResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getArtistQuery');
        $reflectionGetMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionGetMethod->invoke($recordingResultAdapter));
    }
    
    /**
     * Test that we can retrieve the disambiguation from the RecordingResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getDisambiguation()
     */
    public function testCanGetDisambiguation()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $this->assertSame('live, 2002-01: Le Dome, Marseille', $recordingAdapter->getDisambiguation());
    }
    
    /**
     * Test that calling getDisambiguationQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getDisambiguationQuery()
     */
    public function testCanGetDisambiguationQuery()
    {
        $recordingResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($recordingResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getDisambiguationQuery');
        $reflectionGetMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionGetMethod->invoke($recordingResultAdapter));
    }
    
    /**
     * Test that we can retrieve a Traversable from the RecordingResultAdapter
     * values
     *
     * <isrc-list><isrc id="FRS010200160"/></isrc-list>
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getIsrcList
     */
    public function testCanGetIsrcList()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $isrcList = $recordingAdapter->getIsrcList();

        $this->assertInstanceOf('SplFixedArray', $isrcList);
        $this->assertInstanceOf('Traversable', $isrcList);
    }
    
    /**
     * Test that calling getIsrcListQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getIsrcListQuery()
     */
    public function testCanGetIsrcListQuery()
    {
        $recordingResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($recordingResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getIsrcListQuery');
        $reflectionGetMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionGetMethod->invoke($recordingResultAdapter));
    }
    
    /**
     * Test that we can retrieve the length property of the RecordingResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getLength()
     */
    public function testGetCanLength()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $this->assertEquals('170786', $recordingAdapter->getLength());
    }
    
    /**
     * Test that calling getLengthQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getLengthQuery()
     */
    public function testCanLengthQuery()
    {
        $recordingResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($recordingResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getLengthQuery');
        $reflectionGetMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionGetMethod->invoke($recordingResultAdapter));
    }
    
    /**
     * <puid-list>
     * <puid id="865c828b-cb49-5273-5ec2-fa933c37d399"/>
     * <puid id="fe0e7fd9-f99b-281b-2119-f6363aab441a"/>
     * <puid id="fe5a2c88-37ed-cc91-9242-9d25cfb91e59"/>
     * </puid-list>
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getPuidList()
     */
    public function testCanGetPuidList()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $puidList = $recordingAdapter->getPuidList();

        $this->assertInstanceOf('SplFixedArray', $puidList);
        $this->assertEquals(3, $puidList->count());
    }
    
    /**
     * Test that calling getPuidListQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getPuidListQuery()
     */
    public function testPuidListQuery()
    {
        $recordingResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($recordingResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getPuidListQuery');
        $reflectionGetMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionGetMethod->invoke($recordingResultAdapter));
    }
    
    /**
     *  <release-list>
     *      <release id="cdc562e8-dc31-468b-a8c6-85ef134418c0">
     *          <title>Tous dans le même bateau</title>
     *          <status>Official</status>
     *          <release-group id="ed41d9a5-58e5-3906-9710-4f95a950e382" type="Live">
     *              <primary-type>Album</primary-type>
     *              <secondary-type-list>
     *                  <secondary-type>Live</secondary-type>
     *              </secondary-type-list>
     *          </release-group>
     *          <date>2002-02-26</date>
     *          <country>FR</country>
     *          <medium-list>
     *              <track-count>25</track-count>
     *              <medium>
     *                  <position>1</position>
     *                  <format>CD</format>
     *                  <track-list count="18" offset="14">
     *                      <track>
     *                          <number>15</number>
     *                          <title>We Will Rock You</title>
     *                          <length>170786</length>
     *                      <track>
     *                  </track-list>
     *              </medium>
     *          </medium-list>
     *      </release>
     *  </release-list>
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getReleaseList()
     */
    public function testCanGetReleaseList()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $releaseList = $recordingAdapter->getReleaseList();

        $this->assertInstanceOf('SplFixedArray', $releaseList);
        $this->assertEquals(1, $releaseList->count());
    }
    
    /**
     * Test that calling getReleaseListQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getReleaseListQuery()
     */
    public function testReleaseListQuery()
    {
        $recordingResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($recordingResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getReleaseListQuery');
        $reflectionGetMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionGetMethod->invoke($recordingResultAdapter));
    }
    
    /**
     * Test that we can retrieve the title from the RecordingResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getTitle()
     */
    public function testCanGetTitle()
    {
        $recordingAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());

        $this->assertEquals("We Will Rock You", $recordingAdapter->getTitle());
    }

    /**
     * Test that calling getTitleQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter::getTitleQuery()
     */
    public function testGetTitleQuery()
    {
        $recordingResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($recordingResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getTitleQuery');
        $reflectionGetMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionGetMethod->invoke($recordingResultAdapter));
    }

    /**
     * Utility method for returning a DOMElement
     *
     * @return DOMElement
     */
    protected function getDomElement()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-25T11:50:48.136Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><recording-list count="526460" offset="0"><recording id="ca1c3a57-077f-4678-b9ce-edc595b82ec4" ext:score="100"><title>We Will Rock You</title><length>170786</length><disambiguation>live, 2002-01: Le Dome, Marseille</disambiguation><artist-credit><name-credit joinphrase=""><artist id="03f6d51c-1682-4978-bfc5-4bf2d2de98ad"><name>Les Enfoirés</name><sort-name>Enfoirés, Les</sort-name><disambiguation></disambiguation></artist></name-credit></artist-credit><release-list><release id="cdc562e8-dc31-468b-a8c6-85ef134418c0"><title>Tous dans le même bateau</title><status>Official</status><release-group id="ed41d9a5-58e5-3906-9710-4f95a950e382" type="Live"><primary-type>Album</primary-type><secondary-type-list><secondary-type>Live</secondary-type></secondary-type-list></release-group><date>2002-02-26</date><country>FR</country><medium-list><track-count>25</track-count><medium><position>1</position><format>CD</format><track-list count="18" offset="14"><track><number>15</number><title>We Will Rock You</title><length>170786</length></track></track-list></medium></medium-list></release></release-list><puid-list><puid id="865c828b-cb49-5273-5ec2-fa933c37d399"/><puid id="fe0e7fd9-f99b-281b-2119-f6363aab441a"/><puid id="fe5a2c88-37ed-cc91-9242-9d25cfb91e59"/></puid-list><isrc-list><isrc id="FRS010200160"/></isrc-list></recording></recording-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        $domElement = $xpath->query('/ns:metadata/ns:recording-list/ns:recording')->item(0);
//        var_dump($domElement);
//        echo $domElement->ownerDocument->saveXML($domElement);
        return $domElement;
    }

}