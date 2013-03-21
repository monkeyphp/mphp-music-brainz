<?php
/**
 * ArtistResultSetAdapterTest.php
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
 * ArtistResultSetAdapterTest
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ArtistResultSetAdapterTest extends \PHPUnit_Framework_TestCase
{
 
    /**
     * Xml string representing a response from the webservice
     * 
     * @var string
     */
    protected $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-28T08:08:03.926Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><artist-list count="153" offset="0"><artist id="ffafec4f-69d8-46c1-a09b-c3b8b25482ee" type="Group" ext:score="100"><name>Metal Skool</name><sort-name>Metal Skool</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>Danger Kitty</alias><alias>Metal Sludge All-Stars</alias><alias>National Lampoon\'s Metal Skool</alias><alias>Metal Shop</alias></alias-list></artist><artist id="db97aca2-0102-48ba-949c-f96d0d69562c" type="Person" ext:score="94"><name>Jeff Metal</name><sort-name>Metal, Jeff</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>J Metal</alias></alias-list><tag-list><tag count="1"><name>uk</name></tag><tag count="1"><name>photographer</name></tag><tag count="1"><name>designer</name></tag></tag-list></artist></artist-list></metadata>';
    
    /**
     * Test that we can construct an instance of ArtistResultSetAdapter
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::__construct()
     */
    public function testCanConstructInstance()
    {
        $artistResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter($this->xml);
        
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter', $artistResultSetAdapter);
    }
    
    /**
     * Test that we can retrieve an instance of \MphpMusicBrainz\Result\Artist when 
     * we call current
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::current()
     */
    public function testCurrent()
    {
        $artistResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter($this->xml);
        
        $artist = $artistResultSetAdapter->current();
        
        $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $artist);
        $this->assertEquals('ffafec4f-69d8-46c1-a09b-c3b8b25482ee', $artist->getId());
        $this->assertEquals('Metal Skool', $artist->getName());
    }
    
    /**
     * Test that we can retrieve the count from the ArtistResultSetAdapter
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::getCount()
     */
    public function testCanGetCount()
    {
        $artistResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter($this->xml);
        
        $this->assertEquals(153, $artistResultSetAdapter->getCount());
    }
    
    /**
     * Test that we can retrieve the DateTime representing when the response was
     * returned from the web service
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::getCreated()
     */
    public function testCanGetCreated()
    {
        $artistResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter($this->xml);
        $this->assertInstanceOf('DateTime', $artistResultSetAdapter->getCreated());
    }
    
    /**
     * Test that we can retrieve the current ofset from the ArtistResultSetAdapter
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::getOffset()
     */
    public function testCanGetOffset()
    {
        $artistResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter($this->xml);
        $this->assertEquals(0, $artistResultSetAdapter->getOffset());
    }
    
    /**
     * Test that we can iterate through the ArtistResultSetAdapter
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::current()
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::key()
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::next()
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::rewind()
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter::valid()
     */
    public function testCanIterate()
    {
        $artistResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter($this->xml);
        
        foreach ($artistResultSetAdapter as $i => $result) {
            $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $result);
        }
    }
    
}

