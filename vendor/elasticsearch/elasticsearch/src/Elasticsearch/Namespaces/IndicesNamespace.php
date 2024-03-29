<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class IndicesNamespace
 * Generated running $ php util/GenerateEndpoints.php 7.4.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class IndicesNamespace extends AbstractNamespace
{
    /**
     * $params['index'] = (string) The name of the index to scope the operation
     * $params['body']  = (array) Define analyzer/tokenizer parameters and the text on which the analysis should be performed
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-analyze.html
     */

    public function analyze(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Analyze');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index name to limit the operation
     * $params['fielddata']          = (boolean) Clear field data
     * $params['fields']             = (list) A comma-separated list of fields to clear when using the `fielddata` parameter (default: all)
     * $params['query']              = (boolean) Clear query caches
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['request']            = (boolean) Clear request cache
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-clearcache.html
     */

    public function clearCache(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\ClearCache');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']                  = (string) The name of the source index to clone
     * $params['target']                 = (string) The name of the target index to clone into
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['master_timeout']         = (time) Specify timeout for connection to master
     * $params['wait_for_active_shards'] = (string) Set the number of active shards to wait for on the cloned index before the operation returns.
     * $params['body']                   = (array) The configuration for the target index (`settings` and `aliases`)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-clone-index.html
     */

    public function clone(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $target = $this->extractArgument($params, 'target');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\CloneIndices');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setTarget($target);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']                  = (list) A comma separated list of indices to close
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['master_timeout']         = (time) Specify timeout for connection to master
     * $params['ignore_unavailable']     = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']       = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']       = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['wait_for_active_shards'] = (string) Sets the number of active shards to wait for before the operation returns.
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-open-close.html
     */

    public function close(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Close');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']                  = (string) The name of the index
     * $params['include_type_name']      = (boolean) Whether a type should be expected in the body of the mappings.
     * $params['wait_for_active_shards'] = (string) Set the number of active shards to wait for before the operation returns.
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['master_timeout']         = (time) Specify timeout for connection to master
     * $params['body']                   = (array) The configuration for the index (`settings` and `mappings`)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-create-index.html
     */

    public function create(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Create');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of indices to delete; use `_all` or `*` string to delete all indices
     * $params['timeout']            = (time) Explicit operation timeout
     * $params['master_timeout']     = (time) Specify timeout for connection to master
     * $params['ignore_unavailable'] = (boolean) Ignore unavailable indexes (default: false)
     * $params['allow_no_indices']   = (boolean) Ignore if a wildcard expression resolves to no concrete indices (default: false)
     * $params['expand_wildcards']   = (enum) Whether wildcard expressions should get expanded to open or closed indices (default: open) (Options = open,closed,none,all) (Default = open)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-delete-index.html
     */

    public function delete(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Delete');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']          = (list) A comma-separated list of index names (supports wildcards); use `_all` for all indices (Required)
     * $params['name']           = (list) A comma-separated list of aliases to delete (supports wildcards); use `_all` to delete all aliases for the specified indices. (Required)
     * $params['timeout']        = (time) Explicit timestamp for the document
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     */

    public function deleteAlias(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\DeleteAlias');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }    /**
     * $params['name']           = (string) The name of the template
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
     */

    public function deleteTemplate(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\DeleteTemplate');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['ignore_unavailable'] = (boolean) Ignore unavailable indexes (default: false)
     * $params['allow_no_indices']   = (boolean) Ignore if a wildcard expression resolves to no concrete indices (default: false)
     * $params['expand_wildcards']   = (enum) Whether wildcard expressions should get expanded to open or closed indices (default: open) (Options = open,closed,none,all) (Default = open)
     * $params['flat_settings']      = (boolean) Return settings in flat format (default: false)
     * $params['include_defaults']   = (boolean) Whether to return all default setting for each of the indices. (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return bool
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-exists.html
     */

    public function exists(array $params = []): bool
    {
        $index = $this->extractArgument($params, 'index');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Exists');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['name']               = (list) A comma-separated list of alias names to return (Required)
     * $params['index']              = (list) A comma-separated list of index names to filter aliases
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = all)
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return bool
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     */

    public function existsAlias(array $params = []): bool
    {
        $name = $this->extractArgument($params, 'name');
        $index = $this->extractArgument($params, 'index');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\ExistsAlias');
        $endpoint->setParams($params);
        $endpoint->setName($name);
        $endpoint->setIndex($index);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['name']           = (list) The comma separated names of the index templates
     * $params['flat_settings']  = (boolean) Return settings in flat format (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return bool
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
     */

    public function existsTemplate(array $params = []): bool
    {
        $name = $this->extractArgument($params, 'name');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\ExistsTemplate');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` to check the types across all indices
     * $params['type']               = DEPRECATED (list) A comma-separated list of document types to check
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return bool
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-types-exists.html
     */

    public function existsType(array $params = []): bool
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\ExistsType');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string for all indices
     * $params['force']              = (boolean) Whether a flush should be forced even if it is not necessarily needed ie. if no changes will be committed to the index. This is useful if transaction log IDs should be incremented even if no uncommitted changes are present. (This setting can be considered as internal)
     * $params['wait_if_ongoing']    = (boolean) If set to true the flush operation will block until the flush can be executed if another flush operation is already executing. The default is true. If set to false the flush will be skipped iff if another flush operation is already running.
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-flush.html
     */

    public function flush(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Flush');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string for all indices
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-synced-flush-api.html
     */

    public function flushSynced(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\FlushSynced');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']                = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['flush']                = (boolean) Specify whether the index should be flushed after performing the operation (default: true)
     * $params['ignore_unavailable']   = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']     = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']     = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['max_num_segments']     = (number) The number of segments the index should be merged into (default: dynamic)
     * $params['only_expunge_deletes'] = (boolean) Specify whether the operation should only expunge deleted documents
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-forcemerge.html
     */

    public function forcemerge(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Forcemerge');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names
     * $params['include_type_name']  = (boolean) Whether to add the type name to the response (default: false)
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['ignore_unavailable'] = (boolean) Ignore unavailable indexes (default: false)
     * $params['allow_no_indices']   = (boolean) Ignore if a wildcard expression resolves to no concrete indices (default: false)
     * $params['expand_wildcards']   = (enum) Whether wildcard expressions should get expanded to open or closed indices (default: open) (Options = open,closed,none,all) (Default = open)
     * $params['flat_settings']      = (boolean) Return settings in flat format (default: false)
     * $params['include_defaults']   = (boolean) Whether to return all default setting for each of the indices. (Default = false)
     * $params['master_timeout']     = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-index.html
     */

    public function get(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Get');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['name']               = (list) A comma-separated list of alias names to return
     * $params['index']              = (list) A comma-separated list of index names to filter aliases
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = all)
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     */

    public function getAlias(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\GetAlias');
        $endpoint->setParams($params);
        $endpoint->setName($name);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['fields']             = (list) A comma-separated list of fields (Required)
     * $params['index']              = (list) A comma-separated list of index names
     * $params['type']               = DEPRECATED (list) A comma-separated list of document types
     * $params['include_type_name']  = (boolean) Whether a type should be returned in the body of the mappings.
     * $params['include_defaults']   = (boolean) Whether the default mapping values should be returned as well
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-field-mapping.html
     */

    public function getFieldMapping(array $params = [])
    {
        $fields = $this->extractArgument($params, 'fields');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\GetFieldMapping');
        $endpoint->setParams($params);
        $endpoint->setFields($fields);
        $endpoint->setIndex($index);
        $endpoint->setType($type);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names
     * $params['type']               = DEPRECATED (list) A comma-separated list of document types
     * $params['include_type_name']  = (boolean) Whether to add the type name to the response (default: false)
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['master_timeout']     = (time) Specify timeout for connection to master
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-mapping.html
     */

    public function getMapping(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\GetMapping');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['name']               = (list) The name of the settings that should be included
     * $params['master_timeout']     = (time) Specify timeout for connection to master
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open,closed)
     * $params['flat_settings']      = (boolean) Return settings in flat format (default: false)
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['include_defaults']   = (boolean) Whether to return all default setting for each of the indices. (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-settings.html
     */

    public function getSettings(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\GetSettings');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }    /**
     * $params['name']              = (list) The comma separated names of the index templates
     * $params['include_type_name'] = (boolean) Whether a type should be returned in the body of the mappings.
     * $params['flat_settings']     = (boolean) Return settings in flat format (default: false)
     * $params['master_timeout']    = (time) Explicit operation timeout for connection to master node
     * $params['local']             = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
     */

    public function getTemplate(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\GetTemplate');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-upgrade.html
     */

    public function getUpgrade(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\GetUpgrade');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']                  = (list) A comma separated list of indices to open
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['master_timeout']         = (time) Specify timeout for connection to master
     * $params['ignore_unavailable']     = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']       = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']       = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = closed)
     * $params['wait_for_active_shards'] = (string) Sets the number of active shards to wait for before the operation returns.
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-open-close.html
     */

    public function open(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Open');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']          = (list) A comma-separated list of index names the alias should point to (supports wildcards); use `_all` to perform the operation on all indices. (Required)
     * $params['name']           = (string) The name of the alias to be created or updated (Required)
     * $params['timeout']        = (time) Explicit timestamp for the document
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     * $params['body']           = (array) The settings for the alias, such as `routing` or `filter`
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     */

    public function putAlias(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\PutAlias');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setName($name);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names the mapping should be added to (supports wildcards); use `_all` or omit to add the mapping on all indices.
     * $params['type']               = DEPRECATED (string) The name of the document type
     * $params['include_type_name']  = (boolean) Whether a type should be expected in the body of the mappings.
     * $params['timeout']            = (time) Explicit operation timeout
     * $params['master_timeout']     = (time) Specify timeout for connection to master
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['body']               = (array) The mapping definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-put-mapping.html
     */

    public function putMapping(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\PutMapping');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['master_timeout']     = (time) Specify timeout for connection to master
     * $params['timeout']            = (time) Explicit operation timeout
     * $params['preserve_existing']  = (boolean) Whether to update existing settings. If set to `true` existing settings on an index remain unchanged, the default is `false`
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['flat_settings']      = (boolean) Return settings in flat format (default: false)
     * $params['body']               = (array) The index settings to be updated (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-update-settings.html
     */

    public function putSettings(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\PutSettings');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['name']              = (string) The name of the template
     * $params['include_type_name'] = (boolean) Whether a type should be returned in the body of the mappings.
     * $params['order']             = (number) The order for this template when merging multiple matching ones (higher numbers are merged later, overriding the lower numbers)
     * $params['create']            = (boolean) Whether the index template should only be added if new or can also replace an existing one (Default = false)
     * $params['timeout']           = (time) Explicit operation timeout
     * $params['master_timeout']    = (time) Specify timeout for connection to master
     * $params['flat_settings']     = (boolean) Return settings in flat format (default: false)
     * $params['body']              = (array) The template definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
     */

    public function putTemplate(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\PutTemplate');
        $endpoint->setParams($params);
        $endpoint->setName($name);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']       = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['detailed']    = (boolean) Whether to display detailed information about shard recovery (Default = false)
     * $params['active_only'] = (boolean) Display only those recoveries that are currently on-going (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-recovery.html
     */

    public function recovery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Recovery');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-refresh.html
     */

    public function refresh(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Refresh');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['alias']                  = (string) The name of the alias to rollover (Required)
     * $params['new_index']              = (string) The name of the rollover index
     * $params['include_type_name']      = (boolean) Whether a type should be included in the body of the mappings.
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['dry_run']                = (boolean) If set to true the rollover action will only be validated but not actually performed even if a condition matches. The default is false
     * $params['master_timeout']         = (time) Specify timeout for connection to master
     * $params['wait_for_active_shards'] = (string) Set the number of active shards to wait for on the newly created rollover index before the operation returns.
     * $params['body']                   = (array) The conditions that needs to be met for executing rollover
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-rollover-index.html
     */

    public function rollover(array $params = [])
    {
        $alias = $this->extractArgument($params, 'alias');
        $new_index = $this->extractArgument($params, 'new_index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Rollover');
        $endpoint->setParams($params);
        $endpoint->setAlias($alias);
        $endpoint->setNewIndex($new_index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['verbose']            = (boolean) Includes detailed memory usage by Lucene. (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-segments.html
     */

    public function segments(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Segments');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['status']             = (list) A comma-separated list of statuses used to filter on shards to get store information for (Options = green,yellow,red,all)
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-shards-stores.html
     */

    public function shardStores(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\ShardStores');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']                  = (string) The name of the source index to shrink
     * $params['target']                 = (string) The name of the target index to shrink into
     * $params['copy_settings']          = (boolean) whether or not to copy settings from the source index (defaults to false)
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['master_timeout']         = (time) Specify timeout for connection to master
     * $params['wait_for_active_shards'] = (string) Set the number of active shards to wait for on the shrunken index before the operation returns.
     * $params['body']                   = (array) The configuration for the target index (`settings` and `aliases`)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-shrink-index.html
     */

    public function shrink(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $target = $this->extractArgument($params, 'target');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Shrink');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setTarget($target);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']                  = (string) The name of the source index to split
     * $params['target']                 = (string) The name of the target index to split into
     * $params['copy_settings']          = (boolean) whether or not to copy settings from the source index (defaults to false)
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['master_timeout']         = (time) Specify timeout for connection to master
     * $params['wait_for_active_shards'] = (string) Set the number of active shards to wait for on the shrunken index before the operation returns.
     * $params['body']                   = (array) The configuration for the target index (`settings` and `aliases`)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-split-index.html
     */

    public function split(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $target = $this->extractArgument($params, 'target');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Split');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setTarget($target);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['metric']                     = (list) Limit the information returned the specific metrics.
     * $params['index']                      = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['completion_fields']          = (list) A comma-separated list of fields for `fielddata` and `suggest` index metric (supports wildcards)
     * $params['fielddata_fields']           = (list) A comma-separated list of fields for `fielddata` index metric (supports wildcards)
     * $params['fields']                     = (list) A comma-separated list of fields for `fielddata` and `completion` index metric (supports wildcards)
     * $params['groups']                     = (list) A comma-separated list of search groups for `search` index metric
     * $params['level']                      = (enum) Return stats aggregated at cluster, index or shard level (Options = cluster,indices,shards) (Default = indices)
     * $params['types']                      = (list) A comma-separated list of document types for the `indexing` index metric
     * $params['include_segment_file_sizes'] = (boolean) Whether to report the aggregated disk usage of each one of the Lucene index files (only applies if segment stats are requested) (Default = false)
     * $params['include_unloaded_segments']  = (boolean) If set to true segment stats will include stats for segments that are not currently loaded into memory (Default = false)
     * $params['expand_wildcards']           = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['forbid_closed_indices']      = (boolean) If set to false stats will also collected from closed indices if explicitly specified or if expand_wildcards expands to closed indices (Default = true)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-stats.html
     */

    public function stats(array $params = [])
    {
        $metric = $this->extractArgument($params, 'metric');
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Stats');
        $endpoint->setParams($params);
        $endpoint->setMetric($metric);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['timeout']        = (time) Request timeout
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     * $params['body']           = (array) The definition of `actions` to perform (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     */

    public function updateAliases(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\UpdateAliases');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']                 = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['allow_no_indices']      = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']      = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['ignore_unavailable']    = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['wait_for_completion']   = (boolean) Specify whether the request should block until the all segments are upgraded (default: false)
     * $params['only_ancient_segments'] = (boolean) If true, only ancient (an older Lucene major release) segments will be upgraded
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-upgrade.html
     */

    public function upgrade(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\Upgrade');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }    /**
     * $params['index']              = (list) A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices
     * $params['type']               = DEPRECATED (list) A comma-separated list of document types to restrict the operation; leave empty to perform the operation on all types
     * $params['explain']            = (boolean) Return detailed information about the error
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)
     * $params['q']                  = (string) Query in the Lucene query string syntax
     * $params['analyzer']           = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']   = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     * $params['default_operator']   = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']                 = (string) The field to use as default where no field prefix is given in the query string
     * $params['lenient']            = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['rewrite']            = (boolean) Provide a more detailed explanation showing the actual Lucene query that will be executed.
     * $params['all_shards']         = (boolean) Execute validation on all shards instead of one random shard per index
     * $params['body']               = (array) The query definition specified with the Query DSL
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-validate.html
     */

    public function validateQuery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Indices\ValidateQuery');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
}
