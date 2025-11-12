<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Fetch a cluster.
 *
 * @see Telnyx\Services\AI\ClustersService::retrieve()
 *
 * @phpstan-type ClusterRetrieveParamsShape = array{
 *   show_subclusters?: bool, top_n_nodes?: int
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
    #[Api(optional: true)]
    public ?bool $show_subclusters;

    /**
     * The number of nodes in the cluster to return in the response. Nodes will be sorted by their centrality within the cluster.
     */
    #[Api(optional: true)]
    public ?int $top_n_nodes;

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
        ?bool $show_subclusters = null,
        ?int $top_n_nodes = null
    ): self {
        $obj = new self;

        null !== $show_subclusters && $obj->show_subclusters = $show_subclusters;
        null !== $top_n_nodes && $obj->top_n_nodes = $top_n_nodes;

        return $obj;
    }

    /**
     * Whether or not to include subclusters and their nodes in the response.
     */
    public function withShowSubclusters(bool $showSubclusters): self
    {
        $obj = clone $this;
        $obj->show_subclusters = $showSubclusters;

        return $obj;
    }

    /**
     * The number of nodes in the cluster to return in the response. Nodes will be sorted by their centrality within the cluster.
     */
    public function withTopNNodes(int $topNNodes): self
    {
        $obj = clone $this;
        $obj->top_n_nodes = $topNNodes;

        return $obj;
    }
}
