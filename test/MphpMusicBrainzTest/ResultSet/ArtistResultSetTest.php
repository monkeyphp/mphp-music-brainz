<?php
/**
 * ArtistResultSetTest.php
 *
 * LICENSE: E&L http://www.eandl.co.uk
 *
 * PHP Version  PHP 5.3.10
 *
 * @category 
 * @package   
 * @author    David White <dwhite@eandl.co.uk>
 * @copyright 2013 E&L http://www.eandl.co.uk
 * @license   E&L http://www.eandl.co.uk
 * @link      http://www.eandl.co.uk
 */
namespace MphpMusicBrainzTest\ResultSet;

/**
 * ArtistResultSetTest
 *
 * @category 
 * @package   
 * @author    David White <dwhite@eandl.co.uk>
 * @copyright 2013 E&L http://www.eandl.co.uk
 * @license   E&L http://www.eandl.co.uk
 * @version   Release: ##VERSION##
 * @link      http://www.eandl.co.uk
 */
class ArtistResultSetTest extends \PHPUnit_Framework_TestCase
{
    
    protected $query = 'metal';
    
    protected $limit = 2;
    
    protected $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-28T08:08:03.926Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><artist-list count="153" offset="0"><artist id="ffafec4f-69d8-46c1-a09b-c3b8b25482ee" type="Group" ext:score="100"><name>Metal Skool</name><sort-name>Metal Skool</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>Danger Kitty</alias><alias>Metal Sludge All-Stars</alias><alias>National Lampoon\'s Metal Skool</alias><alias>Metal Shop</alias></alias-list></artist><artist id="db97aca2-0102-48ba-949c-f96d0d69562c" type="Person" ext:score="94"><name>Jeff Metal</name><sort-name>Metal, Jeff</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>J Metal</alias></alias-list><tag-list><tag count="1"><name>uk</name></tag><tag count="1"><name>photographer</name></tag><tag count="1"><name>designer</name></tag></tag-list></artist></artist-list></metadata>';
    
    protected function getAdapter()
    {
        $adapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter($this->xml);
        
        return $adapter;
    }
    
    /**
     * Test that we can construc an instance of ArtistResultSet
     * 
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::__construct()
     */
    public function testCanConstructInstance()
    {
        $resultSet = new \MphpMusicBrainz\ResultSet\ArtistResultSet($this->getAdapter(), $this->query, $this->limit);
        
        $this->assertInstanceOf('MphpMusicBrainz\ResultSet\ArtistResultSet', $resultSet);
    }
    
    /**
     * Test that calling current returns an Artist instance
     * 
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::current()
     */
    public function testCurrent()
    {
        $resultSet = new \MphpMusicBrainz\ResultSet\ArtistResultSet($this->getAdapter(), $this->query, $this->limit);
        
        $artist = $resultSet->current();
        
        $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $artist);
        
    }
    
    /**
     * Test that we can retrieve the count property of the ResultSet
     * 
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::getCount()
     */
    public function testGetCount()
    {
        $resultSet = new \MphpMusicBrainz\ResultSet\ArtistResultSet($this->getAdapter(), $this->query, $this->limit);
        $this->assertEquals(153, $resultSet->getCount());
    }
    
    /**
     * Test that we can retrieve the created datetime 
     * 
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::getCreated
     */
    public function testGetCreated()
    {
        $resultSet = new \MphpMusicBrainz\ResultSet\ArtistResultSet($this->getAdapter(), $this->query, $this->limit);
        $this->assertInstanceOf('DateTime', $resultSet->getCreated());
    }
    
    /**
     * Test that we can retrieve the current result set offset
     * 
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::getOffset()
     */
    public function testGetOffset()
    {
        $resultSet = new \MphpMusicBrainz\ResultSet\ArtistResultSet($this->getAdapter(), $this->query, $this->limit);
        $this->assertEQuals(0, $resultSet->getOffset());
    }
    
    /**
     * Test that we can iterate through the result set
     * 
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::current()
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::next()
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::valid()
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::rewind()
     * @covers MphpMusicBrainz\ResultSet\ArtistResultSet::key()
     */
    public function testIterate()
    {
        $resultSet = new \MphpMusicBrainz\ResultSet\ArtistResultSet($this->getAdapter(), $this->query, $this->limit);
        foreach ($resultSet as $i => $result) {
            $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $result);
        }
    }
    
}