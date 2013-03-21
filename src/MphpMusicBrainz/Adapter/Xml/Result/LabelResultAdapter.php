<?php
/**
 * LabelResultAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml\Result;

/**
 * LabelResultAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class LabelResultAdapter extends AbstractResultAdapter implements \MphpMusicBrainz\Adapter\Interfaces\Result\LabelResultAdapterInterface
{

    /**
     * Traversable of aliases
     *
     * @var \SplFixedArray
     */
    protected $aliasList;

    /**
     * DOMXPath query string used to retrieve the aliases
     *
     * @var string
     */
    protected $aliasListQuery = 'ns:alias-list/ns:alias';

    /**
     * The name of the attribute used to retrieve the type
     *
     * @var string
     */
    protected $attributeType = 'type';

    /**
     * String representing the begin date of the Label
     *
     * @var string|null
     */
    protected $begin;

    /**
     * DOMXPath string used to retrieve the begin value
     *
     * @var string
     */
    protected $beginQuery = 'ns:life-span/ns:begin';

    /**
     * The country the Label was established in
     *
     * @var string|null
     */
    protected $country;

    /**
     * DOMXPath query string used to retrieve the country value
     *
     * @var string
     */
    protected $countryQuery = 'ns:country';

    /**
     * The disambiguation string
     *
     * @var string|null
     */
    protected $disambiguation;

    /**
     * DOMXPath query string used to retrieve the disambiguation value
     *
     * @var string
     */
    protected $disambiguationQuery = 'ns:disambiguation';

    /**
     * String representing the date that the Label ended
     *
     * @var string|null
     */
    protected $end;

    /**
     * DOMXPath query string used to retrieve the end value
     *
     * @var string
     */
    protected $endQuery = 'ns:life-span/ns:end';

    /**
     * Boolean representing if the Label has ended or not
     *
     * @var boolean
     */
    protected $ended;

    /**
     * DOMXPath query string used to retrieve the ended value
     *
     * @var string
     */
    protected $endedQuery = 'ns:life-span/ns:ended';

    /**
     * The label code
     *
     * @var string|null
     */
    protected $labelCode;

    /**
     * DOMXPath query string used to retrieve the label code
     *
     * @var string
     */
    protected $labelCodeQuery = 'ns:label-code';

    /**
     * The name of the label
     *
     * @var string
     */
    protected $name;

    /**
     * DOMXPath query string used to retrieve the name
     *
     * @var string
     */
    protected $nameQuery = 'ns:name';

    /**
     * The sortname
     *
     * @var string|null
     */
    protected $sortname;

    /**
     * DOMXPath query string used to retrieve the sort name
     *
     * @var string
     */
    protected $sortNameQuery = 'ns:sort-name';

    /**
     * The type of the Label
     *
     * @var string|null
     */
    protected $type;

    /**
     * Return a SplFixedArray instance containing aliases for this Label
     *
     * @return SplFixedArray
     */
    public function getAliasList()
    {
        if (! isset($this->aliasList)) {
            if (($nodeList = $this->getXPath($this->getDomElement())->query($this->getAliasListQuery(), $this->getDomElement())) && $nodeList->length) {
                $this->aliasList = new \SplFixedArray($nodeList->length);
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
     * Return the name of the attribute used to retrieve the type of the label
     *
     * @return string
     */
    protected function getAttributeType()
    {
        return $this->attributeType;
    }

    /**
     * Return the begin value from the DomElement
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
     * Return the string value representing the country that the Label exists
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
     * Return the country string
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
     * Return a date representation of the end of the Label
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
     * Return a boolean indicating that the label has ended
     *
     * @return boolean|null
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
     * Return the label code
     *
     * @return string|null
     */
    public function getLabelCode()
    {
        if (! isset($this->labelCode)) {
            $this->labelCode = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getLabelCodeQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->labelCode;
    }

    /**
     * Return the DOMXPath query string used to retrieve the label code
     *
     * @return string
     */
    protected function getLabelCodeQuery()
    {
        return $this->labelCodeQuery;
    }

    /**
     * Return the name of the Label
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
     * Return the DOMXPath query string used to retrieve the name
     *
     * @return string
     */
    protected function getNameQuery()
    {
        return $this->nameQuery;
    }

    /**
     * Return the sort name
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
     * Return the type of the Label
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

}