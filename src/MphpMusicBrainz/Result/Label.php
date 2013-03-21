<?php
/**
 * Label.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\LabelResultAdapterInterface;

/**
 * Label
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class Label extends AbstractResult
{

    /**
     * Constructor
     *
     * @param LabelResultAdapterInterface $adapter
     *
     * @return void
     */
    public function __construct(LabelResultAdapterInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * Return a Traversable instance of aliases
     *
     * @return \Traversable|null
     */
    public function getAliasList()
    {
        return $this->getAdapter()->getAliasList();
    }

    /**
     * Return a string representing the begin date of the Label
     *
     * @return string|null
     */
    public function getBegin()
    {
        return $this->getAdapter()->getBegin();
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
     * Return a string representing the disambiguation of the Label
     *
     * @return string|null
     */
    public function getDisambiguation()
    {
        return $this->getAdapter()->getDisambiguation();
    }

    /**
     * Return a string representing the end date of the Label
     *
     * @return string|null
     */
    public function getEnd()
    {
        return $this->getAdapter()->getEnd();
    }

    /**
     * Return a boolean indicating if the Label has ended or not
     *
     * @return boolean|null
     */
    public function getEnded()
    {
        return $this->getAdapter()->getEnded();
    }

    /**
     * Return a string representing the Label code
     *
     * @return string|null
     */
    public function getLabelCode()
    {
        return $this->getAdapter()->getLabelCode();
    }

    /**
     * Return a string representing the name of the Label
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getAdapter()->getName();
    }

    /**
     * Return a string representing the sort name of the Label
     *
     * @return string|null
     */
    public function getSortName()
    {
        return $this->getAdapter()->getSortName();
    }

    /**
     * Return a string representing the type of Label
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->getAdapter()->getType();
    }

}