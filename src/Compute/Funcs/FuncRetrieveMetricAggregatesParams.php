<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns aggregate request, latency, CPU, memory, and resource-limit metrics for a function over the requested window.
 *
 * @see Telnyx\Services\Compute\FuncsService::retrieveMetricAggregates()
 *
 * @phpstan-type FuncRetrieveMetricAggregatesParamsShape = array{
 *   endTime: \DateTimeInterface,
 *   startTime: \DateTimeInterface,
 *   filterEdgeSite?: string|null,
 *   filterNamespace?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class FuncRetrieveMetricAggregatesParams implements BaseModel
{
    /** @use SdkModel<FuncRetrieveMetricAggregatesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Exclusive window end, UTC ISO 8601 with milliseconds.
     */
    #[Required]
    public \DateTimeInterface $endTime;

    /**
     * Inclusive window start, UTC ISO 8601 with milliseconds.
     */
    #[Required]
    public \DateTimeInterface $startTime;

    /**
     * Edge site filter.
     */
    #[Optional]
    public ?string $filterEdgeSite;

    /**
     * Kubernetes namespace filter.
     */
    #[Optional]
    public ?string $filterNamespace;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * `new FuncRetrieveMetricAggregatesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FuncRetrieveMetricAggregatesParams::with(endTime: ..., startTime: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FuncRetrieveMetricAggregatesParams)->withEndTime(...)->withStartTime(...)
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
     */
    public static function with(
        \DateTimeInterface $endTime,
        \DateTimeInterface $startTime,
        ?string $filterEdgeSite = null,
        ?string $filterNamespace = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        $self['endTime'] = $endTime;
        $self['startTime'] = $startTime;

        null !== $filterEdgeSite && $self['filterEdgeSite'] = $filterEdgeSite;
        null !== $filterNamespace && $self['filterNamespace'] = $filterNamespace;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Exclusive window end, UTC ISO 8601 with milliseconds.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * Inclusive window start, UTC ISO 8601 with milliseconds.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Edge site filter.
     */
    public function withFilterEdgeSite(string $filterEdgeSite): self
    {
        $self = clone $this;
        $self['filterEdgeSite'] = $filterEdgeSite;

        return $self;
    }

    /**
     * Kubernetes namespace filter.
     */
    public function withFilterNamespace(string $filterNamespace): self
    {
        $self = clone $this;
        $self['filterNamespace'] = $filterNamespace;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
