<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\AI\Clusters\RecursiveCluster\Node;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecursiveClusterShape = array{
 *   cluster_id: string,
 *   cluster_summary: string,
 *   total_number_of_nodes: int,
 *   cluster_header?: string|null,
 *   nodes?: list<Node>|null,
 *   subclusters?: list<mixed>|null,
 * }
 */
final class RecursiveCluster implements BaseModel
{
    /** @use SdkModel<RecursiveClusterShape> */
    use SdkModel;

    #[Api]
    public string $cluster_id;

    #[Api]
    public string $cluster_summary;

    #[Api]
    public int $total_number_of_nodes;

    #[Api(optional: true)]
    public ?string $cluster_header;

    /** @var list<Node>|null $nodes */
    #[Api(list: Node::class, optional: true)]
    public ?array $nodes;

    /** @var list<mixed>|null $subclusters */
    #[Api(list: RecursiveCluster::class, optional: true)]
    public ?array $subclusters;

    /**
     * `new RecursiveCluster()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecursiveCluster::with(
     *   cluster_id: ..., cluster_summary: ..., total_number_of_nodes: ...
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
     * @param list<Node|array{filename: string, text: string}> $nodes
     * @param list<mixed> $subclusters
     */
    public static function with(
        string $cluster_id,
        string $cluster_summary,
        int $total_number_of_nodes,
        ?string $cluster_header = null,
        ?array $nodes = null,
        ?array $subclusters = null,
    ): self {
        $obj = new self;

        $obj['cluster_id'] = $cluster_id;
        $obj['cluster_summary'] = $cluster_summary;
        $obj['total_number_of_nodes'] = $total_number_of_nodes;

        null !== $cluster_header && $obj['cluster_header'] = $cluster_header;
        null !== $nodes && $obj['nodes'] = $nodes;
        null !== $subclusters && $obj['subclusters'] = $subclusters;

        return $obj;
    }

    public function withClusterID(string $clusterID): self
    {
        $obj = clone $this;
        $obj['cluster_id'] = $clusterID;

        return $obj;
    }

    public function withClusterSummary(string $clusterSummary): self
    {
        $obj = clone $this;
        $obj['cluster_summary'] = $clusterSummary;

        return $obj;
    }

    public function withTotalNumberOfNodes(int $totalNumberOfNodes): self
    {
        $obj = clone $this;
        $obj['total_number_of_nodes'] = $totalNumberOfNodes;

        return $obj;
    }

    public function withClusterHeader(string $clusterHeader): self
    {
        $obj = clone $this;
        $obj['cluster_header'] = $clusterHeader;

        return $obj;
    }

    /**
     * @param list<Node|array{filename: string, text: string}> $nodes
     */
    public function withNodes(array $nodes): self
    {
        $obj = clone $this;
        $obj['nodes'] = $nodes;

        return $obj;
    }

    /**
     * @param list<mixed> $subclusters
     */
    public function withSubclusters(array $subclusters): self
    {
        $obj = clone $this;
        $obj['subclusters'] = $subclusters;

        return $obj;
    }
}
