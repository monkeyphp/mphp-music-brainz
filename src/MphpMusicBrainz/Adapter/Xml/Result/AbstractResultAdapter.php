<?php
/**
 * AbstractResultAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml\Result;

use DOMElement;
use DOMXPath;

/**
 * AbstractResultAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 * @abstract
 */
abstract class AbstractResultAdapter extends \MphpMusicBrainz\Adapter\AbstractResultAdapter
{

    /**
     * Instance of \MphpMusicBrainz\Adapter\Xml\XmlFactory
     *
     * @var \MphpMusicBrainz\Adapter\Xml\XmlFactory
     */
    protected $factory;

    /**
     * DOMElement containing the Artist information
     *
     * @var DOMElement
     */
    protected $domElement;

    /**
     * The string attribute containing the MBID/id
     *
     * @var string
     */
    protected $attributeId = 'id';

    /**
     * The name of the attribute containing the Artist score
     *
     * @var string
     */
    protected $attributeScore = 'ext:score';

    /**
     * Constructor
     *
     * The constructor accepts either a DOMElement OR an XML string.
     * If a string is supplied, the constructor will attempt to create a DOMElement
     * from it
     *
     * @param mixed $result The DOMElement or string to construct adapter with
     *
     * @return void
     */
    public function __construct($result)
    {
        if ($result instanceof \DOMElement) {
            $this->setDomElement($result);
        }
        else {
            $dom = new \DOMDocument();
            // suppress the warning but catch a false return and throw an exception
            if (! @$dom->loadXML($result)) {
                throw new \RuntimeException('Could not load results into DOMDocument');
            }
            $xPath = new \DOMXPath($dom);
            $namespaceURI = $dom->lookupNamespaceUri($dom->namespaceURI);
            $xPath->registerNamespace('ns', $namespaceURI);

            $domElement = $xPath->query('/ns:metadata/ns:*')->item(0);

            $this->setDomElement($domElement);
        }
    }

    /**
     * Return an instance of \MphpMusicBrainz\Adapter\Xml\XmlFactory
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

    /**
     * Return the DOMElement containing the data about this Artist from the
     * webservice
     *
     * @return DOMElement
     */
    protected function getDomElement()
    {
        return $this->domElement;
    }

    /**
     * Set the DOMElement containing the Artist data
     *
     * @param DOMElement $domElement The DOMElement containing the Artist data
     *
     * @return \Artist
     */
    protected function setDomElement(DOMElement $domElement)
    {
        $this->domElement = $domElement;
        return $this;
    }

    /**
     * ResultAdapterInterface interface
     *
     * Return the MusicBrainz MBID of the Artist
     *
     * @return string
     */
    public function getId()
    {
        if (! isset($this->id)) {
            $this->id = $this->getDomElement()->getAttribute($this->getAttributeId());
        }
        return $this->id;
    }

    /**
     * ResultAdapterInterface interface
     *
     * Return the string score of the Artist relative to the original search
     *
     * @return string
     */
    public function getScore()
    {
        if (! isset($this->score)) {
            $this->score = ($this->getDomElement()->getAttribute($this->getAttributeScore()))
                ? $this->getDomElement()->getAttribute($this->getAttributeScore())
                : null;
        }
        return $this->score;
    }

    /**
     * Return a DOMXPath instance
     *
     * @param DOMElement $domElement
     *
     * @return DOMXPath
     */
    protected function getXPath(DOMElement $domElement)
    {
        if (! isset($this->xPath)) {

            if (null === ($dom = $domElement->ownerDocument)) {
                throw new \MphpMusicBrainz\Exception\InvalidDOMElementException(
                    'The supplied DOMElement does not appear to have a DOMDocument associated with it'
                );
            }

            $this->xPath = new DOMXPath($dom);
            $namespaceURI = $dom->lookupNamespaceUri($dom->namespaceURI);
            $this->xPath->registerNamespace('ns', $namespaceURI);
        }
        return $this->xPath;
    }

    /**
     * Return the name of the attribute containing the MBID/id
     *
     * @return string
     */
    protected function getAttributeId()
    {
        return $this->attributeId;
    }

    /**
     * Return the name of the attribute containing the Result score
     *
     * @return string
     */
    protected function getAttributeScore()
    {
        return $this->attributeScore;
    }

}