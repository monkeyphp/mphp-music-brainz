<?php
/**
 * ArtistResultAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\ArtistResultAdapterInterface;
use MphpMusicBrainz\Result\Tag;
use SplFixedArray;

/**
 * ArtistResultAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ArtistResultAdapter extends AbstractResultAdapter implements ArtistResultAdapterInterface
{

    /**
     * The name of the attribute containing the Artist type
     *
     * @var string
     */
    protected $attributeType = 'type';

    /**
     * DOMXPath search query for retrieving the name
     *
     * @var string
     */
    protected $nameQuery = 'ns:name';

    /**
     * DOMXPath search query for retrieving the sort-name
     *
     * @var string
     */
    protected $sortNameQuery = 'ns:sort-name';

    /**
     * DOMXPath search query for retrieving the country
     *
     * @var string
     */
    protected $countryQuery = 'ns:country';

    /**
     * DOMXPath search query for retrieving the alias list
     *
     * @var string
     */
    protected $aliasListQuery = 'ns:alias-list';

    /**
     * DOMXPath search query for retrieving the gender
     *
     * @var string
     */
    protected $genderQuery = 'ns:gender';

    /**
     * DOMXPath search query for retrieving the disambiguation
     *
     * @var string
     */
    protected $disambiguationQuery = 'ns:disambiguation';

    /**
     * DOMXPath search query for retrieving the begin date string
     *
     * @var string
     */
    protected $beginQuery = 'ns:life-span/ns:begin';

    /**
     * DOMXPath search query for retrieving the end date string
     *
     * @var string
     */
    protected $endQuery = 'ns:life-span/ns:end';

    /**
     * DOMXPath search query for retrieving the ended value of the Artist
     *
     * @var string
     */
    protected $endedQuery = 'ns:life-span/ns:ended';

    /**
     * DOMXPath search query for retrieving the tag list
     *
     * @var string
     */
    protected $tagListQuery = 'ns:tag-list/ns:tag';

    /**
     * The name of the Artist
     *
     * @var string|null
     */
    protected $name;

    /**
     * The Artist country of origin
     *
     * @var string|null
     */
    protected $country;

    /**
     * SplFixedArray containing alias names for the Artist
     *
     * @var SplFixedArray|null
     */
    protected $aliasList;

    /**
     * SplFixedArray containing Tags
     *
     * @var SplFixedArray|null
     */
    protected $tagList;

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return the type of Artist
     *
     * @return string|null
     */
    public function getType()
    {
        if (! isset($this->type)) {
            $this->type = ($this->getDomElement()->getAttribute($this->getAttributeType()))
                ? $this->getDomElement()->getAttribute($this->getAttributeType())
                : null;
        }
        return $this->type;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return the country of origin for the Artist
     *
     * @return string|null
     */
    public function getCountry()
    {
        if (! isset($this->country)) {
            $this->country = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getCountryQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->country;
    }

    /**
     * DOMXPath query string used to retrieve the country property
     *
     * @return string
     */
    protected function getCountryQuery()
    {
        return $this->countryQuery;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return the name property of the Artist
     *
     * @return string|null
     */
    public function getName()
    {
        if (! isset($this->name)) {
            $this->name = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getNameQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->name;
    }

    /**
     * Return the DOMXPath search string for retrieving the name propert
     *
     * @return string
     */
    protected function getNameQuery()
    {
        return $this->nameQuery;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return the sort name property of the Artist
     *
     * @return string|null
     */
    public function getSortName()
    {
        if (! isset($this->sortName)) {
            $this->sortName = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getSortNameQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->sortName;
    }

    /**
     * Return the DOMXPath query string used to retrive the sort name property
     *
     * @return string
     */
    protected function getSortNameQuery()
    {
        return $this->sortNameQuery;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return the gender property of the Artist
     *
     * @return string|null
     */
    public function getGender()
    {
        if (! isset($this->gender)) {
            $this->gender = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getGenderQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->gender;
    }

    /**
     * Return the DOMXPath query string used to retrieve the gender property
     *
     * @return string
     */
    protected function getGenderQuery()
    {
        return $this->genderQuery;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return the disambiguation property of the Artist
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
     * Return the DOMXPath query string used to retrieve the
     * disambiguation property
     *
     * @return string
     */
    protected function getDisambiguationQuery()
    {
        return $this->disambiguationQuery;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return a string representing the date the Artist began
     *
     * @return string|null
     */
    public function getBegin()
    {
        if (! isset($this->begin)) {
            $this->begin = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getBeginQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->begin;
    }

    /**
     * Return the DOMXPath query string used to retrieve the begin property
     *
     * @return string
     */
    protected function getBeginQuery()
    {
        return $this->beginQuery;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return a string representing the date that the Artist ended
     *
     * @return string|null
     */
    public function getEnd()
    {
        if (! isset($this->end)) {
            $this->end = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getEndQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->end;
    }

    /**
     * Return the DOMXPath query string used to retrieve the end property
     *
     * @return string
     */
    protected function getEndQuery()
    {
        return $this->endQuery;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return a boolean indicating that the Artist have ended
     *
     * @return boolean
     */
    public function getEnded()
    {
        if (! isset($this->ended)) {
            $this->ended = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getEndedQuery(), $this->getDomElement())) && $nodeList->length)
                ? ((strcasecmp($nodeList->item(0)->nodeValue, 'true') == 0) ?: false)
                : null;
        }
        return $this->ended;
    }

    /**
     * Return the DOMXPath query string used to retrieve the ended property
     *
     * @return string
     */
    protected function getEndedQuery()
    {
        return $this->endedQuery;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return an \SplFixedArray instance containing instances of
     * \MphpMusicBrainz\Result\Tag
     *
     * @return \SplFixedArray
     */
    public function getTagList()
    {
        if (! isset($this->tagList)) {
            if (($nodeList = $this->getXPath($this->getDomElement())->query($this->getTagListQuery(), $this->getDomElement())) && $nodeList->length) {

                $this->tagList = new SplFixedArray($nodeList->length);

                foreach ($nodeList as $index => $tag) {
                    $this->tagList->offsetSet($index, new Tag($tag->nodeValue, (int)$tag->getAttribute('count')));
                }
            }
        }
        return $this->tagList;
    }

    /**
     * Return the DOMXPath query string used to retrieve the tag nodes from the
     * DOMElement
     *
     * @return string
     */
    protected function getTagListQuery()
    {
        return $this->tagListQuery;
    }

    /**
     * ArtistResultAdapterInterface interface
     *
     * Return an array of alias properties
     *
     * @return SplFixedArray|null
     */
    public function getAliasList()
    {
        if (! isset($this->aliasList)) {
            if (($nodeList = $this->getXPath($this->getDomElement())->query($this->getAliasListQuery(), $this->getDomElement())) && $nodeList->length) {
                $this->aliasList = new SplFixedArray($nodeList->length);
                foreach ($nodeList as $i => $alias) {
                    $this->aliasList->offsetSet($i, $alias->nodeValue);
                }
            }
        }
        return $this->aliasList;
    }

    /**
     * Return the DOMXPath query string used to retrieve the alias list from the
     * DOMElement
     *
     * @return string
     */
    protected function getAliasListQuery()
    {
        return $this->aliasListQuery;
    }

    /**
     * Return the name of the attribute containing the Artist type
     *
     * @return string
     */
    protected function getAttributeType()
    {
        return $this->attributeType;
    }

}