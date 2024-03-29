<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class SnapshotNamespace
 * Generated running $ php util/GenerateEndpoints.php 7.4.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SnapshotNamespace extends AbstractNamespace
{
    /**
     * $params['repository']     = (string) A repository name
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function cleanupRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\CleanupRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);

        return $this->performRequest($endpoint);
    }    /**
     * $params['repository']          = (string) A repository name
     * $params['snapshot']            = (string) A snapshot name
     * $params['master_timeout']      = (time) Explicit operation timeout for connection to master node
     * $params['wait_for_completion'] = (boolean) Should this request wait until the operation has completed before returning (Default = false)
     * $params['body']                = (array) The snapshot definition
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function create(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Create');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['repository']     = (string) A repository name
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['verify']         = (boolean) Whether to verify the repository after creation
     * $params['body']           = (array) The repository definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function createRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\CreateRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['repository']     = (string) A repository name
     * $params['snapshot']       = (string) A snapshot name
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function delete(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Delete');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);

        return $this->performRequest($endpoint);
    }    /**
     * $params['repository']     = (list) A comma-separated list of repository names
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function deleteRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\DeleteRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);

        return $this->performRequest($endpoint);
    }    /**
     * $params['repository']         = (string) A repository name
     * $params['snapshot']           = (list) A comma-separated list of snapshot names
     * $params['master_timeout']     = (time) Explicit operation timeout for connection to master node
     * $params['ignore_unavailable'] = (boolean) Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown
     * $params['verbose']            = (boolean) Whether to show verbose snapshot info or only show the basic info found in the repository index blob
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function get(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Get');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);

        return $this->performRequest($endpoint);
    }    /**
     * $params['repository']     = (list) A comma-separated list of repository names
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function getRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\GetRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);

        return $this->performRequest($endpoint);
    }    /**
     * $params['repository']          = (string) A repository name
     * $params['snapshot']            = (string) A snapshot name
     * $params['master_timeout']      = (time) Explicit operation timeout for connection to master node
     * $params['wait_for_completion'] = (boolean) Should this request wait until the operation has completed before returning (Default = false)
     * $params['body']                = (array) Details of what to restore
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function restore(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Restore');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['repository']         = (string) A repository name
     * $params['snapshot']           = (list) A comma-separated list of snapshot names
     * $params['master_timeout']     = (time) Explicit operation timeout for connection to master node
     * $params['ignore_unavailable'] = (boolean) Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function status(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Status');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);

        return $this->performRequest($endpoint);
    }    /**
     * $params['repository']     = (string) A repository name
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     */

    public function verifyRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\VerifyRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);

        return $this->performRequest($endpoint);
    }
}
