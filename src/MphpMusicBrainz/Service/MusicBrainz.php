<?php
/**
 * MusicBrainz.php
 *
 * PHP Version  PHP 5.3.10
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Service
 * @author     David White [monkeyphp] <git@monkeyphp.com>
 */
namespace MphpMusicBrainz\Service;

use Exception;
use Zend\Http\Request;
use Zend\Http\Client;

/**
 * MusicBrainz
 *
 * MusicBrainz service class provides an interface to the main MusicBrainz.org
 * web service
 *
 * @category   MphpMusicBrainz
 * @package    MphpMusicBrainz
 * @subpackage MphpMusicBrainz\Service
 * @author   David White [monkeyphp] <git@monkeyphp.com>
 */
class MusicBrainz
{

    /**
     * Top level resources
     *
     * Core entities available from the MusicBrainz.org web service..
     *
     * @var string
     */
    const RESOURCE_ARTIST        = 'artist';
    const RESOURCE_LABEL         = 'label';
    const RESOURCE_RECORDING     = 'recording';
    const RESOURCE_RELEASE       = 'release';
    const RESOURCE_RELEASE_GROUP = 'release-group';
    const RESOURCE_WORK          = 'work';

    /**
     * MusicBrainz service URL
     *
     * The location of the MusicBrainz.org web service.
     *
     * @var string
     */
    const SERVICE_URL = 'http://musicbrainz.org/ws/2/';

    /**
     * MusicBrainz top level resource URLs
     *
     * The root url for each of the core resources.
     *
     * @example http://musicbrainz.org/ws/2/artist
     *
     * @var string
     */
    const SERVICE_ARTIST       = 'artist';
    const SERVICE_LABEL         = 'label';
    const SERVICE_RECORDING     = 'recording';
    const SERVICE_RELEASE       = 'release';
    const SERVICE_RELEASE_GROUP = 'release-group';
    const SERVICE_WORK          = 'work';

    /**
     * Resource to service mappings
     *
     * Maps resource types to the endpoint of the webservice.
     *
     * @var array
     */
    protected $resourceServiceUris = array(
        self::RESOURCE_ARTIST        => self::SERVICE_ARTIST,
        self::RESOURCE_LABEL         => self::SERVICE_LABEL,
        self::RESOURCE_RECORDING     => self::SERVICE_RECORDING,
        self::RESOURCE_RELEASE       => self::SERVICE_RELEASE,
        self::RESOURCE_RELEASE_GROUP => self::SERVICE_RELEASE_GROUP,
        self::RESOURCE_WORK          => self::SERVICE_WORK
    );

    /**
     * Parameters that are included in searches.
     *
     * All parameters are optional except query which is required.
     *
     * @var string
     */
    const SEARCH_PARAM_QUERY    = 'query';
    const SEARCH_PARAM_LIMIT    = 'limit';
    const SEARCH_PARAM_OFFSET   = 'offset';
    const SEARCH_PARAM_FORMAT   = 'fmt';
    const SEARCH_PARAM_INCLUDES = 'inc';

    /**
     * Search limit values
     *
     * Searches accept a limit to the number of results returned.
     * Minimum is 1, maximum is 100 and the default is 25
     *
     * @var int
     */
    const SEARCH_LIMIT_MIN     = 1;
    const SEARCH_LIMIT_MAX     = 100;
    const SEARCH_LIMIT_DEFAULT = 25;

    /**
     * Default paging offset
     *
     * A search may find more results than can be retured in a single response.
     * The search offset allows paging of results. Default offset is always 0
     *
     * @var int
     */
    const SEARCH_OFFSET = 0;

    /**
     * Lookup requests may include a parameter to return more information about
     * the resource being looked up
     *
     * @var string
     */
    const INC_ARTISTS        = 'artists';
    const INC_RECORDINGS     = 'recordings';
    const INC_RELEASES       = 'releases';
    const INC_RELEASE_GROUPS = 'release-groups';
    const INC_WORKS          = 'works';
    const INC_LABELS         = 'labels';

