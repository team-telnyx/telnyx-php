<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType;

/**
 * Generate and fetch messaging usage report synchronously. This endpoint will both generate and fetch the messaging report over a specified time period. No polling is necessary but the response may take up to a couple of minutes.
 *
 * @see Telnyx\Services\Reports\MdrUsageReportsService::fetchSync()
 *
 * @phpstan-type MdrUsageReportFetchSyncParamsShape = array{
 *   aggregation_type: AggregationType|value-of<AggregationType>,
 *   end_date?: \DateTimeInterface,
 *   profiles?: list<string>,
 *   start_date?: \DateTimeInterface,
 * }
 */
final class MdrUsageReportFetchSyncParams implements BaseModel
{
    /** @use SdkModel<MdrUsageReportFetchSyncParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<AggregationType> $aggregation_type */
    #[Api(enum: AggregationType::class)]
    public string $aggregation_type;

    #[Api(optional: true)]
    public ?\DateTimeInterface $end_date;

    /** @var list<string>|null $profiles */
    #[Api(list: 'string', optional: true)]
    public ?array $profiles;

    #[Api(optional: true)]
    public ?\DateTimeInterface $start_date;

    /**
     * `new MdrUsageReportFetchSyncParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MdrUsageReportFetchSyncParams::with(aggregation_type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MdrUsageReportFetchSyncParams)->withAggregationType(...)
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
     * @param list<string> $profiles
     */
    public static function with(
        AggregationType|string $aggregation_type,
        ?\DateTimeInterface $end_date = null,
        ?array $profiles = null,
        ?\DateTimeInterface $start_date = null,
    ): self {
        $obj = new self;

        $obj['aggregation_type'] = $aggregation_type;

        null !== $end_date && $obj->end_date = $end_date;
        null !== $profiles && $obj->profiles = $profiles;
        null !== $start_date && $obj->start_date = $start_date;

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

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->end_date = $endDate;

        return $obj;
    }

    /**
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
    {
        $obj = clone $this;
        $obj->profiles = $profiles;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->start_date = $startDate;

        return $obj;
    }
}
