<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Fetch a cluster.
 *
 * @see Telnyx\Services\AI\ClustersService::retrieve()
 *
 * @phpstan-type ClusterRetrieveParamsShape = array{
 *   showSubclusters?: bool|null, topNNodes?: int|null
 * }
 */
final class ClusterRetrieveParams implements BaseModel
{
    /** @use SdkModel<ClusterRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether or not to include subclusters and their nodes in the response.
     */
    #[Optional]
    public ?bool $showSubclusters;

    /**
     * The number of nodes in the cluster to return in the response. Nodes will be sorted by their centrality within the cluster.
     */
    #[Optional]
    public ?int $topNNodes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $showSubclusters = null,
        ?int $topNNodes = null
    ): self {
        $self = new self;

        null !== $showSubclusters && $self['showSubclusters'] = $showSubclusters;
        null !== $topNNodes && $self['topNNodes'] = $topNNodes;

        return $self;
    }

    /**
     * Whether or not to include subclusters and their nodes in the response.
     */
    public function withShowSubclusters(bool $showSubclusters): self
    {
        $self = clone $this;
        $self['showSubclusters'] = $showSubclusters;

        return $self;
    }

    /**
     * The number of nodes in the cluster to return in the response. Nodes will be sorted by their centrality within the cluster.
     */
    public function withTopNNodes(int $topNNodes): self
    {
        $self = clone $this;
        $self['topNNodes'] = $topNNodes;

        return $self;
    }
}
