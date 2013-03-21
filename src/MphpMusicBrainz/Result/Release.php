<?php
/**
 * Release.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\ReleaseResultAdapterInterface;

/**
 * Release
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class Release extends AbstractResult
{

    /**
     * Constructor
     *
     * @param ReleaseResultAdapterInterface $adapter The Adapter instance
     *
     * @return void
     */
    public function __construct(ReleaseResultAdapterInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * Return the Artist instance that this Release is attributed to
     *
     * @return \MphpMusicBrainz\Result\Artist|null
     */
    public function getArtist()
    {
        return $this->getAdapter()->getArtist();
    }

    /**
     * Return a string representing the Asin
     *
     * @return string|null
     */
    public function getAsin()
    {
        return $this->getAdapter()->getAsin();
    }

    /**
     * Return a string represeting the barcode
     *
     * @return string|null
     */
    public function getBarcode()
    {
        return $this->getAdapter()->getBarcode();
    }

    /**
     * Return a string representing the country
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->getAdapter()->getCountry();
    }

    /**
     * Return a string representing the date of release
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->getAdapter()->getDate();
    }

    /**
     * Return a string representing the language
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->getAdapter()->getLanguage();
    }

    /**
     * Return a string representing the script
     *
     * @return string|null
     */
    public function getScript()
    {
        return $this->getAdapter()->getScript();
    }

    /**
     * Return a string representing the status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->getAdapter()->getStatus();
    }

    /**
     * Return a string representing the title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getAdapter()->getTitle();
    }

    /**
     * Return a string representing the quality of the Release
     *
     * @return string|null
     */
    public function getQuality()
    {
        return $this->getAdapter()->getQuality();
    }

    /**
     *
     * @return boolean|null
     */
    public function getCoverArtArtwork()
    {
        return $this->getAdapter()->getCoverArtArtwork();
    }

    /**
     *
     * @return int|null
     */
    public function getCoverArtCount()
    {
        return $this->getAdapter()->getCoverArtCount();
    }

    /**
     * @return boolean|null
     */
    public function getCoverArtFront()
    {
        return $this->getAdapter()->getCoverArtFront();
    }

    /**
     * @return boolean|null
     */
    public function getCoverArtBack()
    {
        return $this->getAdapter()->getCoverArtBack();
    }

}