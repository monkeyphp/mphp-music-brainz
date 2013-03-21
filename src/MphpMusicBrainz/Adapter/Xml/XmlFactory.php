<?php
/**
 * XmlFactory.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml;

use MphpMusicBrainz\Exception\InvalidResourceException;
use MphpMusicBrainz\Service\MusicBrainz;
use MphpMusicBrainz\Adapter\Interfaces\AdapterFactoryInterface;
use MphpMusicBrainz\Adapter\Xml\Result\ArtistResultAdapter;
use MphpMusicBrainz\Adapter\Xml\Result\LabelResultAdapter;
use MphpMusicBrainz\Adapter\Xml\Result\RecordingResultAdapter;
use MphpMusicBrainz\Adapter\Xml\Result\ReleaseGroupResultAdapter;
use MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter;
use MphpMusicBrainz\Adapter\Xml\Result\WorkResultAdapter;
use MphpMusicBrainz\Adapter\Xml\ResultSet\ArtistResultSetAdapter;
use MphpMusicBrainz\Adapter\Xml\ResultSet\LabelResultSetAdapter;
use MphpMusicBrainz\Adapter\Xml\ResultSet\RecordingResultSetAdapter;
use MphpMusicBrainz\Adapter\Xml\ResultSet\ReleaseGroupResultSetAdapter;
use MphpMusicBrainz\Adapter\Xml\ResultSet\ReleaseResultSetAdapter;
use MphpMusicBrainz\Adapter\Xml\ResultSet\WorkResultSetAdapter;

/**
 * XmlFactory
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class XmlFactory implements AdapterFactoryInterface
{

    /**
     * Return a ResultSetAdapter instance for the specified resource
     *
     * @param string $resource The name of the resource to return an adapter for
     * @param mixed  $results  The results as returned from the webservice
     *
     * @return ArtistResultSetAdapter|LabelResultSetAdapter|RecordingResultSetAdapter|ReleaseResultSetAdapter|ReleaseGroupResultSetAdapter|WorkResultSetAdapter
     * @throws InvalidResourceException
     */
    public function getResultSetAdapter($resource, $results)
    {
        switch($resource) {
            case MusicBrainz::RESOURCE_ARTIST:
                return new ArtistResultSetAdapter($results);

            case MusicBrainz::RESOURCE_LABEL:
                return new LabelResultSetAdapter($results);

            case MusicBrainz::RESOURCE_RECORDING:
                return new RecordingResultSetAdapter($results);

            case MusicBrainz::RESOURCE_RELEASE:
                return new ReleaseResultSetAdapter($results);

            case MusicBrainz::RESOURCE_RELEASE_GROUP:
                return new ReleaseGroupResultSetAdapter($results);

            case MusicBrainz::RESOURCE_WORK:
                return new WorkResultSetAdapter($results);

            default:
                throw new InvalidResourceException();
        }
    }

    public function getResultAdapter($resource, $results) // expects a DOMElement?!
    {
        switch($resource) {
            case MusicBrainz::RESOURCE_ARTIST:
                return new ArtistResultAdapter($results);

            case MusicBrainz::RESOURCE_LABEL:
                return new LabelResultAdapter($results);

            case MusicBrainz::RESOURCE_RECORDING:
                return new RecordingResultAdapter($results);

            case MusicBrainz::RESOURCE_RELEASE:
                return new ReleaseResultAdapter($results);

            case MusicBrainz::RESOURCE_RELEASE_GROUP:
                return new ReleaseGroupResultAdapter($results);

            case MusicBrainz::RESOURCE_WORK:
                return new WorkResultAdapter($results);

            default:
                throw new InvalidResourceException();
        }
    }

}

