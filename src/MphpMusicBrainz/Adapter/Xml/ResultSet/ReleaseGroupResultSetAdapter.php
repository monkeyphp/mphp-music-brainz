<?php
/**
 * ReleaseGroupResultSetAdapter.php
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
 * ReleaseGroupResultSetAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ReleaseGroupResultSetAdapter extends \MphpMusicBrainz\Adapter\Xml\ResultSet\AbstractResultSetAdapter
{

    /**
     * The name of the adapter class to inject into the result class instance
     *
     * @var string
     */
    protected $resultAdapter = \MphpMusicBrainz\Service\MusicBrainz::RESOURCE_RELEASE_GROUP;

    /**
     * DOMXPath query used to retrieve count of returned results
     *
     * @var string
     */
    protected $countQuery = '/ns:metadata/ns:release-group-list/@count';

    /**
     * DOMXPath query string used to retrieve the offset
     *
     * @var string
     */
    protected $offsetQuery = '/ns:metadata/ns:release-group-list/@offset';

    /**
     * DOMXPath search string used for retrieving the Artists from the DOMDocument
     *
     * @var string
     */
    protected $domListQuery = '/ns:metadata/ns:release-group-list/ns:label';

    /**
     * The name of the class representing a single Result
     *
     * @var string
     */
    protected $resultClass = 'MphpMusicBrainz\Result\ReleaseGroup';

}