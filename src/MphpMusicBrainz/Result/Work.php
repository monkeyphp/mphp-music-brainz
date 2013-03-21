<?php
/**
 * Work.php
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
 * Work
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class Work extends AbstractResult
{

    /**
     * Constructor
     *
     * @param \MphpMusicBrainz\Adapter\Interfaces\Result\WorkResultAdapterInterface $adapter The Adapter instance
     *
     * @return void
     */
    public function __construct(\MphpMusicBrainz\Adapter\Interfaces\Result\WorkResultAdapterInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

}