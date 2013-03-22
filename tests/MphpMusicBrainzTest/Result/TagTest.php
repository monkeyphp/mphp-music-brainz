<?php
/**
 * TagTest.php
 * 
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Result;

use MphpMusicBrainz\Result\Tag;
use PHPUnit_Framework_TestCase;

/**
 * TagTest
 * 
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class TagTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test that we can construct an instance of Tag
     *
     * @covers MphpMusicBrainz\Result\Tag::__construct
     */
    public function testCanConstructInstance()
    {
        $name = 'American Rock';
        $count = 1;

        $tag = new Tag($name, $count);

        $this->assertInstanceOf('MphpMusicBrainz\Result\Tag', $tag);

        $this->assertEquals($name, $tag->getName());
        $this->assertEquals($count, $tag->getCount());
    }

    /**
     * Test that we can retrieve the Tag name
     *
     * @covers MphpMusicBrainz\Result\Tag::getName()
     * @covers MphpMusicBrainz\Result\Tag::setName()
     */
    public function testCanGetName()
    {
        $name = 'Classic';

        $tag = new Tag($name);

        $this->assertEquals($name, $tag->getName());
    }

    /**
     * Test that we can retrieve the count property
     * 
     * @covers MphpMusicBrainz\Result\Tag::getCount()
     */
    public function testCanGetCount()
    {
        $name = 'Blues';
        $count = 5;
        
        $tag = new Tag($name, $count);

        $this->assertEquals($count, $tag->getCount());
    }

    /**
     * Test that attempting to create a Tag instance with an invalid
     * name string throws an InvalidArgumentException
     *
     * @covers MphpMusicBrainz\Result\Tag::setName()
     * @expectedException InvalidArgumentException
     */
    public function testSetNameThrowsInvalidArgumentException()
    {
        $tag = new Tag(new \stdClass());

        $this->assertInstanceOf('\MphpMusicBrainz\Result\Tag', $tag);
    }
    
}