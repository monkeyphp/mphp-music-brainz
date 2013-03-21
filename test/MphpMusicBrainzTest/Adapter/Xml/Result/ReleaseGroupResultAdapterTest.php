<?php
/**
 * ReleaseGroupResultAdapterTest.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Adapter\Xml\Result;

/**
 * ReleaseGroupResultAdapterTest
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ReleaseGroupResultAdapterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that we can construct an instance of ReleaseGroupResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::__construct()
     */
    public function testCanConstructInstance()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter', $releaseGroupResultAdapter);
    }

    /**
     * Test that calling getArtist returns an instance of MphpMusicBrainz\Result\Artist
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getArtist()
     */
    public function testCanGetArtist()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());
        $artist = $releaseGroupResultAdapter->getArtist();

        $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $artist);
    }

    /**
     * Test that calling getArtistQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getArtistQuery()
     */
    public function testGetArtistQuery()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseGroupResultAdapter);

        $reflectionGetMethod = $reflectionObject->getMethod('getArtistQuery');
        $reflectionGetMethod->setAccessible(true);

        $this->assertInternalType('string', $reflectionGetMethod->invoke($releaseGroupResultAdapter));
    }

    /**
     * Test that we can retrieve the first release date from the ReleaseGroupResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getFirstReleaseDate()
     */
    public function testCanGetFirstReleaseDate()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getXml());

        $this->assertEquals('2001-01-29', $releaseGroupResultAdapter->getFirstReleaseDate());
    }

    /**
     * Test that calling getFirstReleaseQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getFirstReleaseDateQuery()
     */
    public function testGetFirstReleaseQuery()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getXml());
        $reflectionObject = new \ReflectionObject($releaseGroupResultAdapter);

        $reflectionGetMethod = $reflectionObject->getMethod('getFirstReleaseDateQuery');
        $reflectionGetMethod->setAccessible(true);

        $this->assertInternalType('string', $reflectionGetMethod->invoke($releaseGroupResultAdapter));
    }

    /**
     * Test that we can retrieve the primary type from the ReleaseGroupResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getPrimaryType()
     */
    public function testCanGetPrimaryType()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getXml());

        $this->assertEquals('Album', $releaseGroupResultAdapter->getPrimaryType());
    }

    /**
     * Test that a call to getPrimaryTypeQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getPrimaryTypeQuery()
     */
    public function testPrimaryTypeQuery()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getXml());
        $reflectionObject = new \ReflectionObject($releaseGroupResultAdapter);

        $reflectionGetMethod = $reflectionObject->getMethod('getPrimaryTypeQuery');
        $reflectionGetMethod->setAccessible(true);

        $this->assertInternalType('string', $reflectionGetMethod->invoke($releaseGroupResultAdapter));
    }

    /**
     * Test that we can retrieve a Traversable instance when we call getReleaseList
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getReleaseList
     */
    public function testCanGetReleaseList()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());

        $releaseList = $releaseGroupResultAdapter->getReleaseList();

        $this->assertInstanceOf('Traversable', $releaseList);

        $this->assertEquals(1, $releaseList->count());
    }

    /**
     * Test that a call to getReleaseListQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getReleaseListQuery()
     */
    public function testGetReleaseListQuery()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseGroupResultAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getReleaseListQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseGroupResultAdapter));
    }

    /**
     * Test that calling getSecondaryTypeList returns a Traversable
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getSecondaryTypeList()
     */
    public function testCanGetSecondaryTypeList()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());

        $secondaryTypeList = $releaseGroupResultAdapter->getSecondaryTypeList();

        $this->assertInstanceOf('Traversable', $secondaryTypeList);
    }

    /**
     * Test that a call to getSecondaryTypeListQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getSecondaryTypeListQuery()
     */
    public function testGetSecondaryTypeListQuery()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseGroupResultAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getSecondaryTypeListQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseGroupResultAdapter));
    }

    /**
     * Test that we can retrieve the title
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getTitle()
     */
    public function testCanGetTitle()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());
        $this->assertEquals('Metal', $releaseGroupResultAdapter->getTitle());
    }

    /**
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getTitleQuery()
     */
    public function testGetTitleQuery()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseGroupResultAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getTitleQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseGroupResultAdapter));
    }

    /**
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getType()
     */
    public function testCanGetType()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());

        $this->assertEquals('Compilation', $releaseGroupResultAdapter->getType());
    }

    /**
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter::getAttributeType()
     */
    public function testGetAttributeType()
    {
        $releaseGroupResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseGroupResultAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getAttributeType');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseGroupResultAdapter));
    }

    /**
     * http://www.musicbrainz.org/ws/2/release-group/e4cff975-e110-33c6-ab1f-240578b94e92
     */
    protected function getXml()
    {
        return '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><release-group type="Compilation" id="e4cff975-e110-33c6-ab1f-240578b94e92"><title>Metal</title><first-release-date>2001-01-29</first-release-date><primary-type>Album</primary-type><secondary-type-list><secondary-type>Compilation</secondary-type></secondary-type-list></release-group></metadata>';
    }

    /**
     * Utility method to return a DOMElement
     *
     * http://www.musicbrainz.org/ws/2/release-group?query=%22metal%22&limit=2
     *
     * @return DOMElement
     */
    protected function getDomElement()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-04T09:18:17.804Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><release-group-list count="1312" offset="0"><release-group id="e4cff975-e110-33c6-ab1f-240578b94e92" type="Compilation" ext:score="100"><primary-type>Album</primary-type><title>Metal</title><secondary-type-list><secondary-type>Compilation</secondary-type></secondary-type-list><artist-credit><name-credit joinphrase=""><artist id="89ad4ac3-39f7-470e-963a-56509c546377"><name>Various Artists</name><sort-name>Various Artists</sort-name><disambiguation>add compilations to this artist</disambiguation><alias-list><alias>Various Composers</alias></alias-list></artist></name-credit></artist-credit><release-list count="1"><release id="d8231c41-0a47-45ec-85c3-b859de2029c8"><title>Metal</title><status>Official</status></release></release-list></release-group><release-group id="45fd7e38-c3a5-3ef7-9061-24d8d3a58732" type="Album" ext:score="100"><primary-type>Album</primary-type><title>Metal</title><artist-credit><name-credit joinphrase=""><artist id="71dc0b7d-64f7-49ba-8723-f60804911b4e"><name>Manilla Road</name><sort-name>Manilla Road</sort-name><disambiguation></disambiguation></artist></name-credit></artist-credit><release-list count="1"><release id="f6e84277-05e5-43ec-a03f-33936c6a8db1"><title>Metal</title><status>Official</status></release></release-list></release-group></release-group-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        $domElement = $xpath->query('/ns:metadata/ns:release-group-list/ns:release-group')->item(0);
        return $domElement;
    }
}