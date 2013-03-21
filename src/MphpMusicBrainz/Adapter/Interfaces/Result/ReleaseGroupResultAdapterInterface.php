<?php
/**
 * ReleaseGroupResultAdapterInterface.php
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
 * ReleaseGroupResultAdapterInterface
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
interface ReleaseGroupResultAdapterInterface extends ResultAdapterInterface
{

    /**
     * Return a string representing the type of ReleaseGroup
     *
     * @return string|null
     */
    public function getType();

    /**
     * Return a string representing the first release date of the ReleaseGroup
     *
     * @return string|null
     */
    public function getFirstReleaseDate();

    /**
     * Return the title of the ReleaseGroup
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Return the primary type of the ReleaseGroup
     *
     * @return string|null
     */
    public function getPrimaryType();

    /**
     * @return \Traversable
     */
    public function getSecondaryTypeList();

    /**
     * Return the Artist
     *
     * @return MphpMusicBrainz\Result\Artist|null
     */
    public function getArtist();

    /**
     * Return a Traversable instance containing instances of
     * MphpMusicBrainz\Result\Artist
     *
     * @return \Traversable
     */
    public function getReleaseList();
}