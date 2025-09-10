<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ClusterFetchGraphParams); // set properties as needed
 * $client->ai.clusters->fetchGraph(...$params->toArray());
 * ```
 * Fetch a cluster visualization.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.clusters->fetchGraph(...$params->toArray());`
 *
 * @see Telnyx\AI\Clusters->fetchGraph
 *
 * @phpstan-type cluster_fetch_graph_params = array{clusterID?: int}
 */
final class ClusterFetchGraphParams implements BaseModel
{
    /** @use SdkModel<cluster_fetch_graph_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?int $clusterID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $clusterID = null): self
    {
        $obj = new self;

        null !== $clusterID && $obj->clusterID = $clusterID;

        return $obj;
    }

    public function withClusterID(int $clusterID): self
    {
        $obj = clone $this;
        $obj->clusterID = $clusterID;

        return $obj;
    }
}
