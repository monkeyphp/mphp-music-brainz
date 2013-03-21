<?php
/**
 * ArtistResultSet.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\ResultSet;

use DateTime;
use Iterator;
use MphpMusicBrainz\Adapter\Interfaces\ResultSet\ResultSetAdapterInterface;
use MphpMusicBrainz\Result\AbstractResult;

/**
 * ArtistResultSet
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
abstract class AbstractResultSet implements Iterator
{

    /**
     * The limit that was applied to the request to the web service when it
     * was made
     *
     * @var int
     */
    protected $limit;

    /**
     * The query performed to retrieve these records
     *
     * @var string
     */
    protected $query;

    /**
     * Constructor
     *
     * @param ResultSetAdapterInterface $adapter ResultSetAdapterInterface containing results from api
     * @param string                     $query  The original query performed against the web service
     * @param int                        $limit
     * @param int                        $offset
     *
     * @return void
     */
    public function __construct(ResultSetAdapterInterface $adapter, $query, $limit)
    {
        $this->setAdapter($adapter);
        $this->setQuery($query);
        $this->setLimit($limit);
    }

    /**
     * Return the ResultSetAdapterInterface instance
     *
     * @return ResultSetAdapterInterface
     */
    protected function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Set the ResultSetAdapterInterface instance
     *
     * @param ResultSetAdapterInterface $adapter The ResultSetAdapterInterface
     *
     * @return \MphpMusicBrainz\ResultSet\AbstractResultSet
     */
    protected function setAdapter(ResultSetAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        return $this;
    }

    /**
     * Return the current element
     *
     * @return AbstractResult
     */
    public function current()
    {
        return $this->getAdapter()->current();
    }

    /**
     * Return the total number of records that can be retrieved from the
     * web service
     *
     * @return int|null
     */
    public function getCount()
    {
        return $this->getAdapter()->getCount();
    }

    /**
     * Return a DateTime instance containing the created attribute of the DOMDocument
     * as returned from the web service
     *
     * @return DateTime|null
     */
    public function getCreated()
    {
        return $this->getAdapter()->getCreated();
    }

    /**
     * Return the current offset of the ResultSet
     *
     * @return int
     */
    public function getOffset()
    {
        return $this->getAdapter()->getOffset();
    }

    /**
     * Return the key of the current element
     *
     * @return scalar
     */
    public function key()
    {
        return $this->getAdapter()->key();
    }

    /**
     * Move the pointer on
     *
     * @return void
     */
    public function next()
    {
        $this->getAdapter()->next();
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind()
    {
        $this->getAdapter()->rewind();
    }

    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Set the limit that was applied when the request to the webservice was made
     *
     * @param int $limit The limit
     *
     * @return \MphpMusicBrainz\ResultSet\AbstractResultSet
     */
    protected function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Set the query that was used when the request was made to the web service
     *
     * @param string $query The query string
     *
     * @return \MphpMusicBrainz\ResultSet\AbstractResultSet
     */
    protected function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * Check if the current position is valid
     *
     * @return boolean
     */
    public function valid()
    {
        return $this->getAdapter()->valid();
    }

}