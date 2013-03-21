<?php
/**
 * AbstractResultSetAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml\ResultSet;

use DateTime;
use DOMDocument;
use DOMNodeList;
use DOMXPath;
use SplFixedArray;

/**
 * AbstractResultSetAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\ResultSet
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 * @abstract
 */
abstract class AbstractResultSetAdapter extends \MphpMusicBrainz\Adapter\AbstractResultSetAdapter
{

    /**
     * SplFixedArray storing the instances of the result class that have been
     * retrieved from the DOMDocument
     *
     * @var SplFixedArray
     */
    protected $storage;

    /**
     * DOMXPath query string used to retrieve the created attribute
     *
     * @var string
     */
    protected $createdQuery = '/ns:metadata/@created';

    /**
     * The DOMDocument storing the XML retrieved from the webservice
     *
     * @var DOMDocument
     */
    protected $dom;

    /**
     * Instance of DOMXPath used to query DOMDocument with
     *
     * @var DOMXPath
     */
    protected $domXPath;

    /**
     * DOMNodeList storing DOMNodes representing Results retrieved from the
     * DOMDocument
     *
     * @var DOMNodeList
     */
    protected $domList;

    /**
     * Return an instance of DOMDocument constructed with the property
     * of results
     *
     * @todo validate http://svn.musicbrainz.org/mmd-schema/trunk/schema/musicbrainz_mmd-2.0.rng
     *
     * @throws \RuntimeException
     * @return DOMDocument
     */
    protected function getDom()
    {
        if (! isset($this->dom)) {
            $dom = new DOMDocument();
            if (is_null($this->getResults())) {
                throw new \RuntimeException('There doesnt appear to be any results to load');
            }
            // suppress warning but throw Exception
            if (! @$dom->loadXML($this->getResults())) {
                throw new \RuntimeException('Could not load results into DOMDocument');
            }
            $this->dom = $dom;
        }
        return $this->dom;
    }

    /**
     * Return the DOMNodeList containing the result class instances
     *
     * @return DOMNodeList
     */
    protected function getDomList()
    {
        if (! isset($this->domList)) {
            $this->domList = $this->getXPath($this->getDom())->query($this->getDomListQuery());
        }
        return $this->domList;
    }

    /**
     * Return the XPath query string used to retrieved result class DOMNodes
     *
     * Template method. Calls for domListQuery which should be defined
     * in subclasses
     *
     * from the DOMDocument
     *
     * @return string
     */
    protected function getDomListQuery()
    {
        return $this->domListQuery;
    }

    /**
     * Return an instance of DOMXPath used to query the DOMDocument for artists
     *
     * @param DOMDocument $dom The DOMDocument instance
     *
     * @return DOMXPath
     */
    protected function getXPath(DOMDocument $dom)
    {
        if (! isset($this->domXPath)) {
            $this->domXPath = new DOMXPath($dom);
            $namespaceURI = $dom->lookupNamespaceUri($dom->namespaceURI);
            $this->domXPath->registerNamespace('ns', $namespaceURI);
        }
        return $this->domXPath;
    }

    /**
     * Iterator interface
     *
     * Lazy load an instance of result class using data from the DOMDocument
     *
     * @return mixed
     */
    public function current()
    {
        if (! $this->getStorage()->offsetExists($this->position)) {

            $adapter = $this->getFactory()->getResultAdapter($this->resultAdapter, $this->getDomList()->item($this->position));

            $resultClass = $this->getResultClass();
            $result = new $resultClass($adapter);

            $this->getStorage()->offsetSet($this->position, $result);
        }
        return $this->getStorage()->offsetGet($this->position);
    }

    /**
     * SplFixedArray instance lazy loaded used to store result class instances
     *
     * @return SplFixedArray
     */
    protected function getStorage()
    {
        if (! isset($this->storage)) {
            $this->storage = new SplFixedArray($this->getDomList()->length);
        }
        return $this->storage;
    }

    /**
     * Return the total number of records that can be retrieved from the
     * web service
     *
     * @return int|null
     */
    public function getCount()
    {
        if (! isset($this->count)) {
            $this->count = (int)$this->getXPath($this->getDom())->query($this->getCountQuery())->item(0)->value;
        }
        return $this->count;
    }

    /**
     * Return a DateTime instance containing the created attribute of the DOMDocument
     * as returned from the web service
     *
     * @return DateTime|null
     */
    public function getCreated()
    {
        if (! isset($this->created)) {
            $this->created = new DateTime($this->getXPath($this->getDom())->query($this->getCreatedQuery())->item(0)->value);
        }
        return $this->created;
    }

    /**
     * Return the current offset of the ResultSet
     *
     * @return int
     */
    public function getOffset()
    {
        if (! isset($this->offset)) {
            $this->offset = (int)$this->getXPath($this->getDom())->query($this->getOffsetQuery())->item(0)->value;
        }
        return $this->offset;
    }

    /**
     * Return the DOMXPath query string used to retrieve the count property
     *
     * Template method makes a call for countQuery which should be defined in child classes
     *
     * @return string
     */
    protected function getCountQuery()
    {
        return $this->countQuery;
    }

    /**
     * Return the created query string
     *
     * @return string
     */
    protected function getCreatedQuery()
    {
        return $this->createdQuery;
    }

    /**
     * Return the DOMXPath query string use to retrieve the ResultSet offset property
     *
     * @return string
     */
    protected function getOffsetQuery()
    {
        return $this->offsetQuery;
    }

    /**
     * Iterator interface
     *
     * Return the key of the current element
     *
     * @return scalar
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Iterator interface

     * Move the pointer on
     *
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Iterator interface
     *
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Iterator interface
     *
     * Check if the current position is valid
     *
     * @return boolean
     */
    public function valid()
    {
        return ($this->position < $this->getDomList()->length);
    }

    /**
     * Return an instance of XmlFactory
     *
     * @return \MphpMusicBrainz\Adapter\Xml\XmlFactory
     */
    protected function getFactory()
    {
        if (! isset($this->factory)) {
            $this->factory = new \MphpMusicBrainz\Adapter\Xml\XmlFactory();
        }
        return $this->factory;
    }

}