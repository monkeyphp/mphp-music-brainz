<?php
/**
 * ReleaseGroup.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\ReleaseGroupResultAdapterInterface;
/**
 * ReleaseGroup
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ReleaseGroup extends AbstractResult
{

    /**
     * Constructor
     *
     * @param ReleaseGroupResultAdapterInterface $adapter The Adapter instance
     *
     * @return void
     */
    public function __construct(ReleaseGroupResultAdapterInterface $adapter)
    {
        $this->setAdapter($adapter);
    }

    public function getType()
    {
        return $this->getAdapter()->getType();
    }

    public function getTitle()
    {
        return $this->getAdapter()->getTitle();
    }

    public function getFirstReleaseDate()
    {
        return $this->getAdapter()->getFirstReleaseDate();
    }

    public function getPrimaryType()
    {
        return $this->getAdapter()->getPrimaryType();
    }
}