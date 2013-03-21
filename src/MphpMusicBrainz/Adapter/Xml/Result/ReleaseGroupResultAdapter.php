<?php
/**
 * ReleaseGroupResultAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\ReleaseGroupResultAdapterInterface;

/**
 * ReleaseGroupResultAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ReleaseGroupResultAdapter extends AbstractResultAdapter implements ReleaseGroupResultAdapterInterface
{

    /**
     * Instance of Artist that this ReleaseGroup is attributed to
     *
     * @var MphpMusicBrainz\Result\Artist|null
     */
    protected $artist;

    /**
     * DOMXPath query string used to retrieve the artist data from the DOMElement
     *
     * @var string
     */
    protected $artistQuery = 'ns:artist-credit/ns:name-credit/ns:artist';

    /**
     * Return the name of the type attribute
     *
     * @var string
     */
    protected $attributeType = 'type';

    /**
     * The first release date
     *
     * @var string|null
     */
    protected $firstRelease;

    /**
     * DOMXPath query string used to retrieve the first release date value
     *
     * @var string
     */
    protected $firstReleaseDateQuery = 'ns:first-release-date';

    /**
     * The primary type of the compilation
     *
     * @var string|null
     */
    protected $primaryType;

    /**
     * DOMXPath query string used to retrieve the primary type
     *
     * @var string
     */
    protected $primaryTypeQuery = 'ns:primary-type';

    /**
     * An instance of SplFixedArray containing Releases
     *
     * @var \SplFixedArray
     */
    protected $releaseList;

    /**
     * DOMXPath query string used to retrieve the release list
     *
     * @var string
     */
    protected $releaseListQuery = 'ns:release-list/ns:release';

    /**
     * SplFixedArray containing secondary types
     *
     * @var SplFixedArray
     */
    protected $secondaryTypeList;

    /**
     * DOMXPath query string used to retrieve the secondary type list
     *
     * @var string
     */
    protected $secondaryTypeListQuery = 'ns:secondary-type-list/ns:secondary-type';

    /**
     * The title of the ReleaseGroup
     *
     * @var string|null
     */
    protected $title;

    /**
     * DOMXPath query string used to retrieve the title
     *
     * @var string
     */
    protected $titleQuery = 'ns:title';

    /**
     * The type of the ReleaseGroup
     *
     * @var string|null
     */
    protected $type;

    /**
     * Return the Artist
     *
     * @return \MphpMusicBrainz\Result\Artist|null
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
     * Return the DOMXPath query string used to retrieve the Artist
     *
     * @return string
     */
    protected function getArtistQuery()
    {
        return $this->artistQuery;
    }

    /**
     * Return a string representation of the ReleaseGroups first release date
     *
     * @return string|null
     */
    public function getFirstReleaseDate()
    {
        if (! isset($this->firstReleaseDate)) {
            $this->firstReleaseDate = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getFirstReleaseDateQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->firstReleaseDate;
    }

    /**
     * Return the DOMXPath query string used to retrieve the first release date
     *
     * @return string
     */
    protected function getFirstReleaseDateQuery()
    {
        return $this->firstReleaseDateQuery;
    }

    /**
     * Return a string representation of the release group primary type
     *
     * @return string|null
     */
    public function getPrimaryType()
    {
       if (! isset($this->primaryType)) {
           $this->primaryType = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getPrimaryTypeQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
       }
       return $this->primaryType;
    }

    /**
     * Return the DOMXPath query string used to retrieve the primary type
     *
     * @return string
     */
    protected function getPrimaryTypeQuery()
    {
        return $this->primaryTypeQuery;
    }

    /**
     * Return an instance of SplFixedArray containing instances of
     * \MphpMusicBrainz\Result\Release
     *
     * @return SplFixedArray|null
     */
    public function getReleaseList()
    {
        if (! isset($this->releaseList)) {
            if (($nodeList = $this->getXPath($this->getDomElement())->query($this->getReleaseListQuery(), $this->getDomElement())) && $nodeList->length) {
                $this->releaseList = new \SplFixedArray($nodeList->length);
                foreach ($nodeList as $index => $release) {
                    $this->releaseList->offsetSet($index, new \MphpMusicBrainz\Result\Release($this->getFactory()->getResultAdapter(\MphpMusicBrainz\Service\MusicBrainz::RESOURCE_RELEASE, $release)));
                }
            }
        }
        return $this->releaseList;
    }

    /**
     * Return the DOMXPath query string used to retrieve the release list
     *
     * @return string
     */
    protected function getReleaseListQuery()
    {
        return $this->releaseListQuery;
    }

    /**
     * Return an SplFixedArray containing secondary types
     *
     * @return SplFixedArray
     */
    public function getSecondaryTypeList()
    {
        if (! isset($this->secondaryTypeList)) {
            if (($nodeList = $this->getXPath($this->getDomElement())->query($this->getSecondaryTypeListQuery(), $this->getDomElement())) && $nodeList->length) {
                $this->secondaryTypeList = new \SplFixedArray($nodeList->length);

                foreach ($nodeList as $index => $secondaryType) {
                    $this->secondaryTypeList->offsetSet($index, $secondaryType->nodeValue);
                }
            }
        }
        return $this->secondaryTypeList;
    }

    /**
     * Return the DOMXPath query string used to retrieve the secondary type list
     *
     * @return string
     */
    protected function getSecondaryTypeListQuery()
    {
        return $this->secondaryTypeListQuery;
    }

    /**
     * Return the title of the ReleaseGroup
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
     * Return the DOMXPath query string used to retrieve the title
     *
     * @return string
     */
    protected function getTitleQuery()
    {
        return $this->titleQuery;
    }

    /**
     * Return the type of the ReleaseGroup
     *
     * @return string|null
     */
    public function getType()
    {
        if (! isset($this->type)) {
            $this->type = $this->getDomElement()->getAttribute($this->getAttributeType())
                ? $this->getDomElement()->getAttribute($this->getAttributeType())
                : null;
        }
        return $this->type;
    }

    /**
     * Return the name of the type attribute
     *
     * @return string
     */
    protected function getAttributeType()
    {
        return $this->attributeType;
    }

}