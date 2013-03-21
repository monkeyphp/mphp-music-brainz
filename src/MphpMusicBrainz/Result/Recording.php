<?php
/**
 * Recording.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\RecordingResultAdapterInterface;

/**
 * Recording
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class Recording extends AbstractResult
{

    /**
     * Constructor
     *
     * @param RecordingResultAdapterInterface $adapter The Adapter instance
     *
     * @return void
     */
    public function __construct(RecordingResultAdapterInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * Return the instance of \MphpMusicBrainz\Result\Artist that this recording
     * is attributed to
     *
     * @return \MphpMusicBrainz\Result\Artist|null
     */
    public function getArtist()
    {
        return $this->getAdapter()->getArtist();
    }

    /**
     * Return the disambiguation property of the Artist
     *
     * @return string|null
     */
    public function getDisambiguation()
    {
        return $this->getAdapter()->getDisambiguation();
    }

    /**
     * Return a Traversable instance containing Isrc strings
     *
     * @return \Traversable
     */
    public function getIsrcList()
    {
        return $this->getAdapter()->getIsrcList();
    }

    /**
     * Return a string describing the length of the recording
     *
     * @return string|null
     */
    public function getLength()
    {
        return $this->getAdapter()->getLength();
    }

    /**
     * Return a Traversable containing Puid strings
     *
     * @return \Traversable
     */
    public function getPuidList()
    {
        return $this->getAdapter()->getPuidList();
    }

    /**
     * Return a Traversable containing Release records
     *
     * @return \Traversable
     */
    public function getReleaseList()
    {
        return $this->getAdapter()->getReleaseList();
    }

    /**
     * Return the title of the Recording
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getAdapter()->getTitle();
    }

}