<?php
/**
 * Artist.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Result;

/**
 * Artist
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 *
 * @property string       $id             The MusicBrainz.org id
 * @property string       $score          The score of the Artist
 * @property string       $type           The type of the Artist
 * @property string       $country        The country the Artist originates from
 * @property string       $name           The name of the Artist
 * @property string       $sortName       The Artist sort name
 * @property string       $gender         The gender of the Artist
 * @property string       $disambiguation A string providing disambiguation
 * @property string       $end            A string representing the end date of the Artist
 * @property boolean      $ended          A boolean representing that the Artist has ended
 * @property \Traversable $tagList        A list of \MphpMusicBrainz\Result\Tag instances
 * @property \Traversable $aliasList      A list of aliases
 */
class Artist extends AbstractResult
{

    /**
     * Constructor
     *
     * @param \MphpMusicBrainz\Adapter\Interfaces\Result\ArtistResultAdapterInterface $adapter The Adapter instance
     *
     * @return void
     */
    public function __construct(\MphpMusicBrainz\Adapter\Interfaces\Result\ArtistResultAdapterInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * Return the Artist type string
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->getAdapter()->getType();
    }

    /**
     * Return the Artist country of origin
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->getAdapter()->getCountry();
    }

    /**
     * Return the Artist name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getAdapter()->getName();
    }

    /**
     * Return the Artist sort name string
     *
     * @return string|null
     */
    public function getSortName()
    {
        return $this->getAdapter()->getSortName();
    }

    /**
     * Return the Artist gender
     *
     * @return string|null
     */
    public function getGender()
    {
        return $this->getAdapter()->getGender();
    }

    /**
     * Return the Artist disambiguation
     *
     * @return string|null
     */
    public function getDisambiguation()
    {
        return $this->getAdapter()->getDisambiguation();
    }

    /**
     * Return a string representing the Artist begin date
     *
     * @return string|null
     */
    public function getBegin()
    {
        return $this->getAdapter()->getBegin();
    }

    /**
     * Return a string representing the Artist end date
     *
     * @return string|null
     */
    public function getEnd()
    {
        return $this->getAdapter()->getEnd();
    }

    /**
     * Return a boolean indicating that the Artist has ended
     *
     * @return boolean|null
     */
    public function getEnded()
    {
        return $this->getAdapter()->getEnded();
    }

    /**
     * Return an SplFixedArray instance containing Tag instances
     *
     * @return SplFixedArray|null
     */
    public function getTagList()
    {
        return $this->getAdapter()->getTagList();
    }

    /**
     * Return an SplFixedArray instance containing alias names for the Artist
     *
     * @return SplFixedArray|null
     */
    public function getAliasList()
    {
        return $this->getAdapter()->getAliasList();
    }

}