<?php
/**
 * LabelResultAdapterInterface.php
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Interfaces\Result;

/**
 * LabelResultAdapterInterface
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
interface LabelResultAdapterInterface extends ResultAdapterInterface
{

    /**
     * Return a Traversable instance of aliases
     *
     * @return \Traversable|null
     */
    public function getAliasList();

    /**
     * Return a string representing the begin date of the Label
     *
     * @return string|null
     */
    public function getBegin();

    /**
     * Return a string representing the country
     *
     * @return string|null
     */
    public function getCountry();

    /**
     * Return a string representing the disambiguation of the Label
     *
     * @return string|null
     */
    public function getDisambiguation();

    /**
     * Return a string representing the end date of the Label
     *
     * @return string|null
     */
    public function getEnd();

    /**
     * Return a boolean indicating if the Label has ended or not
     *
     * @return boolean|null
     */
    public function getEnded();

    /**
     * Return a string representing the Label code
     *
     * @return string|null
     */
    public function getLabelCode();

    /**
     * Return a string representing the name of the Label
     *
     * @return string|null
     */
    public function getName();

    /**
     * Return a string representing the sort name of the Label
     *
     * @return string|null
     */
    public function getSortName();

    /**
     * Return a string representing the type of Label
     *
     * @return string|null
     */
    public function getType();

}
