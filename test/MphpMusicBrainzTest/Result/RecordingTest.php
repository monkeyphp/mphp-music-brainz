<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MphpMusicBrainzTest\Result;

/**
 * Description of RecordingTest
 *
 * @author David White [monkeyphp] <david@monkeyphp.com>
 */
class RecordingTest extends \PHPUnit_Framework_TestCase
{

    protected function getAdapter()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-25T11:50:48.136Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><recording-list count="526460" offset="0"><recording id="ca1c3a57-077f-4678-b9ce-edc595b82ec4" ext:score="100"><title>We Will Rock You</title><length>170786</length><disambiguation>live, 2002-01: Le Dome, Marseille</disambiguation><artist-credit><name-credit joinphrase=""><artist id="03f6d51c-1682-4978-bfc5-4bf2d2de98ad"><name>Les Enfoirés</name><sort-name>Enfoirés, Les</sort-name><disambiguation></disambiguation></artist></name-credit></artist-credit><release-list><release id="cdc562e8-dc31-468b-a8c6-85ef134418c0"><title>Tous dans le même bateau</title><status>Official</status><release-group id="ed41d9a5-58e5-3906-9710-4f95a950e382" type="Live"><primary-type>Album</primary-type><secondary-type-list><secondary-type>Live</secondary-type></secondary-type-list></release-group><date>2002-02-26</date><country>FR</country><medium-list><track-count>25</track-count><medium><position>1</position><format>CD</format><track-list count="18" offset="14"><track><number>15</number><title>We Will Rock You</title><length>170786</length></track></track-list></medium></medium-list></release></release-list><puid-list><puid id="865c828b-cb49-5273-5ec2-fa933c37d399"/><puid id="fe0e7fd9-f99b-281b-2119-f6363aab441a"/><puid id="fe5a2c88-37ed-cc91-9242-9d25cfb91e59"/></puid-list><isrc-list><isrc id="FRS010200160"/></isrc-list></recording></recording-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        $domElement = $xpath->query('/ns:metadata/ns:recording-list/ns:recording')->item(0);

        $adapter = new \MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter($domElement);
        
        return $adapter;
    }
    
    /**
     * Test that we can construct an instance of Recording
     * 
     * @covers MphpMusicBrainz\Result\Recording::__construct()
     */
    public function testCanConstructInstance()
    {
        $recording = new \MphpMusicBrainz\Result\Recording($this->getAdapter());
        
        $this->assertInstanceOf('MphpMusicBrainz\Result\Recording', $recording);
    }
    
    /**
     * Test that we can retrieve the Recording Artist property
     *
     * <artist id="03f6d51c-1682-4978-bfc5-4bf2d2de98ad">
     *  <name>Les Enfoirés</name>
     *  <sort-name>Enfoirés, Les</sort-name>
     *  <disambiguation></disambiguation>
     * </artist>
     *
     * @covers MphpMusicBrainz\Result\Recording::getArtist
     */
    public function testGetArtist()
    {
        $recording = new \MphpMusicBrainz\Result\Recording($this->getAdapter());

        $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $recording->getArtist());
        $this->assertEquals('03f6d51c-1682-4978-bfc5-4bf2d2de98ad', $recording->getArtist()->getId());
    }

    /**
     * Test that we can retrieve the Recording title property
     *
     * @covers MphpMusicBrainz\Result\Recording::getTitle
     */
    public function testGetTitle()
    {
        $recording = new \MphpMusicBrainz\Result\Recording($this->getAdapter());

        $this->assertEquals("We Will Rock You", $recording->getTitle());
    }

    /**
     * Test that we can retrieve the Recording disambiguation value
     * 
     * @covers MphpMusicBrainz\Result\Recording::getDisambiguation
     */
    public function testGetDisambiguation()
    {
        $recording = new \MphpMusicBrainz\Result\Recording($this->getAdapter());

        $this->assertSame('live, 2002-01: Le Dome, Marseille', $recording->getDisambiguation());
    }

    /**
     * Test that we can retrieve an SplFixedArray instance containing ISRC 
     * values
     * 
     * <isrc-list><isrc id="FRS010200160"/></isrc-list>
     * 
     * @covers MphpMusicBrainz\Result\Recording::getIsrcList
     */
    public function testGetIsrcList()
    {
        $recording = new \MphpMusicBrainz\Result\Recording($this->getAdapter());
        
        $isrcList = $recording->getIsrcList();
        $this->assertInstanceOf('SplFixedArray', $isrcList);
    }

    /**
     * Test that we can retrieve the length property of the Recording
     * 
     * @covers MphpMusicBrainz\Result\Recording::getLength
     */
    public function testGetLength()
    {
        $recording = new \MphpMusicBrainz\Result\Recording($this->getAdapter());
        
        $this->assertEquals('170786', $recording->getLength());
    }

    /**
     * <puid-list>
     * <puid id="865c828b-cb49-5273-5ec2-fa933c37d399"/>
     * <puid id="fe0e7fd9-f99b-281b-2119-f6363aab441a"/>
     * <puid id="fe5a2c88-37ed-cc91-9242-9d25cfb91e59"/>
     * </puid-list>
     * 
     * @covers MphpMusicBrainz\Result\Recording::getPuidList
     */
    public function testGetPuidList()
    {
        $recording = new \MphpMusicBrainz\Result\Recording($this->getAdapter());
        
        $puidList = $recording->getPuidList();
        
        $this->assertInstanceOf('SplFixedArray', $puidList);
        
        $this->assertEquals(3, $puidList->count());
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
     * @covers MphpMusicBrainz\Result\Recording::getReleaseList
     */
    public function testGetReleaseList()
    {
        $recording = new \MphpMusicBrainz\Result\Recording($this->getAdapter());
        
        $releaseList = $recording->getReleaseList();
        
        $this->assertInstanceOf('SplFixedArray', $releaseList);
        $this->assertEquals(1, $releaseList->count());
    }

}