<?php
/**
 * AbstractResultAdapterTest.php
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
 * AbstractResultAdapterTest
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class AbstractResultAdapterTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test that calling getFactory returns an instance of 
     * \MphpMusicBrainz\Adapter\Xml\XmlFactory
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter::getFactory()
     */
    public function testCanGetFactory()
    {
        $abstractResultAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', array(), 'AbstractResultAdapter', false);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', $abstractResultAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultAdapter);
        $reflectionMethod = $reflectionObject->getMethod('getFactory');
        $reflectionMethod->setAccessible(true);
        
        $factory = $reflectionMethod->invoke($abstractResultAdapter);
        
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\XmlFactory', $factory);
    }
    
    /**
     * Test that we can retrieve the DOMElement
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter::getDomElement()
     * @covers MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter::setDomElement()
     */
    public function testCanGetSetDomElement()
    {
        $abstractResultAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', array(), 'AbstractResultAdapter', false);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', $abstractResultAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getDomElement');
        $reflectionGetMethod->setAccessible(true);
        
        $reflectionSetMethod = $reflectionObject->getMethod('setDomElement');
        $reflectionSetMethod->setAccessible(true);
        
        $this->assertNull($reflectionGetMethod->invoke($abstractResultAdapter));
        
        $domElement = new \DOMElement('root');
        $this->assertInstanceOf('DOMElement', $domElement);
        
        $this->assertSame($abstractResultAdapter, $reflectionSetMethod->invoke($abstractResultAdapter, $domElement));
        $this->assertSame($domElement, $reflectionGetMethod->invoke($abstractResultAdapter));
    }
    
    /**
     * Test that a call to getXPath with an invalid DOMElement will throw an
     * InvalidDOMElementException being thrown
     * 
     * @expectedException MphpMusicBrainz\Exception\InvalidDOMElementException
     * @covers MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter::getXPath()
     */
    public function testCanGetXPathWithInvalidDOMElementThrowsException()
    {
        $abstractResultAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', array(), 'AbstractResultAdapter', false);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', $abstractResultAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getXPath');
        $reflectionGetMethod->setAccessible(true);
        
        $domElement = new \DOMElement('root');
        
        $reflectionGetMethod->invoke($abstractResultAdapter, $domElement);
    }
    
    /**
     * Test that a call to getXPath will return an DOMXPath instance
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter::getXPath()
     */
    public function testCanGetXPath()
    {
        $abstractResultAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', array(), 'AbstractResultAdapter', false);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', $abstractResultAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getXPath');
        $reflectionGetMethod->setAccessible(true);
        
        $domElement = $this->getDomElement();
        
        $this->assertInstanceOf('DOMElement', $domElement);
        
        $this->assertInstanceOf('DOMXPath', $reflectionGetMethod->invoke($abstractResultAdapter, $domElement));
    }
    
    /**
     * Test that calling getAttributeId will return a string to use in an XPath
     * query to retrieve the id attribute
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter::getAttributeId()
     */
    public function testCanGetAttributeId()
    {
        $abstractResultAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', array(), 'AbstractResultAdapter', false);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', $abstractResultAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getAttributeId');
        $reflectionGetMethod->setAccessible(true);
        $this->assertInternalType('string', $reflectionGetMethod->invoke($abstractResultAdapter));
        
    }
    
    /**
     * Test that calling getAttribute score returns a string to be used in the 
     * DOMXPath query
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter::getAttributeScore()
     */
    public function testCanGetAttributeScore()
    {
        $abstractResultAdapter = $this->getMockForAbstractClass('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', array(), 'AbstractResultAdapter', false);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\AbstractResultAdapter', $abstractResultAdapter);
        
        $reflectionObject = new \ReflectionObject($abstractResultAdapter);
        
        $reflectionGetMethod = $reflectionObject->getMethod('getAttributeScore');
        $reflectionGetMethod->setAccessible(true);
        $this->assertInternalType('string', $reflectionGetMethod->invoke($abstractResultAdapter));
        
    }
    
    
    /**
     * Utility method for creating a DOMElement from an XML string
     *
     * @return DOMElement
     */
    protected function getDomElement()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-27T16:56:41.559Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><artist-list count="1" offset="0"><artist id="65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab" type="Group" ext:score="100"><name>Metallica</name><sort-name>Metallica</sort-name><country>US</country><life-span><begin>1981-10</begin><ended>false</ended></life-span><alias-list><alias>메탈리카</alias><alias>メタリカ</alias><alias>Metalica</alias></alias-list><tag-list><tag count="1"><name>américain</name></tag><tag count="1"><name>usa</name></tag><tag count="2"><name>speed metal</name></tag><tag count="1"><name>douchebag metal</name></tag><tag count="1"><name>american thrash metal</name></tag><tag count="3"><name>rock</name></tag><tag count="1"><name>90s</name></tag><tag count="1"><name>80s</name></tag><tag count="1"><name>seen live</name></tag><tag count="1"><name>rock and indie</name></tag><tag count="10"><name>thrash metal</name></tag><tag count="6"><name>heavy metal</name></tag><tag count="1"><name>thrash</name></tag><tag count="10"><name>metal</name></tag><tag count="1"><name>classic thrash metal</name></tag><tag count="1"><name>classic metal</name></tag><tag count="1"><name>los angeles</name></tag><tag count="1"><name>california</name></tag><tag count="1"><name>bay area</name></tag><tag count="1"><name>80s metal</name></tag><tag count="1"><name>90s metal</name></tag><tag count="1"><name>80s thrash metal</name></tag><tag count="6"><name>american</name></tag><tag count="5"><name>hard rock</name></tag><tag count="1"><name>band</name></tag></tag-list></artist></artist-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        $domElement = $xpath->query('/ns:metadata/ns:artist-list/ns:artist')->item(0);
        return $domElement;
    }
}