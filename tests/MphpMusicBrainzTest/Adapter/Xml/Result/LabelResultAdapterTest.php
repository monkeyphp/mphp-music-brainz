<?php
/**
 * LabelResultAdapterTest.php
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
 * LabelResultAdapterTest
 *
 * @category   MphpMusicBrainzTest
 * @package    MphpMusicBrainzTest
 * @subpackage MphpMusicBrainzTest\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class LabelResultAdapterTest extends PHPUnit_Framework_TestCase
{

    /**
     * Utility method for creating a DOMElement from an XML string
     *
     * @return DOMElement
     */
    protected function getDomElement()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-01T18:05:02.151Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><label-list count="24" offset="0"><label id="360f0149-5510-400b-a281-cb2d735f9f8e" type="Original Production" ext:score="100"><name>20th Century Fox Records</name><sort-name>20th Century Fox Records</sort-name><disambiguation>was 20th Fox Records prior to 1963</disambiguation><country>US</country><life-span><begin>1963</begin><end>1982</end><ended>true</ended></life-span><alias-list><alias>20th Century Fox Records</alias></alias-list></label></label-list></metadata>';
        /*$xml = '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><label type="Original Production" id="360f0149-5510-400b-a281-cb2d735f9f8e"><name>20th Century Fox Records</name><sort-name>20th Century Fox Records</sort-name><disambiguation>was 20th Fox Records prior to 1963</disambiguation><country>US</country><life-span><begin>1963</begin><end>1982</end><ended>true</ended></life-span></label></metadata>';*/
        $domDocument = new DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        // $domElement = $xpath->query('/ns:metadata/ns:label-list/ns:label')->item(0);
        $domElement = $xpath->query('/ns:metadata/ns:label-list/ns:label|/ns:metadata/ns:label')->item(0);
//        var_dump($domElement);
        // echo $domElement->ownerDocument->saveXML($domElement);
        return $domElement;
    }

    /**
     * Test that we can construct an instance of LabelResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::__construct()
     */
    public function testCanConstructInstance()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter', $labelAdapter);
    }

    /**
     * Test that we can retrieve an instance of SplFixedArray containing
     * aliases
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::getAliasList()
     */
    public function testCanGetAliasList()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $aliasList = $labelAdapter->getAliasList();

        $this->assertInstanceOf('Traversable', $aliasList);
    }

    /**
     * Test that calling getAliasListQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::getAliasListQuery()
     */
    public function testGetAliasListQuery()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($labelAdapter);
        $reflectionMethod = $reflectionObject->getMethod('getAliasListQuery');
        $reflectionMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionMethod->invoke($labelAdapter));
    }
    
    /**
     * Test that calling getAttributeType returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::getAttributeType()
     */
    public function testGetAttributeType()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($labelAdapter);
        $reflectionMethod = $reflectionObject->getMethod('getAttributeType');
        $reflectionMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionMethod->invoke($labelAdapter));
    }
    
    /**
     * Test that we can retrieve the begin date string from the LabelResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::getBegin()
     */
    public function testCanGetBegin()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertEquals('1963', $labelAdapter->getBegin());
    }

    /**
     * Test that calling getBeginQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::getBeginQuery()
     */
    public function testGetBeginQuery()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($labelAdapter);
        $reflectionMethod = $reflectionObject->getMethod('getBeginQuery');
        $reflectionMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionMethod->invoke($labelAdapter));
    }
    
    /**
     * Test that we can retrieve the string representing the country from the LabelResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::getCountry()
     */
    public function testCanGetCountry()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertEquals('US', $labelAdapter->getCountry());
    }

    /**
     * Test that calling getCountryQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::getCountryQuery()
     */
    public function testGetCountryQuery()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($labelAdapter);
        $reflectionMethod = $reflectionObject->getMethod('getCountryQuery');
        $reflectionMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionMethod->invoke($labelAdapter));
    }
    
    /**
     * Test that we can retrieve the disambiguation value from the LabelResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::getDisambiguation()
     */
    public function testCanGetDisambiguation()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertEquals('was 20th Fox Records prior to 1963', $labelAdapter->getDisambiguation());
    }

    /**
     * Test that calling getDisambiguationQuery returns a string
     * 
     * @covers MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter::getDisambiguationQuery()
     */
    public function testGetDisambiguationQuery()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        
        $reflectionObject = new \ReflectionObject($labelAdapter);
        $reflectionMethod = $reflectionObject->getMethod('getDisambiguationQuery');
        $reflectionMethod->setAccessible(true);
        
        $this->assertInternalType('string', $reflectionMethod->invoke($labelAdapter));
    }
    
    
    
    
    public function testCanGetEnd()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertEquals('1982', $labelAdapter->getEnd());
    }

    public function testCanGetEnded()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertTrue($labelAdapter->getEnded());
    }

    public function testCanGetLabelCode()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertNull($labelAdapter->getLabelCode());
    }

    public function testCanGetName()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertEquals('20th Century Fox Records', $labelAdapter->getName());
    }

    public function testCanGetSortName()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertEquals('20th Century Fox Records', $labelAdapter->getSortName());
    }

    public function testCanGetType()
    {
        $labelAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter($this->getDomElement());
        $this->assertEquals('Original Production', $labelAdapter->getType());
    }

}