    /**
     * Inc options
     *
     * Each resource has a specified list of includes that may be passed when a
     * lookup request is made.
     *
     * @var array
     */
    protected $includes = array(
        self::RESOURCE_ARTIST => array(
            self::INC_RECORDINGS, self::INC_RELEASES,
            self::INC_RELEASE_GROUPS, self::INC_WORKS
        ),
        self::RESOURCE_LABEL => array(
            self::INC_RELEASES
        ),
        self::RESOURCE_RECORDING => array(
            self::INC_ARTISTS, self::INC_RELEASES
        ),
        self::RESOURCE_RELEASE => array(
            self::INC_ARTISTS, self::INC_LABELS,
            self::INC_RECORDINGS, self::INC_RELEASE_GROUPS
        ),
        self::RESOURCE_RELEASE_GROUP => array(
            self::INC_ARTISTS, self::INC_RELEASES
        ),
        self::RESOURCE_WORK => array()
    );

    /**
     * Request format
     *
     * @var string
     */
    const FORMAT_JSON = 'json';

    /**
     * Request format
     *
     * This is the default format of the results returned.
     *
     * @var string
     */
    const FORMAT_XML = 'xml';

    /**
     * Instance of \Zend\Http\Client that this Service uses to access the webservice
     *
     * @var Client
     */
    protected $httpClient;

    /**
     * Constructor
     *
     * @param \Zend\Http\Client|null $httpClient Instance of Client
     *
     * @return void
     */
    public function __construct(Client $httpClient = null)
    {
        if ($httpClient instanceof Client) {
            $this->setHttpClient($httpClient);
        }
    }

