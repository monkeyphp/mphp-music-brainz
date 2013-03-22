<?php
/**
 * MusicBrainzTest.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Service
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Service;

/**
 * MusicBrainzTest
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Service
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class MusicBrainzTest extends \PHPUnit_Framework_TestCase
{
    // error message
    protected $errorXml = '<?xml version="1.0" encoding="UTF-8"?><error><text>Not Found</text><text>For usage, please see: http://musicbrainz.org/development/mmd</text></error>';

    // artist
    protected $artistResultSetXml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-28T11:41:24.792Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><artist-list count="1" offset="0"><artist id="65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab" type="Group" ext:score="100"><name>Metallica</name><sort-name>Metallica</sort-name><country>US</country><life-span><begin>1981-10</begin><ended>false</ended></life-span><alias-list><alias>메탈리카</alias><alias>メタリカ</alias><alias>Metalica</alias></alias-list><tag-list><tag count="1"><name>américain</name></tag><tag count="1"><name>usa</name></tag><tag count="2"><name>speed metal</name></tag><tag count="1"><name>douchebag metal</name></tag><tag count="1"><name>american thrash metal</name></tag><tag count="3"><name>rock</name></tag><tag count="1"><name>90s</name></tag><tag count="1"><name>80s</name></tag><tag count="1"><name>seen live</name></tag><tag count="1"><name>rock and indie</name></tag><tag count="10"><name>thrash metal</name></tag><tag count="6"><name>heavy metal</name></tag><tag count="1"><name>thrash</name></tag><tag count="10"><name>metal</name></tag><tag count="1"><name>classic thrash metal</name></tag><tag count="1"><name>classic metal</name></tag><tag count="1"><name>los angeles</name></tag><tag count="1"><name>california</name></tag><tag count="1"><name>bay area</name></tag><tag count="1"><name>80s metal</name></tag><tag count="1"><name>90s metal</name></tag><tag count="1"><name>80s thrash metal</name></tag><tag count="6"><name>american</name></tag><tag count="5"><name>hard rock</name></tag><tag count="1"><name>band</name></tag></tag-list></artist></artist-list></metadata>';

    /**
     * Xml string when calling http://www.musicbrainz.org/ws/2/artist/65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab
     *
     * @var string
     */
    protected $artistResultXml = '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><artist type="Group" id="65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab"><name>Metallica</name><sort-name>Metallica</sort-name><country>US</country><life-span><begin>1981-10</begin></life-span></artist></metadata>';

