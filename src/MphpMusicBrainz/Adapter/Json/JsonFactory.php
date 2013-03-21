<?php
/**
 * JsonFactory.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Json
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Adapter\Json;
/**
 * JsonFactory
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Adapter\Json
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
class JsonFactory implements \MphpMusicBrainz\Adapter\Interfaces\AdapterFactoryInterface
{

    /**
     * Return an instance of a ResultSetAdapterInterface for the specified resource
     *
     * @param string $resource The resource type
     * @param mixed  $results  The webservice data to inject into the Adapter
     *
     * @return \MphpMusicBrainz\Adapter\Interfaces\ResultSet\ResultSetAdapterInterface
     */
    public function getResultSetAdapter($resource, $results)
    {
        trigger_error('Not yet implemented', E_USER_ERROR);
    }

    /**
     * Return an instance of a ResultAdapterInterface for the specified resource
     *
     * @param string $resource The resource type
     * @param mixed  $results  The webservice data to inject into the Adapter
     *
     * @return \MphpMusicBrainz\Adapter\Interfaces\Result\ResultAdapterInterface
     */
    public function getResultAdapter($resource, $results)
    {
        trigger_error('Not yet implemented', E_USER_ERROR);
    }

}