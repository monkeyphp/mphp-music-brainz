<?php
/**
 * ReleaseResultAdapterTest.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainzTest\Adapter\Result\Xml\Result;

/**
 * ReleaseResultAdapterTest
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage Result
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class ReleaseResultAdapterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that we can construct an instance of of ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::__construct()
     */
    public function testCanConstructInstance()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertInstanceOf('MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter', $releaseAdapter);

    }

    /**
     * Test that we can retrieve the id property from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getId
     */
    public function testCanGetId()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('6e729716-c0eb-3f50-a740-96ac173be50d', $releaseAdapter->getId());
    }

    /**
     * Test that we can retrieve the score from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getScore()
     */
    public function testGetScore()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('100', $releaseAdapter->getScore());
    }

    /**
     * Test that we can retrieve the Artist from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getArtist()
     */
    public function testGetArtist()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $artist = $releaseAdapter->getArtist();

        $this->assertInstanceOf('MphpMusicBrainz\Result\Artist', $artist);
        $this->assertEquals('Metallica', $artist->getName());
    }

    /**
     * Test that a call to getArtistQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getArtistQuery()
     */
    public function testGetArtistQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionGetMethod = $reflectionObject->getMethod('getArtistQuery');
        $reflectionGetMethod->setAccessible(true);

        $this->assertInternalType('string', $reflectionGetMethod->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the asin from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getAsin()
     */
    public function testGetAsin()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('B000GALEWC', $releaseAdapter->getAsin());
    }

    /**
     * Test that a call to getAsinQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getAsinQuery()
     */
    public function testGetAsinQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getAsinQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the barcode from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getBarcode()
     */
    public function testGetBarcode()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('4988005628664', $releaseAdapter->getBarcode());
    }

    /**
     * Test that a call to getBarcodeQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getBarcodeQuery()
     */
    public function testBarcodeQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getBarcodeQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the country from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCountry()
     */
    public function testGetCountry()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('JP', $releaseAdapter->getCountry());
    }

    /**
     * Test that a call to getCountryQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCountryQuery()
     */
    public function testCountryQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getCountryQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the date from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getDate()
     */
    public function testCanGetDate()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('2010-09-22', $releaseAdapter->getDate());
    }

    /**
     * Test that a call to getDateQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getDateQuery()
     */
    public function testDateQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getDateQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the language from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getLanguage()
     */
    public function testCanGetLanguage()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('eng', $releaseAdapter->getLanguage());
    }

    /**
     * Test that a call to getLanguageQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getLanguageQuery()
     */
    public function testLanguageQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getLanguageQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the script from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getScript()
     */
    public function testCanGetScript()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('Latn', $releaseAdapter->getScript());
    }

    /**
     * Test that a call to getScriptQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getScriptQuery()
     */
    public function testGetScriptQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getScriptQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the status from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getStatus()
     */
    public function testCanGetStatus()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('Official', $releaseAdapter->getStatus());
    }

    /**
     * Test that a call to getStatusQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getStatusQuery()
     */
    public function testGetStatusQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getStatusQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the title from the ReleaseResultAdapter
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getTitle()
     */
    public function testCanGetTitle()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $this->assertEquals('Metallica', $releaseAdapter->getTitle());
    }

    /**
     * Test that a call to getTitleQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getTitleQuery()
     */
    public function testGetTitleQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getTitleQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the cover art artwork boolean value
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCoverArtArtWork()
     */
    public function testCanGetCoverArtArtwork()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getXml());

        $this->assertFalse($releaseAdapter->getCoverArtArtwork());
    }

    /**
     * Test that a call to getCoverArtArtworkQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCoverArtArtworkQuery()
     */
    public function testGetCoverArtArtworkQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getCoverArtArtworkQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the cover art back boolean value
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCoverArtBack()
     */
    public function testCanGetCoverArtBack()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getXml());

        $this->assertFalse($releaseAdapter->getCoverArtBack());
    }

    /**
     * Test that a call to getCoverArtBackQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCoverArtBackQuery()
     */
    public function testGetCoverArtBackQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getCoverArtBackQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     * Test that we can retrieve the cover art front boolean value
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCoverArtFront()
     */
    public function testCanGetCoverArtFront()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getXml());

        $this->assertFalse($releaseAdapter->getCoverArtFront());
    }

    /**
     * Test that a call to getCoverArtFrontQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCoverArtFrontQuery()
     */
    public function testGetCoverArtFrontQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getCoverArtFrontQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCoverArtCount()
     */
    public function testCanGetCoverArtCount()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getXml());

        $this->assertSame(0, $releaseAdapter->getCoverArtCount());
    }

    /**
     * Test that a call to getCoverArtCountQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getCoverArtCountQuery()
     */
    public function testGetCoverArtCountQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getCoverArtCountQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }

    /**
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getQuality()
     */
    public function testCanGetQuality()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getXml());

        $this->assertSame('normal', $releaseAdapter->getQuality());
    }

    /**
     * Test that a call to getQualityQuery returns a string
     *
     * @covers MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter::getQualityQuery()
     */
    public function testGetQualityQuery()
    {
        $releaseAdapter = new \MphpMusicBrainz\Adapter\Xml\Result\ReleaseResultAdapter($this->getDomElement());

        $reflectionObject = new \ReflectionObject($releaseAdapter);
        $reflectionMethodGet = $reflectionObject->getMethod('getQualityQuery');
        $reflectionMethodGet->setAccessible(true);

        $this->assertInternalType('string', $reflectionMethodGet->invoke($releaseAdapter));
    }


    protected function getXml()
    {
        return '<?xml version="1.0" encoding="UTF-8"?><metadata xmlns="http://musicbrainz.org/ns/mmd-2.0#"><release id="af4f69e8-1643-3b5a-94ba-a0269f8e3c77"><title>Metallica</title><status>Official</status><quality>normal</quality><text-representation><language>eng</language><script>Latn</script></text-representation><date>2008-11-28</date><country>US</country><barcode>0093624984962</barcode><asin>B001I10ABE</asin><cover-art-archive><artwork>false</artwork><count>0</count><front>false</front><back>false</back></cover-art-archive></release></metadata>';
    }

    /**
     * Utility method to return a DOMElement
     *
     * @return DOMElement
     */
    protected function getDomElement()
    {
        $xml = '<?xml version="1.0" standalone="yes"?><metadata created="2013-02-28T07:51:26.449Z" xmlns="http://musicbrainz.org/ns/mmd-2.0#" xmlns:ext="http://musicbrainz.org/ns/ext#-2.0"><release-list count="68" offset="0"><release id="6e729716-c0eb-3f50-a740-96ac173be50d" ext:score="100"><title>Metallica</title><status>Official</status><text-representation><language>eng</language><script>Latn</script></text-representation><artist-credit><name-credit joinphrase=""><artist id="65f4f0c5-ef9e-490c-aee3-909e7ae6b2ab"><name>Metallica</name><sort-name>Metallica</sort-name><disambiguation></disambiguation></artist></name-credit></artist-credit><release-group id="e8f70201-8899-3f0c-9e07-5d6495bc8046" type="Album"><primary-type>Album</primary-type></release-group><date>2010-09-22</date><country>JP</country><barcode>4988005628664</barcode><asin>B000GALEWC</asin><label-info-list><label-info><catalog-number>UICY-94666</catalog-number><label id="bd86569c-ba94-4e5e-a3c7-9ebd16b59709"><name>Universal Music Japan</name></label></label-info></label-info-list><medium-list count="1"><track-count>13</track-count><medium><format>CD</format><disc-list count="4"/><track-list count="13"/></medium></medium-list></release></release-list></metadata>';

        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml);

        $xpath = new \DOMXPath($domDocument);
        $namespaceURI = $domDocument->lookupNamespaceUri($domDocument->namespaceURI);
        $xpath->registerNamespace('ns', $namespaceURI);

        $domElement = $xpath->query('/ns:metadata/ns:release-list/ns:release')->item(0);
        return $domElement;
    }

}