    /**
     * Return the instance of Client
     *
     * @return Client
     */
    protected function getHttpClient()
    {
        if (! isset($this->httpClient)) {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }

    /**
     * Set the instance of Client
     *
     * @param \Zend\Http\Client $client The instance of Client
     *
     * @return \MphpMusicBrainz\Service\MusicBrainz
     */
    protected function setHttpClient(Client $client)
    {
        $this->httpClient = $client;
        return $this;
    }

    /**
     * Return a Request instance
     *
     * @return Request
     */
    protected function getRequest($uri, array $params = array(), $method = Request::METHOD_GET)
    {
        $request = new Request();
        $request->setUri($uri);
        $request->setMethod($method);
        $request->getQuery()->fromArray($params);

        return $request;
    }

    /**
     * Return an array of includes
     *
     * @param string $resource (Optional) resource string to filter includes
     *
     * @return array
     */
    protected function getIncludes($resource = null)
    {
        if (is_null($resource)) {
            return $this->includes;
        }
        return $this->includes[$resource];
    }

    /**
     * Return an array of all resource types
     *
     * @return array
     */
    protected function getResources()
    {
        return array(
            self::RESOURCE_ARTIST,
            self::RESOURCE_LABEL,
            self::RESOURCE_RECORDING,
            self::RESOURCE_RELEASE,
            self::RESOURCE_RELEASE_GROUP,
            self::RESOURCE_WORK
        );
    }

    /**
     * Include parametes should be concatenated with a '+'
     *
     * @param array $includes The array of include paramters
     *
     * @return string
     */
    protected function prepareIncludes(array $includes = array())
    {
        return implode('+', $includes);
    }

    /**
     * Perform a lookup for the specified resource using the supplied id string
     * and optionally requested the supplied includes
     *
     * @param string $resource (Required) The resource to lookup
     * @param string $id       (Required) The id of the resource
     * @param array  $includes (Optional) Any includes to include in the response
     * @param string $format   (Optional) The data format of the response
     *
     * @throws Exception
     * @return \MphpMusicBrainz\Adapter\Interfaces\Result\ResultAdapterInterface
     */
    protected function lookup($resource, $id, $includes = array(), $format = self::FORMAT_XML)
    {
        try {
            $resource = $this->validateResource($resource);
            $id       = $this->validateId($id);
            $includes = $this->validateIncludes($resource, $includes);
            $format   = $this->validateFormat($format);

            $uri = self::SERVICE_URL . $this->resourceServiceUris[$resource] . '/' . $id;
            $params = array(
                self::SEARCH_PARAM_INCLUDES => $this->prepareIncludes($includes),
                self::SEARCH_PARAM_FORMAT   => $format
            );
            $request = $this->getRequest($uri, $params);

            $httpClient = $this->getHttpClient();

            $response = $httpClient->dispatch($request);

            $body = $response->getBody();

            $factory = $this->getAdapterFactory($format);

            $adapter = $factory->getResultAdapter($resource, $body);

            return $adapter;

        } catch(\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Perform a lookup for an Artist identified by the supplied id and
     * optionally including the supplied includes in the response
     *
     * @param string $id       (Required) The id of the resource
     * @param array  $includes (Optional) Any includes to include in the response
     * @param string $format   (Optional) The data format of the response
     *
     * @throws Exception
     * @return \MphpMusicBrainz\Result\Artist
     */
    public function lookupArtist($id, array $includes = array(), $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->lookup(self::RESOURCE_ARTIST, $id, $includes, $format);
            return new \MphpMusicBrainz\Result\Artist($adapter);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Perform a lookup for a Label identified by the supplied id and
     * optionally including the supplied includes in the response
     *
     * @param string $id       (Required) The id of the resource
     * @param array  $includes (Optional) Any includes to include in the response
     * @param string $format   (Optional) The data format of the response
     *
     * @throws Exception
     * @return \MphpMusicBrainz\Result\Artist
     */
    public function lookupLabel($id, array $includes = array(), $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->lookup(self::RESOURCE_LABEL, $id, $includes, $format);
            return new \MphpMusicBrainz\Result\Label($adapter);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Perform a lookup for a Recording identified by the supplied id and
     * optionally including the supplied includes in the response
     *
     * @param string $id       (Required) The id of the resource
     * @param array  $includes (Optional) Any includes to include in the response
     * @param string $format   (Optional) The data format of the response
     *
     * @throws Exception
     * @return \MphpMusicBrainz\Result\Artist
     */
    public function lookupRecording($id, array $includes = array(), $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->lookup(self::RESOURCE_RECORDING, $id, $includes, $format);
            return new \MphpMusicBrainz\Result\Recording($adapter);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Perform a lookup for a Release identified by the supplied id and
     * optionally including the supplied includes in the response
     *
     * @param string $id       (Required) The id of the resource
     * @param array  $includes (Optional) Any includes to include in the response
     * @param string $format   (Optional) The data format of the response
     *
     * @throws Exception
     * @return \MphpMusicBrainz\Result\Artist
     */
    public function lookupRelease($id, array $includes = array(), $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->lookup(self::RESOURCE_RELEASE, $id, $includes, $format);
            return new \MphpMusicBrainz\Result\Release($adapter);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Perform a lookup for a ReleaseGroup identified by the supplied id and
     * optionally including the supplied includes in the response
     *
     * @param string $id       (Required) The id of the resource
     * @param array  $includes (Optional) Any includes to include in the response
     * @param string $format   (Optional) The data format of the response
     *
     * @throws Exception
     * @return \MphpMusicBrainz\Result\Artist
     */
    public function lookupReleaseGroup($id, array $includes = array(), $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->lookup(self::RESOURCE_RELEASE_GROUP, $id, $includes, $format);
            return new \MphpMusicBrainz\Result\ReleaseGroup($adapter);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Perform a lookup for a Work identified by the supplied id and
     * optionally including the supplied includes in the response
     *
     * @param string $id       (Required) The id of the resource
     * @param array  $includes (Optional) Any includes to include in the response
     * @param string $format   (Optional) The data format of the response
     *
     * @throws Exception
     * @return \MphpMusicBrainz\Result\Work
     */
    public function lookupWork($id, array $includes = array(), $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->lookup(self::RESOURCE_WORK, $id, $includes, $format);
            return new \MphpMusicBrainz\Result\Work($adapter);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Make a call to the webservice to make a search for the specified
     * resource using the supplied search parameters.
     *
     * @param type $resource (Required) The resource type to search for
     * @param string $query  (Required) The search string
     * @param int    $limit  (Optional) The requested limit
     * @param int    $offset (Optional) The requested offset
     * @param string $format (Optional) The response format to request
     *
     * @throws Exception
     * @return \MphpMusicBrainz\Adapter\Interfaces\Result\ResultSetAdapterInterface
     */
    protected function search($resource, $query, $limit = self::SEARCH_LIMIT_MAX, $offset = self::SEARCH_OFFSET, $format = self::FORMAT_XML)
    {
        try {
            $resource = $this->validateResource($resource);
            $query    = $this->validateQuery($query);
            $limit    = $this->validateLimit($limit);
            $offset   = $this->validateOffset($offset);
            $format   = $this->validateFormat($format);

            $uri = self::SERVICE_URL . $this->resourceServiceUris[$resource];
            $params = array(
                self::SEARCH_PARAM_QUERY  => $query,
                self::SEARCH_PARAM_LIMIT  => $limit,
                self::SEARCH_PARAM_OFFSET => $offset,
                self::SEARCH_PARAM_FORMAT => $format,
            );
            $request = $this->getRequest($uri, $params);

            $httpClient = $this->getHttpClient();

            $response = $httpClient->dispatch($request);

            $body = $response->getBody();

            $factory = $this->getAdapterFactory($format);

            $adapter = $factory->getResultSetAdapter($resource, $body);

            return $adapter;

        } catch(\Exception $exception) {
            throw $exception;
        }
    }



    /**
     * Send a search query to the MusicBrainz web service
     *
     * @param string $query  (Required) The search string
     * @param int    $limit  (Optional) The requested limit
     * @param int    $offset (Optional) The requested offset
     * @param string $format (Optional) The response format to request
     *
     * @throws \Exception
     * @return \MphpMusicBrainz\ResultSet\ArtistResultSet
     */
    public function searchArtist($query, $limit = self::SEARCH_LIMIT_MAX, $offset = self::SEARCH_OFFSET, $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->search(self::RESOURCE_ARTIST, $query, $limit, $offset, $format);
            return new \MphpMusicBrainz\ResultSet\ArtistResultSet($adapter, $query, $limit);
        } catch(\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Send a search query to the MusicBrainz web service
     *
     * @param string $query  (Required) The search string
     * @param int    $limit  (Optional) The requested limit
     * @param int    $offset (Optional) The requested offset
     * @param string $format (Optional) The response format to request
     *
     * @throws Exception
     * @return \MphpMusicBrainz\ResultSet\LabelResultSet
     */
    public function searchLabel($query, $limit = self::SEARCH_LIMIT_MAX, $offset = self::SEARCH_OFFSET, $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->search(self::RESOURCE_LABEL, $query, $limit, $offset, $format);
            return new \MphpMusicBrainz\ResultSet\LabelResultSet($adapter, $query, $limit);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Return a RecordingResultSet containing the retrieved Recording records from
     * the web service
     *
     * @param string $query  (Required) The search string
     * @param int    $limit  (Optional) The requested limit
     * @param int    $offset (Optional) The requested offset
     * @param string $format (Optional) The response format to request
     *
     * @return \MphpMusicBrainz\ResultSet\RecordingResultSet
     */
    public function searchRecording($query, $limit = self::SEARCH_LIMIT_MAX, $offset = self::SEARCH_OFFSET, $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->search(self::RESOURCE_RECORDING, $query, $limit, $offset, $format);
            return new \MphpMusicBrainz\ResultSet\RecordingResultSet($adapter, $query, $limit);
        } catch(\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Search for a Release using the supplied search query optionally providing
     * a limit and an offet
     *
     * @param string $query  (Required) The search string
     * @param int    $limit  (Optional) The requested limit
     * @param int    $offset (Optional) The requested offset
     * @param string $format (Optional) The response format to request
     *
     * @return \MphpMusicBrainz\ResultSet\ReleaseResultSet
     */
    public function searchRelease($query, $limit = self::SEARCH_LIMIT_MAX, $offset = self::SEARCH_OFFSET, $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->search(self::RESOURCE_RELEASE, $query, $limit, $offset, $format);
            return new \MphpMusicBrainz\ResultSet\ReleaseResultSet($adapter, $query, $limit);
        } catch(\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Perform a search for Release Groups using the supplied query string
     *
     * @param string $query  (Required) The search string
     * @param int    $limit  (Optional) The requested limit
     * @param int    $offset (Optional) The requested offset
     * @param string $format (Optional) The response format to request
     *
     * @throws Exception
     * @return \MphpMusicBrainz\ResultSet\ReleaseGroupResultSet
     */
    public function searchReleaseGroup($query, $limit = self::SEARCH_LIMIT_MAX, $offset = self::SEARCH_OFFSET, $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->search(self::RESOURCE_RELEASE_GROUP, $query, $limit, $offset, $format);
            return new \MphpMusicBrainz\ResultSet\ReleaseGroupResultSet($adapter, $query, $limit);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Perform a search for Work using the supplied parameters
     *
     * @param string $query  (Required) The search string
     * @param int    $limit  (Optional) The requested limit
     * @param int    $offset (Optional) The requested offset
     * @param string $format (Optional) The response format to request
     *
     * @throws Exception
     * @return \MphpMusicBrainz\ResultSet\WorkResultSetAdapter
     */
    public function searchWork($query, $limit = self::SEARCH_LIMIT_MAX, $offset = self::SEARCH_OFFSET, $format = self::FORMAT_XML)
    {
        try {
            $adapter = $this->search(self::RESOURCE_WORK, $query, $limit, $offset, $format);
            return new \MphpMusicBrainz\ResultSet\WorkResultSet($adapter, $query, $limit);

        } catch(\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Return an AdapterFactoryInterface instance
     *
     * @param string $format The format of the Factory to return
     *
     * @return \MphpMusicBrainz\Adapter\Interface\AdapterFactoryInterface
     */
    protected function getAdapterFactory($format = self::FORMAT_XML)
    {
        return \MphpMusicBrainz\Adapter\AdapterFactory::getFactory($format);
    }

    /**
     * Validate the supplied includes array by the supplied resource type
     *
     * @param string $resource The string name of the resource
     * @param array  $includes The array of includes to validate
     *
     * @throws \MphpMusicBrainz\Exception\InvalidIncludeException
     * @return array
     */
    protected function validateIncludes($resource, $includes = array())
    {
        if (count(array_diff($includes, $this->getIncludes($resource)))) {
            throw new \MphpMusicBrainz\Exception\InvalidIncludeException();
        }
        return $includes;
    }

    /**
     * Validate the supplied id/mbid string to make sure that it is a valid
     * MusicBrainz MBID string
     *
     * @param string $id The MBID to validate
     *
     * @throws \MphpMusicBrainz\Exception\InvalidIdException
     * @return string
     */
    protected function validateId($id)
    {
        if (! is_string($id)) {
            throw new \MphpMusicBrainz\Exception\InvalidIdException('Invalid Id/MBID string supplied');
        }
        return $id;
    }

    /**
     * Validate that the supplied resource name is valid
     *
     * @param string $resource String name resource
     *
     * @throws \MphpMusicBrainz\Exception\InvalidResourceException
     * @return string
     */
    protected function validateResource($resource)
    {
        if (! in_array($resource, $this->getResources())) {
            throw new \MphpMusicBrainz\Exception\InvalidResourceException('Invalid resource supplied');
        }
        return $resource;
    }

    /**
     * Validate the search criteria
     *
     * @param string $query The search criteria
     *
     * @throws MphpMusicBrainz\Exception\InvalidQueryException
     * @return string
     */
    protected function validateQuery($query)
    {
        if (! is_string($query)) {
            throw new \MphpMusicBrainz\Exception\InvalidQueryException('Invalid Query supplied');
        }
        return $query;
    }

    /**
     * Validate the search limit
     *
     * @param int $limit The search limit supplied
     *
     * @throws \MphpMusicBrainz\Exception\InvalidLimitException
     * @return int
     */
    protected function validateLimit($limit)
    {
        if (! is_numeric($limit)) {
            throw new \MphpMusicBrainz\Exception\InvalidLimitException('The supplied limit is invalid');
        }
        if ($limit < self::SEARCH_LIMIT_MIN || $limit > self::SEARCH_LIMIT_MAX) {
            throw new \MphpMusicBrainz\Exception\InvalidLimitException("The supplied limit ($limit) is invalid");
        }
        return $limit;
    }

    /**
     * Validate the search offset
     *
     * @param int $offset The search offset
     *
     * @throws \MphpMusicBrainz\Exception\InvalidOffsetException
     * @return int
     */
    protected function validateOffset($offset)
    {
        if (! is_int($offset)) {
            throw new \MphpMusicBrainz\Exception\InvalidOffsetException('Invalid offset supplied');
        }
        return $offset;
    }

    /**
     * Validate the search format
     *
     * @param string $format The search format
     *
     * @throws \MphpMusicBrainz\Exception\InvalidFormatException
     * @return string
     */
    protected function validateFormat($format)
    {
        if ($format !== self::FORMAT_XML && $format !== self::FORMAT_JSON) {
            throw new \MphpMusicBrainz\Exception\InvalidFormatException('Invalid request format supplied. Request format should be XML or JSON.');
        }
        return $format;
    }

}