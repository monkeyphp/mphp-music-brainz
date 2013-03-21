<?php
/**
 * ReleaseResultAdapter.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Xml\Result;

use MphpMusicBrainz\Adapter\Interfaces\Result\ReleaseResultAdapterInterface;

/**
 * ReleaseResultAdapter
 *
 * Implementation of {@see \MphpMusicBrainz\Adapter\Interfaces\Result\ReleaseResultAdapter}
 * for XML response format
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Xml\Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ReleaseResultAdapter extends AbstractResultAdapter implements ReleaseResultAdapterInterface
{

    /**
     * Instance of Artist
     *
     * @var MphpMusicBrainz\Result\Artist|null
     */
    protected $artist;

    /**
     * DOMXPath query used to retrieve the Artist
     *
     * @var string
     */
    protected $artistQuery = 'ns:artist-credit/ns:name-credit/ns:artist';

    /**
     * The Asin property of the Release
     *
     * @var string|null
     */
    protected $asin;

    /**
     * DOMXPath query used to retrieve the Asin property string
     *
     * @var string
     */
    protected $asinQuery = 'ns:asin';

    /**
     * Barcode string property of the Release
     *
     * @var string|null
     */
    protected $barcode;

    /**
     * DOMXPath query string used to retrieve the barcode property
     *
     * @var string
     */
    protected $barcodeQuery = 'ns:barcode';

    /**
     * The originating country name string property of the Release
     *
     * @var string|null
     */
    protected $country;

    /**
     * DOMXPath query string used to retrieve the country property
     *
     * @var string
     */
    protected $countryQuery = 'ns:country';

    /**
     * Boolean value indicating if artwork is included in the Release
     *
     * @var boolean|null
     */
    protected $coverArtArtwork;

    /**
     * DOMXPath query string used to retrieve the cover art artwork value
     *
     * @var string
     */
    protected $coverArtArtworkQuery = 'ns:cover-art-archive/ns:artwork';

    /**
     * Boolean indicating is back cover art is included in the Release
     *
     * @var boolean|null
     */
    protected $coverArtBack;

    /**
     * DOMXPath query string used to return the cover art back value
     *
     * @var string
     */
    protected $coverArtBackQuery = 'ns:cover-art-archive/ns:back';

    /**
     * Integer value representing the number of cover art included in the Release
     *
     * @var int|null
     */
    protected $coverArtCount;

    /**
     * DOMXPath query string used to retrieve the cover art count value
     *
     * @var string
     */
    protected $coverArtCountQuery = 'ns:cover-art-archive/ns:count';

    /**
     * Boolean indicating that back cover art is included in the Release
     *
     * @var boolean|null
     */
    protected $coverArtFront;

    /**
     * DOMXPath query string used to retrieve the front cover art value
     *
     * @var string
     */
    protected $coverArtFrontQuery = 'ns:cover-art-archive/ns:front';

    /**
     * The date string of the release date of the Release
     *
     * @var string|null
     */
    protected $date;

    /**
     * DOMXPath query string used to retrieve the Release date
     *
     * @var string
     */
    protected $dateQuery = 'ns:date';

    /**
     * The Release language
     *
     * @var string|null
     */
    protected $language;

    /**
     * DOMXPath query string used to retrieve the language property
     *
     * @var string
     */
    protected $languageQuery = 'ns:text-representation/ns:language';

    /**
     * String representing the quality of the Release
     *
     * @var string|null
     */
    protected $quality;

    /**
     * DOMXPath query string used to retrieve the quality value of the Release
     *
     * @var string
     */
    protected $qualityQuery = 'ns:quality';

    /**
     * The script property of the Release
     *
     * @var string|null
     */
    protected $script;

    /**
     * DOMXPath query string used to retrieve the script value
     *
     * @var string
     */
    protected $scriptQuery = 'ns:text-representation/ns:script';

    /**
     * The status of the Release
     *
     * @var string|null
     */
    protected $status;

    /**
     * DOMXPath query string used to retrieve the status string of the Release
     *
     * @var string|null
     */
    protected $statusQuery = 'ns:status';

    /**
     * The title of the Release
     *
     * @var string|null
     */
    protected $title;

    /**
     * DOMXPath query string used to  retrieve the title property
     *
     * @var string
     */
    protected $titleQuery = 'ns:title';

    /**
     * Return the Artist that this Release is attributed to
     *
     * @return MphpMusicBrainz\Result\Artist|null
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
     * Retrurn the query used to retrieve the Artist node
     *
     * @return string
     */
    protected function getArtistQuery()
    {
        return $this->artistQuery;
    }

    /**
     * Return the Asin string property
     *
     * @return string|null
     */
    public function getAsin()
    {
        if (! isset($this->asin)) {
            $this->asin = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getAsinQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->asin;
    }

    /**
     * Return the DOMXPath query string used to retrieve the asin value
     *
     * @return string
     */
    protected function getAsinQuery()
    {
        return $this->asinQuery;
    }

    /**
     * Return the barcode string property of the Release
     *
     * @return string|null
     */
    public function getBarcode()
    {
        if (! isset($this->barcode)) {
            $this->barcode = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getBarcodeQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->barcode;
    }

    /**
     * Return the DOMXPath query string used to retrieve the barcode value
     *
     * @return string
     */
    protected function getBarcodeQuery()
    {
        return $this->barcodeQuery;
    }

    /**
     * Return the country property of the Release
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
     * Return the DOMXPath query string used to retrieve the country
     *
     * @return string
     */
    protected function getCountryQuery()
    {
        return $this->countryQuery;
    }

    /**
     * Return the date property
     *
     * @return string|null
     */
    public function getDate()
    {
        if (! isset($this->date)) {
            $this->date = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getDateQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->date;
    }

    /**
     * Return the DOMXPath query string used to retrieve the date
     *
     * @return string
     */
    protected function getDateQuery()
    {
        return $this->dateQuery;
    }

    /**
     * Return the language of the Release
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
     * Return the script
     *
     * @return string|null
     */
    public function getScript()
    {
        if (! isset($this->script)) {
            $this->script = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getScriptQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->script;
    }

    /**
     * Return the DOMXPath query string used to retrieve the script
     *
     * @return string
     */
    protected function getScriptQuery()
    {
        return $this->scriptQuery;
    }

    /**
     * Return the status
     *
     * @return string|null
     */
    public function getStatus()
    {
        if (! isset($this->status)) {
            $this->status = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getStatusQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->status;
    }

    /**
     * Return the DOMXPath query string used to retrieve the status
     *
     * @return string
     */
    protected function getStatusQuery()
    {
        return $this->statusQuery;
    }

    /**
     * Return the title
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
     * Return a boolean indicating if artwork is included in the release
     *
     * @return boolean
     */
    public function getCoverArtArtwork()
    {
        if (! isset($this->coverArtArtwork)) {
            $this->coverArtArtwork = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getCoverArtArtworkQuery(), $this->getDomElement())) && $nodeList->length)
                ? (($nodeList->item(0)->nodeValue === 'true') ? true : false)
                : null;
        }
        return $this->coverArtArtwork;
    }

    /**
     * Return a DOMXPath query string for retrieving the cover art art work value
     *
     * @return string
     */
    protected function getCoverArtArtworkQuery()
    {
        return $this->coverArtArtworkQuery;
    }

    /**
     * Return a boolean indicating that back cover art is included in the release
     *
     * @return boolean|null
     */
    public function getCoverArtBack()
    {
        if (! isset($this->coverArtBack)) {
            $this->coverArtBack = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getCoverArtBackQuery(), $this->getDomElement())) && $nodeList->length)
                ? (($nodeList->item(0)->nodeValue === 'true') ? true : false)
                : null;
        }
        return $this->coverArtBack;
    }

    /**
     * Return the DOMXPath query string used to retrieve the value of the back
     * cover art
     *
     * @return string
     */
    protected function getCoverArtBackQuery()
    {
        return $this->coverArtBackQuery;
    }

    /**
     * Return the integer value of the number of cover art included in the Release
     *
     * @return int|null
     */
    public function getCoverArtCount()
    {
        if (! isset($this->coverArtCount)) {
            $this->coverArtCount = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getCoverArtCountQuery(), $this->getDomElement())) && $nodeList->length)
                ? (is_numeric($nodeList->item(0)->nodeValue) ? (int)$nodeList->item(0)->nodeValue : null)
                : null;
        }
        return $this->coverArtCount;
    }

    /**
     * Return the DOMXPath query string used to retrieve the cover art count value
     *
     * @return string
     */
    protected function getCoverArtCountQuery()
    {
        return $this->coverArtCountQuery;
    }

    /**
     * Return the cover art front value
     *
     * @return boolean|null
     */
    public function getCoverArtFront()
    {
        if (! isset($this->coverArtFront)) {
            $this->coverArtFront = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getCoverArtFrontQuery(), $this->getDomElement())) && $nodeList->length)
                ? (($nodeList->item(0)->nodeValue === 'true') ? true : false)
                : null;
        }
        return $this->coverArtFront;
    }

    /**
     * Return the DOMXPath query string used to return the cover art front value
     *
     * @return string
     */
    protected function getCoverArtFrontQuery()
    {
        return $this->coverArtFrontQuery;
    }

    /**
     * Return a string representing the quality value of the Release
     *
     * @return string|null
     */
    public function getQuality()
    {
        if (! isset($this->quality)) {
            $this->quality = (($nodeList = $this->getXPath($this->getDomElement())->query($this->getQualityQuery(), $this->getDomElement())) && $nodeList->length)
                ? $nodeList->item(0)->nodeValue
                : null;
        }
        return $this->quality;
    }

    /**
     * Return the DOMXPath query string used to retrieve the quality of the Release
     *
     * @return string
     */
    protected function getQualityQuery()
    {
        return $this->qualityQuery;
    }

}