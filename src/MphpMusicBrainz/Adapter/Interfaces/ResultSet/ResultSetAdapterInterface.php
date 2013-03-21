<?php
/**
 * ResultSetAdapterInterface.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Interfaces\ResultSet;

use Iterator;

/**
 * ResultSetAdapterInterface
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
interface ResultSetAdapterInterface extends Iterator
{

    /**
     * Return the count of the results in the ResultSet
     *
     * @return int
     */
    public function getCount();

    /**
     * Return the created DateTime
     *
     * @return \DateTime
     */
    public function getCreated();

    /**
     * Return the ResultSet offset
     *
     * @return string
     */
    public function getOffset();

}