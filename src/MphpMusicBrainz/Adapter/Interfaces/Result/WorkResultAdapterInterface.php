<?php
/**
 * WorkResultAdapterInterface.php
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
 * WorkResultAdapterInterface
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
interface WorkResultAdapterInterface extends ResultAdapterInterface
{

    /**
     * Return the type of the Work
     *
     * @return string|null
     */
    public function getType();

    /**
     * Return the title of the Work
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Return the language of the Work
     *
     * @return string|null
     */
    public function getLanguage();

    /**
     * Return a Traversable list of aliases for the Work
     *
     * @return \Traversable
     */
    public function getAliasList();

    /**
     * Return a Traversable list of relations for the Work
     *
     * @return \Traversable
     */
    public function getRelationList();

    /**
     * Return a Traversable list of Tags for the Work
     */
    public function getTagList();

}