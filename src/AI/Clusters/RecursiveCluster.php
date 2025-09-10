<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\AI\Clusters\RecursiveCluster\Node;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type recursive_cluster = array{
 *   clusterID: string,
 *   clusterSummary: string,
 *   totalNumberOfNodes: int,
 *   clusterHeader?: string|null,
 *   nodes?: list<Node>|null,
 *   subclusters?: list<RecursiveCluster>|null,
 * }
 */
final class RecursiveCluster implements BaseModel
{
    /** @use SdkModel<recursive_cluster> */
    use SdkModel;

    #[Api('cluster_id')]
    public string $clusterID;

    #[Api('cluster_summary')]
    public string $clusterSummary;

    #[Api('total_number_of_nodes')]
    public int $totalNumberOfNodes;

    #[Api('cluster_header', optional: true)]
    public ?string $clusterHeader;

    /** @var list<Node>|null $nodes */
    #[Api(list: Node::class, optional: true)]
    public ?array $nodes;

    /** @var list<RecursiveCluster>|null $subclusters */
    #[Api(list: RecursiveCluster::class, optional: true)]
    public ?array $subclusters;

    /**
     * `new RecursiveCluster()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecursiveCluster::with(
     *   clusterID: ..., clusterSummary: ..., totalNumberOfNodes: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecursiveCluster)
     *   ->withClusterID(...)
     *   ->withClusterSummary(...)
     *   ->withTotalNumberOfNodes(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Node> $nodes
     * @param list<RecursiveCluster> $subclusters
     */
    public static function with(
        string $clusterID,
        string $clusterSummary,
        int $totalNumberOfNodes,
        ?string $clusterHeader = null,
        ?array $nodes = null,
        ?array $subclusters = null,
    ): self {
        $obj = new self;

        $obj->clusterID = $clusterID;
        $obj->clusterSummary = $clusterSummary;
        $obj->totalNumberOfNodes = $totalNumberOfNodes;

        null !== $clusterHeader && $obj->clusterHeader = $clusterHeader;
        null !== $nodes && $obj->nodes = $nodes;
        null !== $subclusters && $obj->subclusters = $subclusters;

        return $obj;
    }

    public function withClusterID(string $clusterID): self
    {
        $obj = clone $this;
        $obj->clusterID = $clusterID;

        return $obj;
    }

    public function withClusterSummary(string $clusterSummary): self
    {
        $obj = clone $this;
        $obj->clusterSummary = $clusterSummary;

        return $obj;
    }

    public function withTotalNumberOfNodes(int $totalNumberOfNodes): self
    {
        $obj = clone $this;
        $obj->totalNumberOfNodes = $totalNumberOfNodes;

        return $obj;
    }

    public function withClusterHeader(string $clusterHeader): self
    {
        $obj = clone $this;
        $obj->clusterHeader = $clusterHeader;

        return $obj;
    }

    /**
     * @param list<Node> $nodes
     */
    public function withNodes(array $nodes): self
    {
        $obj = clone $this;
        $obj->nodes = $nodes;

        return $obj;
    }

    /**
     * @param list<RecursiveCluster> $subclusters
     */
    public function withSubclusters(array $subclusters): self
    {
        $obj = clone $this;
        $obj->subclusters = $subclusters;

        return $obj;
    }
}
