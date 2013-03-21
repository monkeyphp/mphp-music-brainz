<?php
/**
 * RecordingResultAdapterInterface.php
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
 * RecordingResultAdapterInterface
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
interface RecordingResultAdapterInterface extends ResultAdapterInterface
{

    /**
     * Return the instance of \MphpMusicBrainz\Result\Artist that this recording
     * is attributed to
     *
     * @return \MphpMusicBrainz\Result\Artist|null
     */
    public function getArtist();

    /**
     * Return the disambiguation property of the Artist
     *
     * @return string|null
     */
    public function getDisambiguation();

    /**
     * Return a Traversable instance containing Isrc strings
     *
     * @return \Traversable
     */
    public function getIsrcList();

    /**
     * Return a string describing the length of the recording
     *
     * @return string|null
     */
    public function getLength();

    /**
     * Return a Traversable containing Puid strings
     *
     * @return \Traversable
     */
    public function getPuidList();

    /**
     * Return a Traversable containing Release records
     *
     * @return \Traversable
     */
    public function getReleaseList();

    /**
     * Return the title of the Recording
     *
     * @return string|null
     */
    public function getTitle();

}