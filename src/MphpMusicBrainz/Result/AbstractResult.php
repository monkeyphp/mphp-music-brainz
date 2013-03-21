<?php
/**
 * AbstractResult.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\ResultAdapterInterface;

/**
 * AbstractResult
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
abstract class AbstractResult
{

    /**
     * Instance of ResultAdapterInterface
     *
     * @var ResultAdapterInterface
     */
    protected $adapter;

    /**
     * Return the ResultAdapterInterface that this Result class uses to access
     * the results retured from the webservice
     *
     * @return ResultAdapterInterface
     */
    protected function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Set the ResultAdapterInterface that this Result class will use to access
     * the result data returned from the web service
     *
     * @param \MphpMusicBrainz\Adapter\Interfaces\Result\ResultAdapterInterface $adapter ResultAdapterInterface instance
     *
     * @return \MphpMusicBrainz\Result\AbstractResult
     */
    protected function setAdapter(ResultAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        return $this;
    }

    /**
     * Return the MBID/id value of the Result
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->getAdapter()->getId();
    }

    /**
     * Return the score of the Result
     *
     * @return string|null
     */
    public function getScore()
    {
        return $this->getAdapter()->getScore();
    }

}