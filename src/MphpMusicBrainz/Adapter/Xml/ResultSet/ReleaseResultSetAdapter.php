<?php
/**
 * ReleaseResultSetAdapter.php
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
 * ReleaseResultSetAdapter
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ReleaseResultSetAdapter extends AbstractResultSetAdapter
{

    /**
     * DOMXPath query string used to retrieve the current available count of
     * results from the webservice
     *
     * @var string
     */
    protected $countQuery = '/ns:metadata/ns:release-list/@count';

    /**
     * DOMXPath query string used to retrieve the result offset
     *
     * @var string
     */
    protected $offsetQuery = '/ns:metadata/ns:release-list/@offset';

    /**
     * DOMXPath query string used to retrieve the DOMNodes representing results
     *
     * @var string
     */
    protected $domListQuery = '/ns:metadata/ns:release-list/ns:recording';

    /**
     * Classname of the class used to represent a result
     *
     * @var string
     */
    protected $resultClass = 'MphpMusicBrainz\Result\Release';

}