// release
    protected $releaseXml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-01T09:38:14.088Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><release-list count="68" offset="0"><release id="6e729716-c0eb-3f50-a740-96ac173be50d" ext:score="100"><title>Metallica</title><status>Official</status><text-representation><language>eng</language><script>Latn</script></text-representation><artist-credit><name-credit joinphrase=""><artist id="65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab"><name>Metallica</name><sort-name>Metallica</sort-name><disambiguation></disambiguation></artist></name-credit></artist-credit><release-group id="e8f70201-8899-3f0c-9e07-5d6495bc8046" type="Album"><primary-type>Album</primary-type></release-group><date>2010-09-22</date><country>JP</country><barcode>4988005628664</barcode><asin>B000GALEWC</asin><label-info-list><label-info><catalog-number>UICY-94666</catalog-number><label id="bd86569c-ba94-4e5e-a3c7-9ebd16b59709"><name>Universal Music Japan</name></label></label-info></label-info-list><medium-list count="1"><track-count>13</track-count><medium><format>CD</format><disc-list count="4"/><track-list count="13"/></medium></medium-list></release></release-list></metadata>';

    /**
     * http://www.musicbrainz.org/ws/2/release/af4f69e8-1643-3b5a-94ba-a0269f8e3c77
     *
     * @var string
     */
    protected $releaseResultXml = '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><release id="af4f69e8-1643-3b5a-94ba-a0269f8e3c77"><title>Metallica</title><status>Official</status><quality>normal</quality><text-representation><language>eng</language><script>Latn</script></text-representation><date>2008-11-28</date><country>US</country><barcode>0093624984962</barcode><asin>B001I10ABE</asin><cover-art-archive><artwork>false</artwork><count>0</count><front>false</front><back>false</back></cover-art-archive></release></metadata>';

    // recording
    protected $recordingXml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-01T08:06:37.466Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><recording-list count="110" offset="0"><recording id="649b61dc-6103-4d73-b150-bae6b749996a" ext:score="100"><title>Metallica</title><length>64200</length><artist-credit><name-credit joinphrase=""><artist id="cef4006f-d05e-4fa6-b628-514ef4e1bbbd"><name>PEE</name><sort-name>PEE</sort-name><disambiguation></disambiguation></artist></name-credit></artist-credit><release-list><release id="4b1b22d0-4e4b-4ad9-9616-67e958156bd3"><title>Now, More Charm and More Tender</title><status>Official</status><release-group id="f85e656d-01c1-3102-b0d9-958406f1161a" type="Album"><primary-type>Album</primary-type></release-group><medium-list><track-count>99</track-count><medium><position>1</position><track-list count="99" offset="9"><track><number>10</number><title>Metallica</title><length>64200</length></track></track-list></medium></medium-list></release></release-list></recording></recording-list></metadata>';

    /**
     * http://www.musicbrainz.org/ws/2/recording/ebed15b6-4907-4ae5-8655-2812f74b06f4
     *
     * @var string
     */
    protected $recordingResultXml = '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><recording id="ebed15b6-4907-4ae5-8655-2812f74b06f4"><title>Met</title><length>146493</length></recording></metadata>';

    // label polyphone, limit 1
    protected $labelResultSetXml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-01T10:02:46.780Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><label-list count="1" offset="0"><label id="63bce450-5b45-402b-830d-ac6aaef9f8fc" type="Original Production" ext:score="100"><name>Polyphone</name><sort-name>Polyphone</sort-name><country>GR</country><life-span><ended>false</ended></life-span></label></label-list></metadata>';

    /**
     * http://www.musicbrainz.org/ws/2/label/8f5a79e2-beb1-49d7-9dd4-7fdb24b0564f
     *
     * @var string
     */
    protected $labelResultXml = '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><label type="Reissue Production" id="8f5a79e2-beb1-49d7-9dd4-7fdb24b0564f"><name>Metal Nation</name><sort-name>Metal Nation</sort-name><country>GB</country><life-span><begin>2004</begin></life-span></label></metadata>';

    // http://www.musicbrainz.org/ws/2/release-group?query=%22metal%22&limit=1&fmt=xml
    // release-group metal 1
    protected $releaseGroupXml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-01T09:56:29.990Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><release-group-list count="1312" offset="0"><release-group id="e4cff975-e110-33c6-ab1f-240578b94e92" type="Compilation" ext:score="100"><primary-type>Album</primary-type><title>Metal</title><secondary-type-list><secondary-type>Compilation</secondary-type></secondary-type-list><artist-credit><name-credit joinphrase=""><artist id="89ad4ac3-39f7-470e-963a-56509c546377"><name>Various Artists</name><sort-name>Various Artists</sort-name><disambiguation>add compilations to this artist</disambiguation><alias-list><alias>Various Composers</alias></alias-list></artist></name-credit></artist-credit><release-list count="1"><release id="d8231c41-0a47-45ec-85c3-b859de2029c8"><title>Metal</title><status>Official</status></release></release-list></release-group></release-group-list></metadata>';

    // http://www.musicbrainz.org/ws/2/release-group/e4cff975-e110-33c6-ab1f-240578b94e92
    protected $releaseGroupResultXml = '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><release-group type="Compilation" id="e4cff975-e110-33c6-ab1f-240578b94e92"><title>Metal</title><first-release-date>2001-01-29</first-release-date><primary-type>Album</primary-type><secondary-type-list><secondary-type>Compilation</secondary-type></secondary-type-list></release-group></metadata>';

    // work
    // http://www.musicbrainz.org/ws/2/work?query=%22metal%22&limit=1&fmt=xml
    // metal, 1
    protected $workXml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-01T09:52:16.926Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><work-list count="153" offset="0"><work id="72a94694-9d02-3dcc-b1e2-fefc5173e6d2" ext:score="100"><title>Metal</title><alias-list><alias>Metal (demo version)</alias></alias-list><relation-list target-type="artist"><relation type="composer"><direction>backward</direction><artist id="6cb79cb2-9087-44d4-828b-5c6fdff2c957"><name>Gary Numan</name><sort-name>Numan, Gary</sort-name></artist></relation><relation type="lyricist"><direction>backward</direction><artist id="6cb79cb2-9087-44d4-828b-5c6fdff2c957"><name>Gary Numan</name><sort-name>Numan, Gary</sort-name></artist></relation></relation-list></work></work-list></metadata>';

    // http://www.musicbrainz.org/ws/2/work/2e9136a2-90a9-3144-b4c1-8aba75b8e459
    protected $workResultXml = '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><work type="Song" id="2e9136a2-90a9-3144-b4c1-8aba75b8e459"><title>Ain’t No Sunshine</title><language>eng</language></work></metadata>';

    /**
     * Test that we can construct an instance of the MusicBrainz service class
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::__construct()
     */
    public function testCanConstructInstanceWithoutHttpClientParameter()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();

        $this->assertInstanceOf('MphpMusicBrainz\Service\MusicBrainz', $service);
    }

    /**
     * Test that we can construct an instance when we supply our own instance
     * of Zend\Http\Client
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::__construct()
     */
    public function testCanConstructInstanceWithHttpClientParameter()
    {
        $httpClient = $this->getMock('Zend\Http\Client');

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $this->assertInstanceOf('MphpMusicBrainz\Service\MusicBrainz', $service);
    }

    /**
     * Test that calling getHttpClient returns an instance of Zend\Http\Client
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::getHttpClient()
     */
    public function testGetHttpClient()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();

        $reflectionObject = new \ReflectionObject($service);

        $reflectionMethodGet = $reflectionObject->getMethod('getHttpClient');
        $reflectionMethodGet->setAccessible(true);

        $httpClient = $reflectionMethodGet->invoke($service);

        $this->assertInstanceOf('Zend\Http\Client', $httpClient);
    }

    /**
     * Test that getHttpClient returns an instance of Zend\Http\Client
     * and test that the HttpClient is set when setHttpClient is called
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::getHttpClient()
     * @covers MphpMusicBrainz\Service\MusicBrainz::setHttpClient()
     */
    public function testSetHttpClient()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();

        $client = new \Zend\Http\Client();

        $reflectionObject = new \ReflectionObject($service);

        $reflectionMethodSet = $reflectionObject->getMethod('setHttpClient');
        $reflectionMethodSet->setAccessible(true);
        $reflectionMethodGet = $reflectionObject->getMethod('getHttpClient');
        $reflectionMethodGet->setAccessible(true);

        $this->assertSame($service, $reflectionMethodSet->invoke($service, $client));
        $this->assertSame($client, $reflectionMethodGet->invoke($service));
    }

    /**
     * Test that calling getRequest returns an instance of Zend\Http\Request
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::getRequest()
     */
    public function testGetRequest()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();

        $reflectionObject = new \ReflectionObject($service);
        $reflectionMethodGet = $reflectionObject->getMethod('getRequest');
        $reflectionMethodGet->setAccessible(true);

        $uri = 'http://musicbrainz.org/ws/';

        $this->assertInstanceOf('Zend\Http\Request', $reflectionMethodGet->invoke($service, $uri));

    }

    /**
     * Test that a call to getIncludes returns an array
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::getIncludes()
     */
    public function testGetIncludes()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();

        $reflectionObject = new \ReflectionObject($service);
        $reflectionMethodGet = $reflectionObject->getMethod('getIncludes');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('array', $reflectionMethodGet->invoke($service));
    }

    /**
     * Test that a call to getResources returns an array
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::getResources()
     */
    public function testGetResources()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();

        $reflectionObject = new \ReflectionObject($service);
        $reflectionMethodGet = $reflectionObject->getMethod('getResources');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('array', $reflectionMethodGet->invoke($service));
    }

    /**
     * Test that a call to prepareIncludes concatenated the array with a '+'
     * 
     * @covers MphpMusicBrainz\Service\MusicBrainz::prepareIncludes()
     */
    public function testPrepareIncludes()
    {
        $includes = array('foo', 'bar', 'eggs', 'ham');
        $service = new \MphpMusicBrainz\Service\MusicBrainz();

        $reflectionObject = new \ReflectionObject($service);
        $reflectionMethodGet = $reflectionObject->getMethod('prepareIncludes');
        $reflectionMethodGet->setAccessible(true);

        $preparedIncludes = $reflectionMethodGet->invoke($service, $includes);
        $this->assertInternalType('string', $preparedIncludes);
        $this->assertSame($preparedIncludes, implode('+', $includes));
    }

    /**
     * Test that attempting to make a search request with an invalid query
     * throws an InvalidQueryException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchArtist()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateQuery()
     * @expectedException MphpMusicBrainz\Exception\InvalidQueryException
     */
    public function testSearchArtistInvalidQueryThrowsException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchArtist(new \stdClass());
    }

    /**
     * Test that attempting to make a search request for a label throws
     * an InvalidQueryException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchLabel()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateQuery()
     * @expectedException MphpMusicBrainz\Exception\InvalidQueryException
     */
    public function testSearchLabelInvalidQueryThrowsException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchLabel(new \stdClass());
    }

    /**
     * Test that attempting to make a search request for a Recording throws
     * an InvalidQueryException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchRecording()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateQuery()
     * @expectedException MphpMusicBrainz\Exception\InvalidQueryException
     */
    public function testSearchRecordingInvalidQueryThrowsException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchRecording(new \stdClass());
    }

    /**
     * Test that attempting to make a search request for a Release throws
     * an InvalidQueryException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchRelease()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateQuery()
     * @expectedException MphpMusicBrainz\Exception\InvalidQueryException
     */
    public function testSearchRelaseInvalidQueryThrowsException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchRelease(new \stdClass());
    }

    /**
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchReleaseGroup()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateQuery()
     * @expectedException MphpMusicBrainz\Exception\InvalidQueryException
     */
    public function testSearchReleaseGroupInvalidQueryThrowsException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchReleaseGroup(new \stdClass());
    }

    /**
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchWork()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateQuery()
     * @expectedException MphpMusicBrainz\Exception\InvalidQueryException
     */
    public function testSearchWorkInvalidQueryThrowsException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchWork(new \stdClass());
    }

    /**
     * Test that attempting to make a searchArtist request with an invalid limit
     * throws an InvalidLimitException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchArtist()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateLimit()
     * @expectedException MphpMusicBrainz\Exception\InvalidLimitException
     */
    public function testSearchArtistInvalidLimitTypeException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchArtist('rockabilly', new \stdClass());
    }

    /**
     * Test that making a searchLabel request with an invalid limit
     * throws an InvalidLimitException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchLabel()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateLimit()
     * @expectedException MphpMusicBrainz\Exception\InvalidLimitException
     */
    public function testSearchLabelInvaldLimitTypeException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchLabel('20th century', new \stdClass());
    }

    /**
     * Test that making a searchRecording request with an invalid limit
     * throws an InvalidLimitException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchRecording()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateLimit()
     * @expectedException MphpMusicBrainz\Exception\InvalidLimitException
     */
    public function testSearchRecordingInvaldLimitTypeException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchRecording('Definately Maybe', new \stdClass());
    }

    /**
     * Test that making a searchRelease request with an invalid limit
     * throws an InvalidLimitException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchRelease()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateLimit()
     * @expectedException MphpMusicBrainz\Exception\InvalidLimitException
     */
    public function testSearchReleaseInvaldLimitTypeException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchRelease('some release of somekind', new \stdClass());
    }

    /**
     * Test that making a searchReleaseGroup request with an invalid
     * limit throws an InvalidLimitException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchReleaseGroup()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateLimit()
     * @expectedException MphpMusicBrainz\Exception\InvalidLimitException
     */
    public function testSearchReleaseGroupInvaldLimitTypeException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchReleaseGroup('a release group', new \stdClass());
    }

    /**
     * Test that making a searchWork request with an invalid limit throws an
     * InvalidLimitException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchWork()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateLimit()
     * @expectedException MphpMusicBrainz\Exception\InvalidLimitException
     */
    public function testSearchWorkInvaldLimitTypeException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchWork('some work', new \stdClass());
    }

    /**
     * Test that attempting to make a search request with an out of bounds
     * limit parameter throws an InvalidLimitException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchArtist()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateLimit()
     * @expectedException MphpMusicBrainz\Exception\InvalidLimitException
     */
    public function testSearchArtistInvalidLimitException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchArtist('bluegrass', 1000);
    }

    public function testSearchLabelInvalidLimitException(){}
    public function testSearchRecordingInvalidLimitException(){}
    public function testSearchReleaseInvalidLimitException(){}
    public function testSearchReleaseGroupInvalidLimitException(){}
    public function testSearchWorkInvalidLimitException(){}

    /**
     * Test that attempting to make a request with an invalid offset
     * throws an InvalidOffsetException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchArtist()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateOffset()
     * @expectedException MphpMusicBrainz\Exception\InvalidOffsetException
     */
    public function testSearchArtistInvalidOffsetException()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchArtist('pop', 1, new \stdClass());
    }

    public function testSearchLabelInvalidOffsetException(){}
    public function testSearchRecordingInvalidOffsetException(){}
    public function testSearchReleaseInvalidOffsetException(){}
    public function testSearchReleaseGroupInvalidOffsetException(){}
    public function testSearchWorkInvalidOffsetException(){}

    /**
     * Test that attempting to make a request with an invalid format parameter
     * throws an InvalidFormatException
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateFormat()
     * @expectedException MphpMusicBrainz\Exception\InvalidFormatException
     */
    public function testSearchArtistInvalidFormat()
    {
        $service = new \MphpMusicBrainz\Service\MusicBrainz();
        $service->searchArtist('grunge', 1, 0, new \stdClass());
    }

    public function testSearchLabelInvalidFormattException() {}
    public function testSearchRecordingInvalidFormatException() {}
    public function testSearchReleaseInvalidFormatException() {}
    public function testSearchReleaseGroupInvalidFormatException() {}
    public function testSearchWorkInvalidFormatException() {}

    /**
     * Test that we can call searchArtist and retrieve a ResultSet
     *
     * @covers MphpMusicbrainz\Service\MusicBrainz::searchArtist()
     * @covers MphpMusicbrainz\Service\MusicBrainz::search()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateResource()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateQuery()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateLimit()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateOffset()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateFormat()
     * @covers MphpMusicbrainz\Service\MusicBrainz::getAdapterFactory()
     */
    public function testSearchArtist()
    {

        $response = new \Zend\Http\Response();
        $response->setContent($this->artistResultSetXml);

        $this->assertEquals($this->artistResultSetXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $resultSet = $service->searchArtist('metallica', 1, 0);

        $this->assertInstanceOf('MphpMusicBrainz\ResultSet\ArtistResultSet', $resultSet);

        foreach ($resultSet as $result) {
            $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $result);
        }
    }

    /**
     * Test that we can call searchLabel and retrieve a ResultSet
     *
     * @covers MphpMusicbrainz\Service\MusicBrainz::searchLabel()
     * @covers MphpMusicbrainz\Service\MusicBrainz::search()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateResource()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateQuery()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateLimit()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateOffset()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateFormat()
     * @covers MphpMusicbrainz\Service\MusicBrainz::getAdapterFactory()
     */
    public function testSearchLabel()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->labelResultSetXml);

        $this->assertEquals($this->labelResultSetXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $resultSet = $service->searchLabel('polyphone', 1, 0);

        $this->assertInstanceOf('MphpMusicBrainz\ResultSet\LabelResultSet', $resultSet);

        foreach ($resultSet as $result) {
            $this->assertInstanceOf('MphpMusicBrainz\Result\Label', $result);
        }
    }

    /**
     * Test that we can call searchRecording and retrieve a ResultSet
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchRecording()
     * @covers MphpMusicbrainz\Service\MusicBrainz::search()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateResource()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateQuery()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateLimit()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateOffset()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateFormat()
     * @covers MphpMusicbrainz\Service\MusicBrainz::getAdapterFactory()
     */
    public function testSearchRecording()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->recordingXml);

        $this->assertEquals($this->recordingXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $resultSet = $service->searchRecording('metallica', 1, 0);

        $this->assertInstanceOf('MphpMusicBrainz\ResultSet\RecordingResultSet', $resultSet);

        foreach ($resultSet as $result) {
            $this->assertInstanceOf('MphpMusicBrainz\Result\Recording', $result);
        }
    }

    /**
     * Test that we can call searchRelease and retrieve a ResultSet
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchRelease()
     * @covers MphpMusicbrainz\Service\MusicBrainz::search()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateResource()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateQuery()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateLimit()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateOffset()
     * @covers MphpMusicbrainz\Service\MusicBrainz::validateFormat()
     * @covers MphpMusicbrainz\Service\MusicBrainz::getAdapterFactory()
     */
    public function testSearchRelease()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->releaseXml);

        $this->assertEquals($this->releaseXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $resultSet = $service->searchRelease('metallica', 1, 0);

        $this->assertInstanceOf('MphpMusicBrainz\ResultSet\ReleaseResultSet', $resultSet);

        foreach ($resultSet as $result) {
            $this->assertInstanceOf('MphpMusicBrainz\Result\Release', $result);
        }
    }

    /**
     * Test that a call to searchReleaseGroup returns an instance of
     * MphpMusicBrainz\ResultSet\ReleaseGroupResultSet
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchReleaseGroup()
     * @covers MphpMusicBrainz\Service\MusicBrainz::search()
     */
    public function testSearchReleaseGroup()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->releaseGroupXml);

        $this->assertEquals($this->releaseGroupXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $resultSet = $service->searchReleaseGroup('metal', 1, 0);

        $this->assertInstanceOf('MphpMusicBrainz\ResultSet\ReleaseGroupResultSet', $resultSet);

        foreach ($resultSet as $result) {
            $this->assertInstanceOf('MphpMusicBrainz\Result\ReleaseGroup', $result);
        }
    }

    /**
     * Test that a call to searchWork returns an instance of
     * MphpMusicBrainz\ResultSet\WorkResultSet
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::searchWork()
     * @covers MphpMusicBrainz\Service\MusicBrainz::search()
     */
    public function testSearchWork()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->workXml);

        $this->assertEquals($this->workXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $resultSet = $service->searchWork('metal', 1, 0);

        $this->assertInstanceOf('MphpMusicBrainz\ResultSet\WorkResultSet', $resultSet);

        foreach ($resultSet as $result) {
            $this->assertInstanceOf('MphpMusicBrainz\Result\Work', $result);
        }
    }

    /**
     * Test that a call to lookupArtist returns an instance of MphpMusicBrainz\Result\Artist
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookupArtist()
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookup()
     * @covers MphpMusicBrainz\Service\MusicBrainz::validateId()
     */
    public function testLookupArtist()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->artistResultXml);

        $this->assertEquals($this->artistResultXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $artist = $service->lookupArtist('65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab');

        $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $artist);
        $this->assertEquals('Metallica', $artist->getName());
        $this->assertEquals('Metallica', $artist->getSortName());
        $this->assertEquals('US', $artist->getCountry());
        $this->assertEquals('1981-10', $artist->getBegin());
    }

    /**
     * Test that a call to lookupLabel returns an instance of MphpMusicBrainz\Result\Label
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookupLabel()
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookup()
     */
    public function testLookupLabel()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->labelResultXml);

        $this->assertEquals($this->labelResultXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $label = $service->lookupLabel('8f5a79e2-beb1-49d7-9dd4-7fdb24b0564f');

        $this->assertInstanceOf('MphpMusicBrainz\Result\Label', $label);
        $this->assertEquals('Reissue Production', $label->getType());
        $this->assertEquals('8f5a79e2-beb1-49d7-9dd4-7fdb24b0564f', $label->getId());
        $this->assertEquals('Metal Nation', $label->getName());
        $this->assertEquals('Metal Nation', $label->getSortName());
        $this->assertEquals('2004', $label->getBegin());
    }

    /**
     * Test that a call to lookupRecording returns an instance of
     * MphpMusicBrainz\Result\Recording
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookupRecording
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookup
     */
    public function testLookupRecording()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->recordingResultXml);

        $this->assertEquals($this->recordingResultXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $recording = $service->lookupRecording('ebed15b6-4907-4ae5-8655-2812f74b06f4');

        $this->assertInstanceOf('MphpMusicBrainz\Result\Recording', $recording);

        $this->assertEquals('Met', $recording->getTitle());
        $this->assertEquals('146493', $recording->getLength());
    }

    /**
     * Test that a call to lookupRelease returns an instance of
     * MphpMusicBrainz\Result\Recording
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookupRelease
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookup
     */
    public function testLookupRelease()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->releaseResultXml);

        $this->assertEquals($this->releaseResultXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $release = $service->lookupRelease('af4f69e8-1643-3b5a-94ba-a0269f8e3c77');

        $this->assertInstanceOf('MphpMusicBrainz\Result\Release', $release);

        $this->assertEquals('Metallica', $release->getTitle());
        $this->assertEquals('Official', $release->getStatus());
        $this->assertEquals('normal', $release->getQuality());
        $this->assertEquals('eng', $release->getLanguage());
        $this->assertEquals('Latn', $release->getScript());
        $this->assertEquals('2008-11-28', $release->getDate());
        $this->assertEquals('US', $release->getCountry());
        $this->assertEquals('0093624984962', $release->getBarcode());
        $this->assertEquals('B001I10ABE', $release->getAsin());
        $this->assertEquals(false, $release->getCoverArtArtwork());
        $this->assertSame(0, $release->getCoverArtCount());
        $this->assertEquals(false, $release->getCoverArtFront());
        $this->assertEquals(false, $release->getCoverArtBack());
    }

    /**
     * Test that a call to lookupReleaseGroup returns an instance of
     * MphpMusicBrainz\Result\ReleaseGroup
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookupReleaseGroup
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookup
     */
    public function testLookupReleaseGroup()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->releaseGroupResultXml);

        $this->assertEquals($this->releaseGroupResultXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);
        $releaseGroup = $service->lookupReleaseGroup('e4cff975-e110-33c6-ab1f-240578b94e92');

        $this->assertInstanceOf('MphpMusicBrainz\Result\ReleaseGroup', $releaseGroup);

        $this->assertEquals('Compilation', $releaseGroup->getType());
        $this->assertEquals('Metal', $releaseGroup->getTitle());
        $this->assertEquals('2001-01-29', $releaseGroup->getFirstReleaseDate());
        $this->assertEquals('Album', $releaseGroup->getPrimaryType());
    }

    /**
     * Test that a call to lookupWork will return an instance of
     * MphpMusicBrainz\Result\Work
     *
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookupWork()
     * @covers MphpMusicBrainz\Service\MusicBrainz::lookup()
     */
    public function testLookupWork()
    {
        $response = new \Zend\Http\Response();
        $response->setContent($this->workResultXml);

        $this->assertEquals($this->workResultXml, $response->getBody());

        $httpClient = $this->getMock('Zend\Http\Client', array('dispatch'));
        $httpClient->expects($this->once())
                ->method('dispatch')
                ->with($this->isInstanceOf('Zend\Http\Request'))
                ->will($this->returnValue($response));

        $service = new \MphpMusicBrainz\Service\MusicBrainz($httpClient);

        $work = $service->lookupWork('2e9136a2-90a9-3144-b4c1-8aba75b8e459');

        $this->assertInstanceOf('MphpMusicBrainz\Result\Work', $work);
    }

}