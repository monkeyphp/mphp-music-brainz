<?php
/**
 * RecordingResultSetAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml\ResultSet;

/**
 * RecordingResultSetAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class RecordingResultSetAdapter extends AbstractResultSetAdapter
{

    /**
     * The name of the adapter class to inject into the result class instance
     *
     * @var string
     */
    protected $resultAdapter = \MphpMusicBrainz\Service\MusicBrainz::RESOURCE_RECORDING;


    /**
     * DOMXPath query string used to retrieve a count of Recordings available
     *
     * @var string
     */
    protected $countQuery = '/ns:metadata/ns:recording-list/@count';

    /**
     * DOMXPath query string used to retrieve the current query offset
     *
     * @var string
     */
    protected $offsetQuery = '/ns:metadata/ns:recording-list/@offset';

    /**
     * DOMXPath query string used to return the DOMNodes representing each
     * result class
     *
     * @var string
     */
    protected $domListQuery = '/ns:metadata/ns:recording-list/ns:recording';

    /**
     * Classname of the class used to represent a result
     *
     * @var string
     */
    protected $resultClass = 'MphpMusicBrainz\Result\Recording';

}