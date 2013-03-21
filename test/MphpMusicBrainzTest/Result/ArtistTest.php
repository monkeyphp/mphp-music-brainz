<?php
/**
 * ArtistTest.php
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainzTest\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Result;

use DOMDocument;
use DOMXPath;
use MphpMusicBrainz\Result\Artist;
use PHPUnit_Framework_TestCase;

/**
 * ArtistTest
 * 
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainzTest\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ArtistTest extends PHPUnit_Framework_TestCase
{

    /**
     * Utility method to return a configured adapter instance
     * 
     * @return \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter
     */
    protected function getAdapter()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-27T16:56:41.559Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><artist-list count="1" offset="0"><artist id="65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab" type="Group" ext:score="100"><name>Metallica</name><sort-name>Metallica</sort-name><country>US</country><life-span><begin>1981-10</begin><ended>false</ended></life-span><alias-list><alias>메탈리카</alias><alias>メタリカ</alias><alias>Metalica</alias></alias-list><tag-list><tag count="1"><name>américain</name></tag><tag count="1"><name>usa</name></tag><tag count="2"><name>speed metal</name></tag><tag count="1"><name>douchebag metal</name></tag><tag count="1"><name>american thrash metal</name></tag><tag count="3"><name>rock</name></tag><tag count="1"><name>90s</name></tag><tag count="1"><name>80s</name></tag><tag count="1"><name>seen live</name></tag><tag count="1"><name>rock and indie</name></tag><tag count="10"><name>thrash metal</name></tag><tag count="6"><name>heavy metal</name></tag><tag count="1"><name>thrash</name></tag><tag count="10"><name>metal</name></tag><tag count="1"><name>classic thrash metal</name></tag><tag count="1"><name>classic metal</name></tag><tag count="1"><name>los angeles</name></tag><tag count="1"><name>california</name></tag><tag count="1"><name>bay area</name></tag><tag count="1"><name>80s metal</name></tag><tag count="1"><name>90s metal</name></tag><tag count="1"><name>80s thrash metal</name></tag><tag count="6"><name>american</name></tag><tag count="5"><name>hard rock</name></tag><tag count="1"><name>band</name></tag></tag-list></artist></artist-list></metadata>';

        $domDocument = new DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        $domElement = $xpath->query('/ns:metadata/ns:artist-list/ns:artist')->item(0);

        $adapter = new \MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter($domElement);
        
        return $adapter;
    }
    
    /**
     * Test that we can construct an Artist instance
     *
     * @covers MphpMusicBrainz\Result\Artist::__construct()
     */
    public function testCanConstructInstance()
    {
        $artist = new Artist($this->getAdapter());
        
        $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $artist);
    }

    public function testCanGetName()
    {
        $artist = new Artist($this->getAdapter());
        $this->assertEquals('Metallica', $artist->getName());
    }

    public function testGetType()
    {
        $artist = new Artist($this->getAdapter());
        $this->assertEquals('Group', $artist->getType());
    }

    public function testGetCountry()
    {
        $artist = new Artist($this->getAdapter());

        $this->assertEquals('US', $artist->getCountry());
    }

    public function testGetSortName()
    {
        $artist = new Artist($this->getAdapter());

        $this->assertEquals('Metallica', $artist->getSortName());
    }

    public function testGetGender()
    {
        $artist = new Artist($this->getAdapter());

        $this->assertNull($artist->getGender());
    }

    public function testGetDisambiguation()
    {
        $artist = new Artist($this->getAdapter());

        $this->assertNull($artist->getDisambiguation());
    }

    public function testGetBegin()
    {
        $artist = new Artist($this->getAdapter());

        $this->assertEquals('1981-10', $artist->getBegin());
    }

    public function testGetEnd()
    {
        $artist = new Artist($this->getAdapter());

        $this->assertNull($artist->getEnd());
    }

    public function testGetEnded()
    {
        $artist = new Artist($this->getAdapter());

        $this->assertFalse($artist->getEnded());
    }


    public function testGetTagList()
    {
      $artist = new Artist($this->getAdapter());

        $this->assertInstanceOf('SplFixedArray', $artist->getTagList());
    }

    public function testGetAliasList()
    {
        $artist = new Artist($this->getAdapter());
        $this->assertInstanceOf('SplFixedArray', $artist->getAliasList());
    }

    public function testGetId()
    {
        $artist = new Artist($this->getAdapter());
        $this->assertEquals('65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab', $artist->getId());
    }

    public function testGetScore()
    {
        $artist = new Artist($this->getAdapter());
        $this->assertEquals('100', $artist->getScore());
    }

    
}