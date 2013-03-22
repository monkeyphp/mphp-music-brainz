<?php
/**
 * AbstractResultSetAdapterTest.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Xml\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Adapter\Xml\ResultSet;

/**
 * AbstractResultSetAdapterTest
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Xml\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class AbstractResultSetAdapterTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test that calling getFactory returns a factory instance
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter::getFactory()
     */
    public function testCanGetFactory()
    {
        $abstractResultSetAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', array(), 'AbstractResultSetAdapter', false);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', $abstractResultSetAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultSetAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getFactory');
        $reflectionGetMethod->setAccessible(true);
        
        $factory = $reflectionGetMethod->invoke($abstractResultSetAdapter);
        
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\XmlFactory', $factory);
    }
    
    /**
     * Test that calling getDom returns a DOMDocument instance
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter::getDom()
     */
    public function testCanGetDom()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-28T08:08:03.926Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><artist-list count="153" offset="0"><artist id="ffafec4f-69d8-46c1-a09b-c3b8b25482ee" type="Group" ext:score="100"><name>Metal Skool</name><sort-name>Metal Skool</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>Danger Kitty</alias><alias>Metal Sludge All-Stars</alias><alias>National Lampoon\'s Metal Skool</alias><alias>Metal Shop</alias></alias-list></artist><artist id="db97aca2-0102-48ba-949c-f96d0d69562c" type="Person" ext:score="94"><name>Jeff Metal</name><sort-name>Metal, Jeff</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>J Metal</alias></alias-list><tag-list><tag count="1"><name>uk</name></tag><tag count="1"><name>photographer</name></tag><tag count="1"><name>designer</name></tag></tag-list></artist></artist-list></metadata>';
        
        $abstractResultSetAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', array($xml), 'AbstractResultSetAdapter', true);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', $abstractResultSetAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultSetAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getDom');
        $reflectionGetMethod->setAccessible(true);
        
        $dom = $reflectionGetMethod->invoke($abstractResultSetAdapter);
        
        $this->assertInstanceOf('DOMDocument', $dom);
    }

    /**
     * Test that a call to getDom using an invalid results string will cause
     * an Exception to be thrown
     * 
     * @expectedException RuntimeException
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter::getDom()
     */
    public function testCanGetDomWithInvalidXMLThrowsException()
    {
        $xml = 'an invalid string';
        
        $abstractResultSetAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', array($xml), 'AbstractResultSetAdapter', true);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', $abstractResultSetAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultSetAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getDom');
        $reflectionGetMethod->setAccessible(true);
        
        $dom = $reflectionGetMethod->invoke($abstractResultSetAdapter);
    }
    
    /**
     * Test that calling getXPath returns an instance of DOMDocument
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter::getXPath()
     */
    public function testGetXPath()
    {
        $abstractResultSetAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', array(), 'AbstractResultSetAdapter', false);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', $abstractResultSetAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultSetAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getXPath');
        $reflectionGetMethod->setAccessible(true);
        
        $dom = new \DOMDocument();
        $dom->loadXML($xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-28T08:08:03.926Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><artist-list count="153" offset="0"><artist id="ffafec4f-69d8-46c1-a09b-c3b8b25482ee" type="Group" ext:score="100"><name>Metal Skool</name><sort-name>Metal Skool</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>Danger Kitty</alias><alias>Metal Sludge All-Stars</alias><alias>National Lampoon\'s Metal Skool</alias><alias>Metal Shop</alias></alias-list></artist><artist id="db97aca2-0102-48ba-949c-f96d0d69562c" type="Person" ext:score="94"><name>Jeff Metal</name><sort-name>Metal, Jeff</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>J Metal</alias></alias-list><tag-list><tag count="1"><name>uk</name></tag><tag count="1"><name>photographer</name></tag><tag count="1"><name>designer</name></tag></tag-list></artist></artist-list></metadata>');
        
        $domXpath = $reflectionGetMethod->invoke($abstractResultSetAdapter, $dom);
        
        $this->assertInstanceOf('DOMXPath', $domXpath);
    }
    
    /**
     * Test that a call to getCreatedQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter::getCreatedQuery()
     */
    public function testCanGetCreatedQuery()
    {
        $abstractResultSetAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', array(), 'AbstractResultSetAdapter', false);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', $abstractResultSetAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultSetAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getCreatedQuery');
        $reflectionGetMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionGetMethod->invoke($abstractResultSetAdapter));
    }
    
}