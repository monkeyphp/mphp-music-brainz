<?php
/**
 * ArtistResultAdapterTest.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Adapter\Xml\Result;

use DOMDocument;
use DOMXPath;
use PHPUnit_Framework_TestCase;

/**
 * ArtistResultAdapterTest
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ArtistResultAdapterTest extends PHPUnit_Framework_TestCase
{

    protected $xml = '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><artist type="Person" id="8bb0f190-cd20-48b9-a87a-60129dfae9a3"><name>Jim Fox</name><sort-name>Fox, Jim</sort-name><disambiguation>Experimental electronic musician</disambiguation><gender>Male</gender><country>US</country><life-span><begin>1953-04-09</begin></life-span></artist></metadata>';

    /**
     * Utility method for creating a DOMElement from an XML string
     *
     * @return DOMElement
     */
    protected function getArtistDomElement()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-27T16:56:41.559Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><artist-list count="1" offset="0"><artist id="65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab" type="Group" ext:score="100"><name>Metallica</name><sort-name>Metallica</sort-name><country>US</country><life-span><begin>1981-10</begin><ended>false</ended></life-span><alias-list><alias>메탈리카</alias><alias>メタリカ</alias><alias>Metalica</alias></alias-list><tag-list><tag count="1"><name>américain</name></tag><tag count="1"><name>usa</name></tag><tag count="2"><name>speed metal</name></tag><tag count="1"><name>douchebag metal</name></tag><tag count="1"><name>american thrash metal</name></tag><tag count="3"><name>rock</name></tag><tag count="1"><name>90s</name></tag><tag count="1"><name>80s</name></tag><tag count="1"><name>seen live</name></tag><tag count="1"><name>rock and indie</name></tag><tag count="10"><name>thrash metal</name></tag><tag count="6"><name>heavy metal</name></tag><tag count="1"><name>thrash</name></tag><tag count="10"><name>metal</name></tag><tag count="1"><name>classic thrash metal</name></tag><tag count="1"><name>classic metal</name></tag><tag count="1"><name>los angeles</name></tag><tag count="1"><name>california</name></tag><tag count="1"><name>bay area</name></tag><tag count="1"><name>80s metal</name></tag><tag count="1"><name>90s metal</name></tag><tag count="1"><name>80s thrash metal</name></tag><tag count="6"><name>american</name></tag><tag count="5"><name>hard rock</name></tag><tag count="1"><name>band</name></tag></tag-list></artist></artist-list></metadata>';

        $domDocument = new DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        $domElement = $xpath->query('/ns:metadata/ns:artist-list/ns:artist')->item(0);
        return $domElement;
    }

    /**
     * Test that we can construct an ArtistResultAdapter instance with a DOMElement
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::__construct()
     */
    public function testCanConstructInstanceWithDOMElement()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter', $artistAdapter);
    }

    /**
     * Test that we can construct an ArtistResultAdapter instance with an XML string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::__construct()
     */
    public function testCanConstructInstanceWithXMLString()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->xml);

        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter', $artistAdapter);
    }

    /**
     * Test that passing an invalid string to the constructor will throw an
     * exception
     *
     * @expectedException RuntimeException
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::__construct()
     */
    public function testAttemptingToConstructInstanceWithInvalidStringThrowsException()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter('a random string');
    }

    /**
     * @expectedException RuntimeException
     */
    public function testAttemptingToConstructInstanceWithInvalidParamThrowsException()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter(new \stdClass());
    }
    /**
     * Test that we can retrieve the id from the ArtistResultAdapter if it have been
     * contstructed from a DOMElement
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getId()
     */
    public function testCanGetIdFromAdapterConstructedWithDomElement()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());
        $this->assertEquals('65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab', $artistAdapter->getId());
    }

    /**
     * Test that we can retrieve the id from the ResultSetAdapter when it has
     * been constructed from an xml string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getId()
     */
    public function testCanGetIdFromAdapterContstructedWithString()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->xml);
        $this->assertEquals('8bb0f190-cd20-48b9-a87a-60129dfae9a3', $artistAdapter->getId());
    }

    /**
     * Test that we can retrieve the id from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getScore()
     */
    public function testCanGetScore()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertEquals('100', $artistAdapter->getScore());
    }

    /**
     * Test that we can retrieve the type from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getType()
     */
    public function testCanGetType()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertEquals('Group', $artistAdapter->getType());
    }

    /**
     * Test that we can retrieve the country from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getCountry()
     */
    public function testGetCountry()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertEquals('US', $artistAdapter->getCountry());
    }

    /**
     * Test that we can retrieve the name from the ArtistResultAapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getName()
     */
    public function testCanGetName()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertEquals('Metallica', $artistAdapter->getName());
    }

    /**
     * Test that we can retrieve the sort name from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getSortName()
     */
    public function testCanGetSortName()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertEquals('Metallica', $artistAdapter->getSortName());
    }

    /**
     * Test that we can retrieve the gender from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getGender()
     */
    public function testCanGetGender()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertNull($artistAdapter->getGender());
    }

    /**
     * Test that we can retrieve the disambiguation from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getDisambiguation()
     */
    public function testCanGetDisambiguation()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertNull($artistAdapter->getDisambiguation());
    }

    /**
     * Test that we can retrieve the begin from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getBegin()
     */
    public function testCanGetBegin()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertEquals('1981-10', $artistAdapter->getBegin());
    }

    /**
     * Test that we can retrieve the end from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getEnd()
     */
    public function testCanGetEnd()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertNull($artistAdapter->getEnd());
    }

    /**
     * Test that we can retrieve the ended from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getEnded()
     */
    public function testCanGetEnded()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertFalse($artistAdapter->getEnded());
    }

    /**
     * Test that we can retrieve a Traversable tag list instance from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getTagList()
     */
    public function testCanGetTagList()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertInstanceOf('SplFixedArray', $artistAdapter->getTagList());
        $this->assertInstanceOf('Traversable', $artistAdapter->getTagList());
    }

    /**
     * Test that we can retrieve a Traversable instance of alias names from the ArtistResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter::getAliasList()
     */
    public function testGetAliasList()
    {
        $artistAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($this->getArtistDomElement());

        $this->assertInstanceOf('SplFixedArray', $artistAdapter->getAliasList());
        $this->assertInstanceOf('Traversable', $artistAdapter->getAliasList());
    }



}