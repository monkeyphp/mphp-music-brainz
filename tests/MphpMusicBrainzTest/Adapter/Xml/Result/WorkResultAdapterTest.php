<?php
/**
 * WorkResultTest.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Adapter\Xml\Result;

use PHPUnit_Framework_TestCase;

/**
 * WorkResultTest
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class WorkResultAdapterTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test that we can construct an instance
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter::__construct()
     */
    public function testCanConstructInstance()
    {
        $workResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter($this->getDomElement());

        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter', $workResultAdapter);
    }

    /**
     * Test that we can retrieve the alias list
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter::getAliasList()
     */
    public function testGetAliasList()
    {
        $workResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter($this->getDomElement());
        $aliasList = $workResultAdapter->getAliasList();

        $this->assertInstanceOf('Traversable', $aliasList);
    }

    public function testGetAliasListQuery()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that we can retrieve the language from the WorkResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter::getLanguage()
     */
    public function testCanGetLanguage()
    {
        $workResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter($this->getDomElement());
        $language = $workResultAdapter->getLanguage();

        $this->assertInternalType('string', $language);
        $this->assertEquals('eng', $language);
    }

    public function testGetLanguageQuery()
    {
        $this->markTestIncomplete();
    }

    public function testCanGetRelationList()
    {
        $this->markTestIncomplete();
    }

    public function testCanGetTagList()
    {
        $this->markTestIncomplete();
    }

    public function testGetTagListQuery()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that we can retrieve the title
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter::getTitle()
     */
    public function testCanGetTitle()
    {
        $workResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter($this->getDomElement());
        $title = $workResultAdapter->getTitle();

        $this->assertInternalType('string', $title);
        $this->assertEquals('Metal', $title);
    }

    public function testGetTitleQuery()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test that we can retrieve the type
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter::getType()
     */
    public function testCanGetType()
    {
        $workResultAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter($this->getDomElement());
        $type = $workResultAdapter->getType();

        $this->assertInternalType('string', $type);
        $this->assertEquals('Song', $type);
    }

    /**
     * Test that calling getAttributeType returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter::getAttributeType()
     */
    public function testGetAttributeType()
    {
        $this->markTestIncomplete();
    }

    /**
     * http://www.musicbrainz.org/ws/2/work?query=%22metal%22&limit=1&fmt=xml
     *
     * @return type
     */
    protected function getDomElement()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-01T09:52:16.926Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><work-list count="153" offset="0"><work id="72a94694-9d02-3dcc-b1e2-fefc5173e6d2" type="Song" ext:score="100"><title>Metal</title><language>eng</language><alias-list><alias>Metal (demo version)</alias></alias-list><relation-list target-type="artist"><relation type="composer"><direction>backward</direction><artist id="6cb79cb2-9087-44d4-828b-5c6fdff2c957"><name>Gary Numan</name><sort-name>Numan, Gary</sort-name></artist></relation><relation type="lyricist"><direction>backward</direction><artist id="6cb79cb2-9087-44d4-828b-5c6fdff2c957"><name>Gary Numan</name><sort-name>Numan, Gary</sort-name></artist></relation></relation-list></work></work-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        $domElement = $xpath->query('/ns:metadata/ns:work-list/ns:work')->item(0);

        return $domElement;
    }

}