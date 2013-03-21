<?php
/**
 * XmlFactoryTest.php
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
namespace MphpMusicBrainzTest\Adapter;

/**
 * XmlFactoryTest
 *
 * @category
 * @package
 * @author    David White <dwhite@eandl.co.uk>
 * @copyright 2013 E&L http://www.eandl.co.uk
 * @license   E&L http://www.eandl.co.uk
 * @version   Release: ##VERSION##
 * @link      http://www.eandl.co.uk
 */
class XmlFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that we can retrieve various adapters from the factory
     *
     * @covers MphpMusicBrainz\Adapter\Xml\XmlFactory::getResultSetAdapter()
     */
    public function testCanGetArtistResultSetAdapter()
    {
        $factory = new \MphpMusicBrainz\Adapter\Xml\XmlFactory();
        $artistXml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-28T08:08:03.926Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><artist-list count="153" offset="0"><artist id="ffafec4f-69d8-46c1-a09b-c3b8b25482ee" type="Group" ext:score="100"><name>Metal Skool</name><sort-name>Metal Skool</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>Danger Kitty</alias><alias>Metal Sludge All-Stars</alias><alias>National Lampoon\'s Metal Skool</alias><alias>Metal Shop</alias></alias-list></artist><artist id="db97aca2-0102-48ba-949c-f96d0d69562c" type="Person" ext:score="94"><name>Jeff Metal</name><sort-name>Metal, Jeff</sort-name><life-span><ended>false</ended></life-span><alias-list><alias>J Metal</alias></alias-list><tag-list><tag count="1"><name>uk</name></tag><tag count="1"><name>photographer</name></tag><tag count="1"><name>designer</name></tag></tag-list></artist></artist-list></metadata>';
        $artistResultSetAdapter = $factory->getResultSetAdapter(\MphpMusicBrainz\Service\MusicBrainz::RESOURCE_ARTIST, $artistXml);

        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter', $artistResultSetAdapter);
    }

}