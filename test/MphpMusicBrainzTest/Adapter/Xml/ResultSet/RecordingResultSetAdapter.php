<?php
/**
 * RecordingResultSetAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Adapter\Xml\ResultSet;
/**
 * RecordingResultSetAdapter
 *
 * @package    MphpMusicBrainz
 * @subpackage Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class RecordingResultSetAdapter extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Xml string representing a response from the webservice
     * 
     * @var string
     */
    protected $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-28T09:52:16.169Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><recording-list count="6378" offset="0"><recording id="b4ee83d8-3b33-47cc-b154-e498df2e6c08" ext:score="100"><title>Metal</title><length>207333</length><artist-credit><name-credit joinphrase=""><artist id="6cb79cb2-9087-44d4-828b-5c6fdff2c957"><name>Gary Numan</name><sort-name>Numan, Gary</sort-name><disambiguation></disambiguation></artist></name-credit></artist-credit><release-list><release id="4fc59ca1-79ef-4311-a286-f07f436b7c85"><title>The Best of Gary Numan</title><status>Official</status><release-group id="4050bd96-0da6-3f41-aeea-0a2258f5e509" type="Compilation"><primary-type>Album</primary-type><secondary-type-list><secondary-type>Compilation</secondary-type></secondary-type-list></release-group><medium-list><track-count>34</track-count><medium><position>2</position><track-list count="17" offset="11"><track><number>12</number><title>Metal</title><length>207333</length></track></track-list></medium></medium-list></release><release id="0994c819-8955-443b-89f2-d5e872b59230"><title>Exposure: The Best of Gary Numan 1977-2002</title><status>Official</status><release-group id="d60216cd-e6e1-3aba-8ace-568595828d4e" type="Compilation"><primary-type>Album</primary-type><secondary-type-list><secondary-type>Compilation</secondary-type></secondary-type-list></release-group><date>2002-05-20</date><country>GB</country><medium-list><track-count>29</track-count><medium><position>1</position><format>CD</format><track-list count="14" offset="7"><track><number>8</number><title>Metal</title><length>209533</length></track></track-list></medium></medium-list></release></release-list><puid-list><puid id="2f433b35-ada0-db8f-8ea7-fd39bb1cd41c"/><puid id="713b41b4-a702-49e0-5163-aa1f9276da13"/></puid-list></recording><recording id="ce765e8b-2828-41e8-a23f-9a981f2b516c" ext:score="100"><title>Metal</title><length>308173</length><artist-credit><name-credit joinphrase=""><artist id="9c79224c-70cd-4367-8d90-35ca99401b75"><name>Blue</name><sort-name>Blue</sort-name><disambiguation>UK boy band</disambiguation></artist></name-credit></artist-credit><release-list><release id="8643c906-3475-474a-b410-69a6c541a7d2"><title>Mexican Church</title><status>Official</status><release-group id="7d17c8b9-08c1-313d-9e76-6e6fe9c3d9fb" type="Album"><primary-type>Album</primary-type></release-group><medium-list><track-count>12</track-count><medium><position>1</position><track-list count="12" offset="8"><track><number>9</number><title>Metal</title><length>308173</length></track></track-list></medium></medium-list></release></release-list></recording><recording id="cb6fd09b-81f1-4c98-89b1-a6a7d8bca824" ext:score="100"><title>Metal</title><length>212933</length><artist-credit><name-credit joinphrase=""><artist id="6cb79cb2-9087-44d4-828b-5c6fdff2c957"><name>Gary Numan</name><sort-name>Numan, Gary</sort-name><disambiguation></disambiguation></artist></name-credit></artist-credit><release-list><release id="b8aae6ef-aa96-4003-8c7f-fc7f5fc69948"><title>The Pleasure Principle</title><status>Official</status><release-group id="2ba66802-18a7-3bf4-958c-db871a6e7f34" type="Album"><primary-type>Album</primary-type></release-group><date>1979</date><country>US</country><medium-list><track-count>10</track-count><medium><position>1</position><format>Cassette</format><track-list count="10" offset="1"><track><number>A2</number><title>Metal</title><length>214000</length></track></track-list></medium></medium-list></release><release id="779b1bb4-5fa5-401e-a26e-6367920755e4"><title>The Pleasure Principle</title><status>Official</status><release-group id="2ba66802-18a7-3bf4-958c-db871a6e7f34" type="Album"><primary-type>Album</primary-type></release-group><date>1979</date><country>US</country><medium-list><track-count>10</track-count><medium><position>1</position><format>12" Vinyl</format><track-list count="10" offset="1"><track><number>A2</number><title>Metal</title><length>214000</length></track></track-list></medium></medium-list></release><release id="f647050a-8d8b-437c-8a93-7a18480c2834"><title>The Pleasure Principle</title><status>Official</status><release-group id="2ba66802-18a7-3bf4-958c-db871a6e7f34" type="Album"><primary-type>Album</primary-type></release-group><date>1998-06-23</date><country>GB</country><medium-list><track-count>17</track-count><medium><position>1</position><format>CD</format><track-list count="17" offset="1"><track><number>2</number><title>Metal</title><length>212933</length></track></track-list></medium></medium-list></release><release id="e0ea7166-292c-31de-870d-8c4622ec451b"><title>The Pleasure Principle</title><status>Official</status><release-group id="2ba66802-18a7-3bf4-958c-db871a6e7f34" type="Album"><primary-type>Album</primary-type></release-group><date>2009-09-21</date><country>GB</country><medium-list><track-count>45</track-count><medium><position>1</position><format>CD</format><track-list count="10" offset="1"><track><number>2</number><title>Metal</title><length>214000</length></track></track-list></medium></medium-list></release><release id="a3b644af-6ef0-4cbf-a85f-6c979e210238"><title>The Pleasure Principle</title><status>Official</status><release-group id="2ba66802-18a7-3bf4-958c-db871a6e7f34" type="Album"><primary-type>Album</primary-type></release-group><date>1979-09-07</date><country>GB</country><medium-list><track-count>10</track-count><medium><position>1</position><format>12" Vinyl</format><track-list count="10" offset="1"><track><number>2</number><title>Metal</title><length>214000</length></track></track-list></medium></medium-list></release><release id="cb1708e3-e6f8-4e47-8ba1-9756d037d004"><title>The Pleasure Principle / Warriors</title><status>Official</status><release-group id="55c71902-4d2f-3105-8bb6-d84b562dd21b" type="Album"><primary-type>Album</primary-type></release-group><date>1987</date><country>GB</country><medium-list><track-count>16</track-count><medium><position>1</position><format>CD</format><track-list count="16" offset="1"><track><number>2</number><title>Metal</title><length>212800</length></track></track-list></medium></medium-list></release><release id="df198b42-9021-443f-93b7-988721c5366a"><title>The Pleasure Principle</title><status>Official</status><release-group id="2ba66802-18a7-3bf4-958c-db871a6e7f34" type="Album"><primary-type>Album</primary-type></release-group><date>2009-09-22</date><country>US</country><medium-list><track-count>27</track-count><medium><position>1</position><format>CD</format><track-list count="10" offset="1"><track><number>2</number><title>Metal</title><length>214000</length></track></track-list></medium></medium-list></release></release-list><puid-list><puid id="d49b81e2-2ad4-5960-f07b-89a9415047e7"/><puid id="2f433b35-ada0-db8f-8ea7-fd39bb1cd41c"/><puid id="5198c9cb-68d5-7dcd-1c74-463d55af4147"/></puid-list><tag-list><tag count="2"><name>new wave</name></tag><tag count="1"><name>pop/rock</name></tag><tag count="1"><name>synth pop</name></tag><tag count="1"><name>punk/new wave</name></tag><tag count="2"><name>new romantic</name></tag></tag-list></recording></recording-list></metadata>';
    
    /**
     * Test that we can construct an instance of RecordingResultSetAdapter
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\RecordingResultSetAdapter::__construct()
     */
    public function testCanConstructInstance()
    {
        $recordingResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\RecordingResultSetAdapter($this->xml);
        
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\RecordingResultSetAdapter', $recordingResultSetAdapter);
    }
    
    /**
     * Test that we can retrieve an instance of \MphpMusicBrainz\Result\Recording when 
     * we call current
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\RecordingResultSetAdapter::current()
     */
    public function testCurrent()
    {
        $recordingResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\RecordingResultSetAdapter($this->xml);
        
        $recording = $recordingResultSetAdapter->current();
        
        $this->assertInstanceOf('MphpMusicBrainz\Result\Recording', $recording);
        
        $this->assertEquals('b4ee83d8-3b33-47cc-b154-e498df2e6c08', $recording->getId());
        $this->assertEquals('100', $recording->getScore());
        $this->assertEquals('Metal', $recording->getTitle());
    }
 
}