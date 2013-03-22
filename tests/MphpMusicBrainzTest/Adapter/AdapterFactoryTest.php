<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace MphpMusicBrainzTest\Adapter;
/**
 * Description of AdapterFactoryTest
 *
 * @author David White [monkeyphp] <david@monkeyphp.com>
 */
class AdapterFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that when we pass 'json' to the factory we recieve a
     * JSONFactory instance
     *
     * @covers MphpMusicBrainz\Adapter\AdapterFactory::getFactory()
     */
    public function testCanGetJsonFactory()
    {
        $factory = \MphpMusicBrainz\Adapter\AdapterFactory::getFactory('json');
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Json\JsonFactory', $factory);
    }

    /**
     * @covers MphpMusicBrainz\Adapter\AdapterFactory::getFactory()
     */
    public function testCanGetXmlFactory()
    {
        $factory = \MphpMusicBrainz\Adapter\AdapterFactory::getFactory('xml');
        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\XmlFactory', $factory);
    }

    /**
     * @expectedException MphpMusicBrainz\Exception\InvalidFormatException
     * @covers MphpMusicBrainz\Adapter\AdapterFactory::getFactory()
     */
    public function testCallingGetFactoryWithInvalidResourceThrowsException()
    {
        $factory = \MphpMusicBrainz\Adapter\AdapterFactory::getFactory(new \stdClass());
    }

}