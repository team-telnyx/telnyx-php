<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\AI\Clusters\RecursiveCluster\Node;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NodeShape from \Telnyx\AI\Clusters\RecursiveCluster\Node
 *
 * @phpstan-type RecursiveClusterShape = array{
 *   clusterID: string,
 *   clusterSummary: string,
 *   totalNumberOfNodes: int,
 *   clusterHeader?: string|null,
 *   nodes?: list<Node|NodeShape>|null,
 *   subclusters?: list<mixed>|null,
 * }
 */
final class RecursiveCluster implements BaseModel
{
    /** @use SdkModel<RecursiveClusterShape> */
    use SdkModel;

    #[Required('cluster_id')]
    public string $clusterID;

    #[Required('cluster_summary')]
    public string $clusterSummary;

    #[Required('total_number_of_nodes')]
    public int $totalNumberOfNodes;

    #[Optional('cluster_header')]
    public ?string $clusterHeader;

    /** @var list<Node>|null $nodes */
    #[Optional(list: Node::class)]
    public ?array $nodes;

    /** @var list<mixed>|null $subclusters */
    #[Optional(list: RecursiveCluster::class)]
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
     * @param list<Node|NodeShape>|null $nodes
     * @param list<mixed>|null $subclusters
     */
    public static function with(
        string $clusterID,
        string $clusterSummary,
        int $totalNumberOfNodes,
        ?string $clusterHeader = null,
        ?array $nodes = null,
        ?array $subclusters = null,
    ): self {
        $self = new self;

        $self['clusterID'] = $clusterID;
        $self['clusterSummary'] = $clusterSummary;
        $self['totalNumberOfNodes'] = $totalNumberOfNodes;

        null !== $clusterHeader && $self['clusterHeader'] = $clusterHeader;
        null !== $nodes && $self['nodes'] = $nodes;
        null !== $subclusters && $self['subclusters'] = $subclusters;

        return $self;
    }

    public function withClusterID(string $clusterID): self
    {
        $self = clone $this;
        $self['clusterID'] = $clusterID;

        return $self;
    }

    public function withClusterSummary(string $clusterSummary): self
    {
        $self = clone $this;
        $self['clusterSummary'] = $clusterSummary;

        return $self;
    }

    public function withTotalNumberOfNodes(int $totalNumberOfNodes): self
    {
        $self = clone $this;
        $self['totalNumberOfNodes'] = $totalNumberOfNodes;

        return $self;
    }

    public function withClusterHeader(string $clusterHeader): self
    {
        $self = clone $this;
        $self['clusterHeader'] = $clusterHeader;

        return $self;
    }

    /**
     * @param list<Node|NodeShape> $nodes
     */
    public function withNodes(array $nodes): self
    {
        $self = clone $this;
        $self['nodes'] = $nodes;

        return $self;
    }

    /**
     * @param list<mixed> $subclusters
     */
    public function withSubclusters(array $subclusters): self
    {
        $self = clone $this;
        $self['subclusters'] = $subclusters;

        return $self;
    }
}
