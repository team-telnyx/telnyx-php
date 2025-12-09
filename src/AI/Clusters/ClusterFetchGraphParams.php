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
 * @phpstan-type ClusterFetchGraphParamsShape = array{clusterID?: int}
 */
final class ClusterFetchGraphParams implements BaseModel
{
    /** @use SdkModel<ClusterFetchGraphParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
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
        $self = new self;

        null !== $clusterID && $self['clusterID'] = $clusterID;

        return $self;
    }

    public function withClusterID(int $clusterID): self
    {
        $self = clone $this;
        $self['clusterID'] = $clusterID;

        return $self;
    }
}
