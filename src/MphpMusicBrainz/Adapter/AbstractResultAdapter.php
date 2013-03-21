<?php
/**
 * AbstractResultAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter;

/**
 * AbstractResultAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
abstract class AbstractResultAdapter implements \MphpMusicBrainz\Adapter\Interfaces\Result\ResultAdapterInterface
{

    /**
     * The MBID id of the result
     *
     * @var string
     */
    protected $id;

    /**
     * The relative search score for this result
     *
     * @var string
     */
    protected $score;

}