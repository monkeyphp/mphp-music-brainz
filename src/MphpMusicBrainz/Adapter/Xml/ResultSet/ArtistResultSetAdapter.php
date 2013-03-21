<?php
/**
 * ArtistResultSet.php
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
 * ArtistResultSet
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ArtistResultSetAdapter extends AbstractResultSetAdapter
{

    /**
     * The name of the adapter class to inject into the result class instance
     *
     * @var string
     */
    protected $resultAdapter = \MphpMusicBrainz\Service\MusicBrainz::RESOURCE_ARTIST;

    /**
     * DOMXPath query used to retrieve count of returned results
     *
     * @var string
     */
    protected $countQuery = '/ns:metadata/ns:artist-list/@count';

    /**
     * DOMXPath query string used to retrieve the offset
     *
     * @var string
     */
    protected $offsetQuery = '/ns:metadata/ns:artist-list/@offset';

    /**
     * DOMXPath search string used for retrieving the Artists from the DOMDocument
     *
     * @var string
     */
    protected $domListQuery = '/ns:metadata/ns:artist-list/ns:artist';

    /**
     * The name of the class representing a single Result
     *
     * @var string
     */
    protected $resultClass = 'MphpMusicBrainz\Result\Artist';

}