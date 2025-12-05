<?php

declare(strict_types=1);

namespace Telnyx\Reports\CdrUsageReports;

use Telnyx\Core\Attributes\Api;
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
 *   aggregation_type: AggregationType|value-of<AggregationType>,
 *   product_breakdown: ProductBreakdown|value-of<ProductBreakdown>,
 *   connections?: list<float>,
 *   end_date?: \DateTimeInterface,
 *   start_date?: \DateTimeInterface,
 * }
 */
final class CdrUsageReportFetchSyncParams implements BaseModel
{
    /** @use SdkModel<CdrUsageReportFetchSyncParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<AggregationType> $aggregation_type */
    #[Api(enum: AggregationType::class)]
    public string $aggregation_type;

    /** @var value-of<ProductBreakdown> $product_breakdown */
    #[Api(enum: ProductBreakdown::class)]
    public string $product_breakdown;

    /** @var list<float>|null $connections */
    #[Api(list: 'float', optional: true)]
    public ?array $connections;

    #[Api(optional: true)]
    public ?\DateTimeInterface $end_date;

    #[Api(optional: true)]
    public ?\DateTimeInterface $start_date;

    /**
     * `new CdrUsageReportFetchSyncParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CdrUsageReportFetchSyncParams::with(
     *   aggregation_type: ..., product_breakdown: ...
     * )
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
     * @param AggregationType|value-of<AggregationType> $aggregation_type
     * @param ProductBreakdown|value-of<ProductBreakdown> $product_breakdown
     * @param list<float> $connections
     */
    public static function with(
        AggregationType|string $aggregation_type,
        ProductBreakdown|string $product_breakdown,
        ?array $connections = null,
        ?\DateTimeInterface $end_date = null,
        ?\DateTimeInterface $start_date = null,
    ): self {
        $obj = new self;

        $obj['aggregation_type'] = $aggregation_type;
        $obj['product_breakdown'] = $product_breakdown;

        null !== $connections && $obj['connections'] = $connections;
        null !== $end_date && $obj['end_date'] = $end_date;
        null !== $start_date && $obj['start_date'] = $start_date;

        return $obj;
    }

    /**
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public function withAggregationType(
        AggregationType|string $aggregationType
    ): self {
        $obj = clone $this;
        $obj['aggregation_type'] = $aggregationType;

        return $obj;
    }

    /**
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     */
    public function withProductBreakdown(
        ProductBreakdown|string $productBreakdown
    ): self {
        $obj = clone $this;
        $obj['product_breakdown'] = $productBreakdown;

        return $obj;
    }

    /**
     * @param list<float> $connections
     */
    public function withConnections(array $connections): self
    {
        $obj = clone $this;
        $obj['connections'] = $connections;

        return $obj;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['end_date'] = $endDate;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

        return $obj;
    }
}
