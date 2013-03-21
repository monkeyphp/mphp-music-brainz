<?php
/**
 * ReleaseResultAdapterInterface.php
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
 * ArtistResultAdapterInterface
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
interface ReleaseResultAdapterInterface extends ResultAdapterInterface
{

    /**
     * Return the Artist instance that this Release is attributed to
     *
     * @return \MphpMusicBrainz\Result\Artist|null
     */
    public function getArtist();

    /**
     * Return a string representing the Asin
     *
     * @return string|null
     */
    public function getAsin();

    /**
     * Return a string represeting the barcode
     *
     * @return string|null
     */
    public function getBarcode();

    /**
     * Return a string representing the country
     *
     * @return string|null
     */
    public function getCountry();

    /**
     * Return a string representing the date of release
     *
     * @return string|null
     */
    public function getDate();

    /**
     * Return a string representing the language
     *
     * @return string|null
     */
    public function getLanguage();

    /**
     * Return a string representing the script
     *
     * @return string|null
     */
    public function getScript();

    /**
     * Return a string representing the status
     *
     * @return string|null
     */
    public function getStatus();

    /**
     * Return a string representing the title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * @return string|null
     */
    public function getQuality();

    /**
     * @return boolean|null
     */
    public function getCoverArtArtwork();

    /**
     * @return int|null
     */
    public function getCoverArtCount();

    /**
     * @return boolean|null
     */
    public function getCoverArtFront();

    /**
     * @return boolean|null
     */
    public function getCoverArtBack();

}