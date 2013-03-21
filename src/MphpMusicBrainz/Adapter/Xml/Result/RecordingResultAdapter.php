<?php
/**
 * RecordingResultAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\RecordingResultAdapterInterface;
use MphpMusicBrainz\Result\Artist;
use SplFixedArray;

/**
 * RecordingResultAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class RecordingResultAdapter extends AbstractResultAdapter implements RecordingResultAdapterInterface
{

    /**
     * DOMXPath query used to retrieve the Artist DOMElement from the
     * {@see Recording::domElement}
     *
     * @var string
     */
    protected $artistQuery = 'ns:artist-credit/ns:name-credit/ns:artist';

    /**
     * The disambiguation of the Recording
     *
     * @var string
     */
    protected $disambiguation;

    /**
     * The DOMXPath query used to retrieve the Recording disambiguation
     *
     * @var string
     */
    protected $disambiguationQuery = 'ns:disambiguation';

    /**
     * /recording/isrc-list
     *
     * @var SplFixedArray
     */
    protected $isrcList;

    /**
     * DOMXPath query string used to retrieve the ISRC DOMElements from the
     * {@see Recording::domElement property}
     *
     * @var string
     */
    protected $isrcListQuery = 'ns:isrc-list';

    /**
     * The length of the Recording
     *
     * @var string
     */
    protected $length;

    /**
     * The DOMXPath query used to retrieve the length of the Recording
     *
     * @var string
     */
    protected $lengthQuery = 'ns:length';

    /**
     * /recording/puid-list
     *
     * @var SplFixedArray|null
     */
    protected $puidList;

    /**
     * DOMXPath query string used to retrieve the DOMElements representing
     * Puids from the domElement
     *
     * @var string
     */
    protected $puidListQuery = 'ns:puid-list/ns:puid';


    /**
     * DOMXPath query used to retrieve the Releases
     *
     * @var string
     */
    protected $releaseListQuery = 'ns:release-list';

    /**
     * /recording/release-list
     *
     * @var SplFixedArray|null
     */
    protected $releaseList;

    /**
     * The title of the Recording
     *
     * @var string
     */
    protected $title;

    /**
     * The DOMXPath query used to retrieve the title of the Recording
     *
     * @var string
     */
    protected $titleQuery = 'ns:title';

    /**
     * Return an instance of MphpMusicBrainz\Result\Artist if available
     *
     * @return Artist|null
     */
    public function getArtist()
    {
        if (! isset($this->artist)) {
            $this->artist = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getArtistQuery(), $this->getDomElement())) && $nodeList->length)
                ? new \MphpMusicBrainz\Result\Artist($this->getFactory()->getResultAdapter(\MphpMusicBrainz\Service\MusicBrainz::RESOURCE_ARTIST, $nodeList->item(0)))
                : null;
        }
        return $this->artist;
    }

    /**
     * Return the \DOMXPath query string used to retrieve the Artist DOMElement
     *
     * @return string
     */
    protected function getArtistQuery()
    {
        return $this->artistQuery;
    }

    /**
     * Return the Recording disambiguation value
     *
     * @return string|null
     */
    public function getDisambiguation()
    {
        if (! isset($this->disambiguation)) {
            $this->disambiguation = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getDisambiguationQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->disambiguation;
    }

    /**
     * Return the DOMXPath query string used to retrieve the disambiguation value
     *
     * @return string
     */
    protected function getDisambiguationQuery()
    {
        return $this->disambiguationQuery;
    }

    /**
     * Return an instance of \SplFixedArray containing ISRC values
     *
     * @return SplFixedArray
     */
    public function getIsrcList()
    {
        if (! isset($this->isrcList)) {
            if (($nodeList = $this->getXPath($this->getDomElement())->query($this->getIsrcListQuery(), $this->getDomElement())) && $nodeList->length) {
                $this->isrcList = new SplFixedArray($nodeList->length);
                foreach ($nodeList as $index => $isrc) {
                    $this->isrcList->offsetSet($index, $isrc);
                }
            }
        }
        return $this->isrcList;
    }

    /**
     * Return the DOMXPath query string used to retrieve the Isrc list DOMNode
     *
     * @return string
     */
    protected function getIsrcListQuery()
    {
        return $this->isrcListQuery;
    }

    /**
     * Return the length property of the Recording
     *
     * @return string|null
     */
    public function getLength()
    {
        if (! isset($this->length)) {
            $this->length = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getLengthQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->length;
    }

    /**
     * Return the DOMXPath query string used to retrieve the length value
     *
     * @return string
     */
    protected function getLengthQuery()
    {
        return $this->lengthQuery;
    }

    /**
     * Return an instance of SplFixedArray containing Puid values
     *
     * @return SplFixedArray|null
     */
    public function getPuidList()
    {
        if (! isset($this->puidList)) {
            if (($nodeList = $this->getXPath($this->getDomElement())->query($this->getPuidListQuery(), $this->getDomElement())) && $nodeList->length) {
                $this->puidList = new SplFixedArray($nodeList->length);
                foreach ($nodeList as $index => $puid) {
                    $this->puidList->offsetSet($index, $puid);
                }
            }
        }
        return $this->puidList;
    }

    /**
     * Return the DOMXPath query string used to retrieve the puid list from the
     * DomElement
     *
     * @return string
     */
    protected function getPuidListQuery()
    {
        return $this->puidListQuery;
    }

    /**
     * Return an SplFixedArray instance containing instances of
     * MphpMusicBrainz\Result\Release
     *
     * @return SplFixedArray
     */
    public function getReleaseList()
    {
        if (! isset($this->releaseList)) {
            if (($nodeList = $this->getXPath($this->getDomElement())->query($this->getReleaseListQuery(), $this->getDomElement())) && $nodeList->length) {
                $this->releaseList = new SplFixedArray($nodeList->length);
                foreach ($nodeList as $index => $release) {
                    $this->releaseList->offsetSet($index, new \MphpMusicBrainz\Result\Release($this->getFactory()->getResultAdapter(\MphpMusicBrainz\Service\MusicBrainz::RESOURCE_RELEASE, $release)));
                }
            }
        }
        return $this->releaseList;
    }

    /**
     * Return the DOMXPath query string used to retrieve the relase list
     *
     * @return string
     */
    protected function getReleaseListQuery()
    {
        return $this->releaseListQuery;
    }

    /**
     * Return the title of the Recording
     *
     * @return string|null
     */
    public function getTitle()
    {
        if (! isset($this->title)) {
            $this->title = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getTitleQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->title;
    }

    /**
     * Return the DOMXPath query used to retrieve the title value
     *
     * @return string
     */
    protected function getTitleQuery()
    {
        return $this->titleQuery;
    }

}