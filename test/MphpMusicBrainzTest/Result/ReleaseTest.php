<?php
/**
 * ReleaseTest.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Result;
/**
 * ReleaseTest
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ReleaseTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Utility method for returning a configured ReleaseResultAdapter
     * 
     * @return \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter
     */
    protected function getAdapter()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-28T07:51:26.449Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><release-list count="68" offset="0"><release id="6e729716-c0eb-3f50-a740-96ac173be50d" ext:score="100"><title>Metallica</title><status>Official</status><text-representation><language>eng</language><script>Latn</script></text-representation><artist-credit><name-credit joinphrase=""><artist id="65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab"><name>Metallica</name><sort-name>Metallica</sort-name><disambiguation></disambiguation></artist></name-credit></artist-credit><release-group id="e8f70201-8899-3f0c-9e07-5d6495bc8046" type="Album"><primary-type>Album</primary-type></release-group><date>2010-09-22</date><country>JP</country><barcode>4988005628664</barcode><asin>B000GALEWC</asin><label-info-list><label-info><catalog-number>UICY-94666</catalog-number><label id="bd86569c-ba94-4e5e-a3c7-9ebd16b59709"><name>Universal Music Japan</name></label></label-info></label-info-list><medium-list count="1"><track-count>13</track-count><medium><format>CD</format><disc-list count="4"/><track-list count="13"/></medium></medium-list></release></release-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        $domElement = $xpath->query('/ns:metadata/ns:release-list/ns:release')->item(0);
        
        $adapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($domElement);
        
        return $adapter;
    }
    
    /**
     * Test that we can construct an instance of Release
     * 
     * @covers MphpMusicBrainz\Result\Release::__construct
     */
    public function testCanConstructInstance()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertInstanceOf('MphpMusicBrainz\Result\Release', $release);
    }
    
    /**
     * Test that we can retrieve the id property of the Release
     * 
     * @covers MphpMusicBrainz\Result\Release::getId()
     */
    public function testGetId()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('6e729716-c0eb-3f50-a740-96ac173be50d', $release->getId());
    }
    
    /**
     * Test that we can retrieve the score property
     * 
     * @covers MphpMusicBrainz\Result\Release::getScore()
     */
    public function testGetScore()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('100', $release->getScore());
    }
    
    /**
     * Test that we can retrieve the Artist from the 
     * Release
     * 
     * @covers MphpMusicBrainz\Result\Release::getArtist()
     */
    public function testGetArtist()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $artist = $release->getArtist();
        $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $artist);
        
        $this->assertEquals('Metallica', $artist->getName());
    }
    
    /**
     * Test that we can retrieve the Asin value 
     * 
     * @covers MphpMusicBrainz\Result\Release::getAsin()
     */
    public function testGetAsin()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('B000GALEWC', $release->getAsin());
    }
    
    /**
     * Test that we can retrieve the Release barcode property
     * 
     * @covers MphpMusicBrainz\Result\Release::getBarcode()
     */
    public function testGetBarcode()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('4988005628664', $release->getBarcode());
    }
    
    /**
     * Test that we can retrieve the country property
     * 
     * @covers MphpMusicBrainz\Result\Release::getCountry()
     */
    public function testGetCountry()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('JP', $release->getCountry());
    }   
    
    /**
     * Test that we can retrieve the Release date property
     * 
     * @covers MphpMusicBrainz\Result\Release::getDate()
     */
    public function testGetDate()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('2010-09-22', $release->getDate());
    }
    
    /**
     * Test that we can retrieve the Release language property
     * 
     * @covers MphpMusicBrainz\Result\Release::getLanguage()
     */
    public function testGetLanguage()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('eng', $release->getLanguage());
    }
    
    /**
     * Test that we can retrieve the Release script property
     * 
     * @covers MphpMusicBrainz\Result\Release::getScript()
     */
    public function testGetScript()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('Latn', $release->getScript());
    }
    
    /**
     * Test that we can retrieve the Release status property
     * 
     * @covers MphpMusicBrainz\Result\Release::getStatus()
     */
    public function testGetStatus()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('Official', $release->getStatus());
    }
    
    /**
     * Test that we can retrieve the Release title property
     * 
     * @covers MphpMusicBrainz\Result\Release::getTitle()
     */
    public function testGetTitle()
    {
        $release = new \MphpMusicBrainz\Result\Release($this->getAdapter());
        
        $this->assertEquals('Metallica', $release->getTitle());
    }
    
}