<?php

declare(strict_types=1);

namespace Telnyx\Compute\ComputeGetResponse\Data;

use Telnyx\Compute\ComputeGetResponse\Data\Placement\ClusterResult;
use Telnyx\Compute\ComputeGetResponse\Data\Placement\Policy;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Last deployment fan-out report, not a live probe. Omitted on actor types without a placement-aware deployment.
 *
 * @phpstan-import-type ClusterResultShape from \Telnyx\Compute\ComputeGetResponse\Data\Placement\ClusterResult
 *
 * @phpstan-type PlacementShape = array{
 *   clusterResults?: list<ClusterResult|ClusterResultShape>|null,
 *   clusters?: list<string>|null,
 *   excludedClusters?: list<string>|null,
 *   observedAt?: string|null,
 *   partial?: bool|null,
 *   policy?: null|Policy|value-of<Policy>,
 *   uncheckedClusters?: list<string>|null,
 * }
 */
final class Placement implements BaseModel
{
    /** @use SdkModel<PlacementShape> */
    use SdkModel;

    /** @var list<ClusterResult>|null $clusterResults */
    #[Optional('cluster_results', list: ClusterResult::class)]
    public ?array $clusterResults;

    /**
     * Public regions with successful deployment.
     *
     * @var list<string>|null $clusters
     */
    #[Optional(list: 'string')]
    public ?array $clusters;

    /** @var list<string>|null $excludedClusters */
    #[Optional('excluded_clusters', list: 'string')]
    public ?array $excludedClusters;

    /**
     * Optional ISO-8601 millisecond timestamp.
     */
    #[Optional('observed_at')]
    public ?string $observedAt;

    #[Optional]
    public ?bool $partial;

    /** @var value-of<Policy>|null $policy */
    #[Optional(enum: Policy::class)]
    public ?string $policy;

    /** @var list<string>|null $uncheckedClusters */
    #[Optional('unchecked_clusters', list: 'string')]
    public ?array $uncheckedClusters;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ClusterResult|ClusterResultShape>|null $clusterResults
     * @param list<string>|null $clusters
     * @param list<string>|null $excludedClusters
     * @param Policy|value-of<Policy>|null $policy
     * @param list<string>|null $uncheckedClusters
     */
    public static function with(
        ?array $clusterResults = null,
        ?array $clusters = null,
        ?array $excludedClusters = null,
        ?string $observedAt = null,
        ?bool $partial = null,
        Policy|string|null $policy = null,
        ?array $uncheckedClusters = null,
    ): self {
        $self = new self;

        null !== $clusterResults && $self['clusterResults'] = $clusterResults;
        null !== $clusters && $self['clusters'] = $clusters;
        null !== $excludedClusters && $self['excludedClusters'] = $excludedClusters;
        null !== $observedAt && $self['observedAt'] = $observedAt;
        null !== $partial && $self['partial'] = $partial;
        null !== $policy && $self['policy'] = $policy;
        null !== $uncheckedClusters && $self['uncheckedClusters'] = $uncheckedClusters;

        return $self;
    }

    /**
     * @param list<ClusterResult|ClusterResultShape> $clusterResults
     */
    public function withClusterResults(array $clusterResults): self
    {
        $self = clone $this;
        $self['clusterResults'] = $clusterResults;

        return $self;
    }

    /**
     * Public regions with successful deployment.
     *
     * @param list<string> $clusters
     */
    public function withClusters(array $clusters): self
    {
        $self = clone $this;
        $self['clusters'] = $clusters;

        return $self;
    }

    /**
     * @param list<string> $excludedClusters
     */
    public function withExcludedClusters(array $excludedClusters): self
    {
        $self = clone $this;
        $self['excludedClusters'] = $excludedClusters;

        return $self;
    }

    /**
     * Optional ISO-8601 millisecond timestamp.
     */
    public function withObservedAt(string $observedAt): self
    {
        $self = clone $this;
        $self['observedAt'] = $observedAt;

        return $self;
    }

    public function withPartial(bool $partial): self
    {
        $self = clone $this;
        $self['partial'] = $partial;

        return $self;
    }

    /**
     * @param Policy|value-of<Policy> $policy
     */
    public function withPolicy(Policy|string $policy): self
    {
        $self = clone $this;
        $self['policy'] = $policy;

        return $self;
    }

    /**
     * @param list<string> $uncheckedClusters
     */
    public function withUncheckedClusters(array $uncheckedClusters): self
    {
        $self = clone $this;
        $self['uncheckedClusters'] = $uncheckedClusters;

        return $self;
    }
}
