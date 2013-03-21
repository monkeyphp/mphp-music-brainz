<?php
/**
 * AdapterFactory.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter;

use MphpMusicBrainz\Adapter\Json\JsonFactory;
use MphpMusicBrainz\Adapter\Xml\XmlFactory;
use MphpMusicBrainz\Exception\InvalidFormatException;
use MphpMusicBrainz\Service\MusicBrainz;

/**
 * AdapterFactory
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class AdapterFactory
{

    /**
     * Statically return an AdapterFactoryInterface instance for the specified
     * format type
     *
     * @param string $format String format
     *
     * @throws InvalidFormatException
     * @return JsonFactory|XmlFactory
     */
    public static function getFactory($format)
    {
        switch($format) {
            case MusicBrainz::FORMAT_JSON:
                return new JsonFactory();

            case MusicBrainz::FORMAT_XML:
               return new XmlFactory();

            default:
                throw new InvalidFormatException('Invalid format supplied');
        }
    }

}