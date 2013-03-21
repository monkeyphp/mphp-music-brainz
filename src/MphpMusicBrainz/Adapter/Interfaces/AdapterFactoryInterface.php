<?php
/**
 * AdapterFactoryInterface.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Interfaces;

/**
 * AdapterFactoryInterface
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Interfaces
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
interface AdapterFactoryInterface
{

    /**
     * Return an instance of a ResultSetAdapterInterface for the specified resource
     *
     * @param string $resource The resource type
     * @param mixed  $results  The webservice data to inject into the Adapter
     *
     * @return \MphpMusicBrainz\Adapter\Interfaces\ResultSet\ResultSetAdapterInterface
     */
    public function getResultSetAdapter($resource, $results);

    /**
     * Return an instance of a ResultAdapterInterface for the specified resource
     *
     * @param string $resource The resource type
     * @param mixed  $results  The webservice data to inject into the Adapter
     *
     * @return \MphpMusicBrainz\Adapter\Interfaces\Result\ResultAdapterInterface
     */
    public function getResultAdapter($resource, $results);

}