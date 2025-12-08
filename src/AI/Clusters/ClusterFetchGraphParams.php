<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Fetch a cluster visualization.
 *
 * @see Telnyx\Services\AI\ClustersService::fetchGraph()
 *
 * @phpstan-type ClusterFetchGraphParamsShape = array{cluster_id?: int}
 */
final class ClusterFetchGraphParams implements BaseModel
{
    /** @use SdkModel<ClusterFetchGraphParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $cluster_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $cluster_id = null): self
    {
        $obj = new self;

        null !== $cluster_id && $obj['cluster_id'] = $cluster_id;

        return $obj;
    }

    public function withClusterID(int $clusterID): self
    {
        $obj = clone $this;
        $obj['cluster_id'] = $clusterID;

        return $obj;
    }
}
