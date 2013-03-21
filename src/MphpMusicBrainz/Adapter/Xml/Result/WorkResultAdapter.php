<?php
/**
 * WorkResultAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\WorkResultAdapterInterface;

/**
 * WorkResultAdapter
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class WorkResultAdapter extends AbstractResultAdapter implements WorkResultAdapterInterface
{

    /**
     * Instance of SplFixedArray containing aliases for this Work
     *
     * @var SplFixedArray
     */
    protected $aliasList;

    /**
     * DOMXPath query string used to retrieve aliases
     *
     * @var string
     */
    protected $aliasListQuery = 'ns:alias-list/ns:alias';

    /**
     * The name of the attribute containing the Artist type
     *
     * @var string
     */
    protected $attributeType = 'type';

    /**
     * The language of the Work
     *
     * @var string|null
     */
    protected $language;

    /**
     * The DOMXPath query string used to retrieve the language value
     *
     * @var string
     */
    protected $languageQuery = 'ns:language';


    protected $tagList;

    protected $tagListQuery = '';

    /**
     * The title of the Work
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
     * Return a Traversable list of relations for the Work
     *
     * @return \SplFixedArray
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
     * Return the DOMXPath query string used to retrieve the alias list
     *
     * @return string
     */
    protected function getAliasListQuery()
    {
        return $this->aliasListQuery;
    }

    /**
     * Return the language of the Work
     *
     * @return string|null
     */
    public function getLanguage()
    {
        if (! isset($this->language)) {
            $this->language = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getLanguageQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->language;
    }

    /**
     * Return the DOMXPath query string used to retrieve the language
     *
     * @return string
     */
    protected function getLanguageQuery()
    {
        return $this->languageQuery;
    }

    /**
     * Return an SplFixedArray containing Relationships to this Work
     *
     * @return \SplFixedArray
     */
    public function getRelationList()
    {

    }

    /**
     * Return an SplFixedArray containing Tags associated with this Work
     *
     * @return SplFixedArray
     */
    public function getTagList()
    {
        if (! isset($this->tagList)) {
            if (($nodeList = $this->getXPath($this->getDomElement())->query($this->getTagListQuery(), $this->getDomElement())) && $nodeList->length) {
                $this->tagList = new SplFixedArray($nodeList->length);
                foreach ($nodeList as $i => $tag) {
                    $this->tagList->offsetSet($i, $tag->nodeValue);
                }
            }
        }
        return $this->tagList;
    }

    /**
     * Return the DOMXPath query string used to retrieve the tag list
     *
     * @return string
     */
    protected function getTagListQuery()
    {
        return $this->tagListQuery;
    }

    /**
     * Return the title of the Work
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
     * Return the type of the Work
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
     * Return the name of the attribute containing the Work type
     *
     * @return string
     */
    protected function getAttributeType()
    {
        return $this->attributeType;
    }

}