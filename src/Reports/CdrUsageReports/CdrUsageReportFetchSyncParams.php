<?php

declare(strict_types=1);

namespace Telnyx\Reports\CdrUsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\ProductBreakdown;

/**
 * Generate and fetch voice usage report synchronously. This endpoint will both generate and fetch the voice report over a specified time period. No polling is necessary but the response may take up to a couple of minutes.
 *
 * @see Telnyx\Services\Reports\CdrUsageReportsService::fetchSync()
 *
 * @phpstan-type CdrUsageReportFetchSyncParamsShape = array{
 *   aggregationType: AggregationType|value-of<AggregationType>,
 *   productBreakdown: ProductBreakdown|value-of<ProductBreakdown>,
 *   connections?: list<float>|null,
 *   endDate?: \DateTimeInterface|null,
 *   startDate?: \DateTimeInterface|null,
 * }
 */
final class CdrUsageReportFetchSyncParams implements BaseModel
{
    /** @use SdkModel<CdrUsageReportFetchSyncParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Type of aggregation to apply to the results.
     *
     * @var value-of<AggregationType> $aggregationType
     */
    #[Required(enum: AggregationType::class)]
    public string $aggregationType;

    /**
     * Filter results by product breakdown.
     *
     * @var value-of<ProductBreakdown> $productBreakdown
     */
    #[Required(enum: ProductBreakdown::class)]
    public string $productBreakdown;

    /**
     * Filter results by connection.
     *
     * @var list<float>|null $connections
     */
    #[Optional(list: 'float')]
    public ?array $connections;

    /**
     * End of the date range filter (inclusive, ISO 8601).
     */
    #[Optional]
    public ?\DateTimeInterface $endDate;

    /**
     * Start of the date range filter (inclusive, ISO 8601).
     */
    #[Optional]
    public ?\DateTimeInterface $startDate;

    /**
     * `new CdrUsageReportFetchSyncParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CdrUsageReportFetchSyncParams::with(aggregationType: ..., productBreakdown: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CdrUsageReportFetchSyncParams)
     *   ->withAggregationType(...)
     *   ->withProductBreakdown(...)
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
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     * @param list<float>|null $connections
     */
    public static function with(
        AggregationType|string $aggregationType,
        ProductBreakdown|string $productBreakdown,
        ?array $connections = null,
        ?\DateTimeInterface $endDate = null,
        ?\DateTimeInterface $startDate = null,
    ): self {
        $self = new self;

        $self['aggregationType'] = $aggregationType;
        $self['productBreakdown'] = $productBreakdown;

        null !== $connections && $self['connections'] = $connections;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Type of aggregation to apply to the results.
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public function withAggregationType(
        AggregationType|string $aggregationType
    ): self {
        $self = clone $this;
        $self['aggregationType'] = $aggregationType;

        return $self;
    }

    /**
     * Filter results by product breakdown.
     *
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     */
    public function withProductBreakdown(
        ProductBreakdown|string $productBreakdown
    ): self {
        $self = clone $this;
        $self['productBreakdown'] = $productBreakdown;

        return $self;
    }

    /**
     * Filter results by connection.
     *
     * @param list<float> $connections
     */
    public function withConnections(array $connections): self
    {
        $self = clone $this;
        $self['connections'] = $connections;

        return $self;
    }

    /**
     * End of the date range filter (inclusive, ISO 8601).
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Start of the date range filter (inclusive, ISO 8601).
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
