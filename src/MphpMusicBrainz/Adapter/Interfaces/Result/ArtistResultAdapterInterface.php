<?php
/**
 * ArtistResultAdapterInterface.php
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
interface ArtistResultAdapterInterface extends ResultAdapterInterface
{

    /**
     * Return the type of the Artist
     *
     * @return string|null
     */
    public function getType();

    /**
     * Return the country of origin for the Artist
     *
     * @return string|null
     */
    public function getCountry();

    /**
     * Return the name property of the Artist
     *
     * @return string|null
     */
    public function getName();

    /**
     * Return the sort name property of the Artist
     *
     * @return string|null
     */
    public function getSortName();

    /**
     * Return the gender property of the Artist
     *
     * @return string|null
     */
    public function getGender();

    /**
     * Return the disambiguation property of the Artist
     *
     * @return string|null
     */
    public function getDisambiguation();

    /**
     * Return a string representing the date the Artist began
     *
     * @return string|null
     */
    public function getBegin();

    /**
     * Return a string representing the date that the Artist ended
     *
     * @return string|null
     */
    public function getEnd();

    /**
     * Return a boolean indicating that the Artist has ended
     */
    public function getEnded();

    /**
     * Retuern a Traversable instance containing a list of instances of
     * \MphpMusicBrainz\Result\Tag
     *
     * @return \Traversable
     */
    public function getTagList();

    /**
     * Return a Traversable instance containing a list of alias strings for the
     * Artist
     *
     * @return \Traversable
     */
    public function getAliasList();

}