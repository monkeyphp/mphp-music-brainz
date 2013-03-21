<?php
/**
 * AbstractResultSetAdapter.php
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
 * AbstractResultSetAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
abstract class AbstractResultSetAdapter implements \MphpMusicBrainz\Adapter\Interfaces\ResultSet\ResultSetAdapterInterface
{

    protected $factory;

    /**
     * The total count of Results that are available from the webservice
     *
     * @var int
     */
    protected $count;

    /**
     * The created DateTime returned from the webservice
     *
     * @var \DateTime
     */
    protected $created;

    /**
     * The offset of returned records (pages)
     *
     * @var int
     */
    protected $offset;

    /**
     * Current iterator position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * The raw data returned from the webservice such as an XML or JSON response
     *
     * @var mixed
     */
    protected $results;

    /**
     * Constructor
     *
     * @param mixed $results The results as returned from the webservice
     *
     * @return void
     */
    public function __construct($results)
    {
        $this->setResults($results);
    }

    /**
     * Return the results as returned from the webservice
     *
     * @return mixed
     */
    protected function getResults()
    {
        return $this->results;
    }

    /**
     * Set the results as returned from the webservice
     *
     * @param mixed $results The results as returned from the webservice
     *
     * @return \MphpMusicBrainz\Adapter\AbstractResultSetAdapter
     */
    protected function setResults($results)
    {
        $this->results = $results;
        return $this;
    }

    /**
     * The name of the class to instantiate when iterating through this
     * ResultSet
     *
     * @return string
     */
    protected function getResultClass()
    {
        return $this->resultClass;
    }

}