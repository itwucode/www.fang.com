<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ExistsSource
 * Elasticsearch API name exists_source
 * Generated running $ php util/GenerateEndpoints.php 7.4.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ExistsSource extends AbstractEndpoint
{

    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new RuntimeException(
                'id is required for exists_source'
            );
        }
        $id = $this->id;
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for exists_source'
            );
        }
        $index = $this->index;
        $type = $this->type ?? null;
        if (isset($type)) {
            trigger_error('Specifying types in urls has been deprecated', E_USER_DEPRECATED);
        }

        if (isset($type)) {
            return "/$index/$type/$id/_source";
        }
        return "/$index/_source/$id";
    }

    public function getParamWhitelist(): array
    {
        return [
            'preference',
            'realtime',
            'refresh',
            'routing',
            '_source',
            '_source_excludes',
            '_source_includes',
            'version',
            'version_type'
        ];
    }

    public function getMethod(): string
    {
        return 'HEAD';
    }

    public function setId($id): ExistsSource
    {
        if (isset($id) !== true) {
            return $this;
        }
        $this->id = $id;

        return $this;
    }
}
