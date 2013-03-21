<?php
/**
 * ResultAdapterInterface.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Interfaces\Result;

/**
 * ResultAdapterInterface
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
interface ResultAdapterInterface
{

    /**
     * Return the MBID/id of the result
     *
     * @return string|null
     */
    public function getId();

    /**
     * Return the score of the result
     *
     * @return string|null
     */
    public function getScore();

}