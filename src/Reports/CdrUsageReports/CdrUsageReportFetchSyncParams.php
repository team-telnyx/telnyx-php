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
 * @see Telnyx\Reports\CdrUsageReports->fetchSync
 *
 * @phpstan-type CdrUsageReportFetchSyncParamsShape = array{
 *   aggregationType: AggregationType|value-of<AggregationType>,
 *   productBreakdown: ProductBreakdown|value-of<ProductBreakdown>,
 *   connections?: list<float>,
 *   endDate?: \DateTimeInterface,
 *   startDate?: \DateTimeInterface,
 * }
 */
final class CdrUsageReportFetchSyncParams implements BaseModel
{
    /** @use SdkModel<CdrUsageReportFetchSyncParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<AggregationType> $aggregationType */
    #[Api(enum: AggregationType::class)]
    public string $aggregationType;

    /** @var value-of<ProductBreakdown> $productBreakdown */
    #[Api(enum: ProductBreakdown::class)]
    public string $productBreakdown;

    /** @var list<float>|null $connections */
    #[Api(list: 'float', optional: true)]
    public ?array $connections;

    #[Api(optional: true)]
    public ?\DateTimeInterface $endDate;

    #[Api(optional: true)]
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
     * @param list<float> $connections
     */
    public static function with(
        AggregationType|string $aggregationType,
        ProductBreakdown|string $productBreakdown,
        ?array $connections = null,
        ?\DateTimeInterface $endDate = null,
        ?\DateTimeInterface $startDate = null,
    ): self {
        $obj = new self;

        $obj['aggregationType'] = $aggregationType;
        $obj['productBreakdown'] = $productBreakdown;

        null !== $connections && $obj->connections = $connections;
        null !== $endDate && $obj->endDate = $endDate;
        null !== $startDate && $obj->startDate = $startDate;

        return $obj;
    }

    /**
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public function withAggregationType(
        AggregationType|string $aggregationType
    ): self {
        $obj = clone $this;
        $obj['aggregationType'] = $aggregationType;

        return $obj;
    }

    /**
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     */
    public function withProductBreakdown(
        ProductBreakdown|string $productBreakdown
    ): self {
        $obj = clone $this;
        $obj['productBreakdown'] = $productBreakdown;

        return $obj;
    }

    /**
     * @param list<float> $connections
     */
    public function withConnections(array $connections): self
    {
        $obj = clone $this;
        $obj->connections = $connections;

        return $obj;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }
}
