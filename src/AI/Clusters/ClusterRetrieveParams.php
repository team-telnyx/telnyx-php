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
 * @see Telnyx\AI\Clusters->retrieve
 *
 * @phpstan-type cluster_retrieve_params = array{
 *   showSubclusters?: bool, topNNodes?: int
 * }
 */
final class ClusterRetrieveParams implements BaseModel
{
    /** @use SdkModel<cluster_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether or not to include subclusters and their nodes in the response.
     */
    #[Api(optional: true)]
    public ?bool $showSubclusters;

    /**
     * The number of nodes in the cluster to return in the response. Nodes will be sorted by their centrality within the cluster.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $showSubclusters && $obj->showSubclusters = $showSubclusters;
        null !== $topNNodes && $obj->topNNodes = $topNNodes;

        return $obj;
    }

    /**
     * Whether or not to include subclusters and their nodes in the response.
     */
    public function withShowSubclusters(bool $showSubclusters): self
    {
        $obj = clone $this;
        $obj->showSubclusters = $showSubclusters;

        return $obj;
    }

    /**
     * The number of nodes in the cluster to return in the response. Nodes will be sorted by their centrality within the cluster.
     */
    public function withTopNNodes(int $topNNodes): self
    {
        $obj = clone $this;
        $obj->topNNodes = $topNNodes;

        return $obj;
    }
}
