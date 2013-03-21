<?php
/**
 * Tag.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Result;

use InvalidArgumentException;

/**
 * Tag
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class Tag
{

    /**
     * The name of the Tag
     *
     * @var string
     */
    protected $name;

    /**
     * Count of the Tag frequency
     *
     * @var int|null
     */
    protected $count;

    /**
     * Constructor
     *
     * @param string   $name  The name of the Tag
     * @param int|null $count The frequency of the Tag
     *
     * @return void
     */
    public function __construct($name, $count = null)
    {
        $this->setName($name);
        $this->setCount($count);
    }

    /**
     * Return the name of the Tag
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the Tag
     *
     * @param string $name The value to set the name to
     *
     * @throws InvalidArgumentException
     * @return \MphpMusicBrainz\Result\Tag
     */
    protected function setName($name)
    {
        if (! is_string($name)) {
            throw new InvalidArgumentException('Name should be a string');
        }
        $this->name = $name;
        return $this;
    }

    /**
     * Return the count frequency of the Tag
     *
     * @return int|null
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set the count frequency of the Tag
     *
     * @param int|null $count The value to set the count property to
     *
     * @return \MphpMusicBrainz\Result\Tag
     */
    protected function setCount($count = null)
    {
        $this->count = $count;
        return $this;
    }

}