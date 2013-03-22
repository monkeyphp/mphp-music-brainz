<?php
/**
 * LabelResultSetAdapterTest.php
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
 * LabelResultSetAdapterTest
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class LabelResultSetAdapterTest extends \PHPUnit_Framework_TestCase
{
    // http://www.musicbrainz.org/ws/2/label?query=fox&limit=2
    protected $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-03-02T18:42:46.602Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><label-list count="24" offset="0"><label id="360f0149-5510-400b-a281-cb2d735f9f8e" type="Original Production" ext:score="100"><name>20th Century Fox Records</name><sort-name>20th Century Fox Records</sort-name><disambiguation>was 20th Fox Records prior to 1963</disambiguation><country>US</country><life-span><begin>1963</begin><end>1982</end><ended>true</ended></life-span><alias-list><alias>20th Century Fox Records</alias></alias-list></label><label id="be74d290-be19-4f20-8b38-be4aa80c2a4d" type="Production" ext:score="100"><name>Bear Hearts Fox Records</name><sort-name>Bear Hearts Fox Records</sort-name><country>US</country><life-span><begin>2012-06-01</begin><ended>false</ended></life-span><alias-list><alias>Bear Hearts Fox</alias></alias-list></label></label-list></metadata>';

    /**
     * Test that we can construct an instance of the LabelResultSetAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::__construct()
     */
    public function testCanConstructInstance()
    {
        $labelResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter($this->xml);

        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter', $labelResultSetAdapter);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter', $labelResultSetAdapter);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\AbstractResultSetAdapter', $labelResultSetAdapter);
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Interfaces\ResultSet\ResultSetAdapterInterface', $labelResultSetAdapter);
        $this->assertInstanceOf('Iterator', $labelResultSetAdapter);
    }

    /**
     * Test that when we call current() we recieve an instance of
     * MphpMusicBrainz\Result\LabelResult
     *
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::current()
     */
    public function testCurrent()
    {
        $labelResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter($this->xml);
        $label = $labelResultSetAdapter->current();

        $this->assertInstanceof('MphpMusicBrainz\Result\Label', $label);
    }

    /**
     * Test that we can retrieve the count
     *
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::getCount()
     */
    public function testCanGetCount()
    {
        $labelResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter($this->xml);
        $this->assertEquals(24, $labelResultSetAdapter->getCount());
    }

    /**
     * Test that we can retrieve the created
     *
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::getCreated
     */
    public function testCanGetCreated()
    {
        $labelResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter($this->xml);
        $this->assertInstanceOf('DateTime', $labelResultSetAdapter->getCreated());
    }

    /**
     * Test that we can retrieve the offset
     *
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::getOffset()
     */
    public function testCanGetOffset()
    {
        $labelResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter($this->xml);
        $this->assertEquals(0, $labelResultSetAdapter->getOffset());
    }

    /**
     * Test that we can iterate through the LabelResultSet
     *
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::current()
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::valid()
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::key()
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::rewind()
     * @covers MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter::next()
     */
    public function testIterate()
    {
        $labelResultSetAdapter = new \MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter($this->xml);
        foreach ($labelResultSetAdapter as $result) {
            $this->assertInstanceOf('MphpMusicBrainz\Result\Label', $result);
        }
    }

}