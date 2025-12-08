<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;

/**
 * Submit request for new new messaging usage report. This endpoint will pull and aggregate messaging data in specified time period.
 *
 * @see Telnyx\Services\Reports\MdrUsageReportsService::create()
 *
 * @phpstan-type MdrUsageReportCreateParamsShape = array{
 *   aggregation_type: AggregationType|value-of<AggregationType>,
 *   end_date: \DateTimeInterface,
 *   start_date: \DateTimeInterface,
 *   profiles?: string,
 * }
 */
final class MdrUsageReportCreateParams implements BaseModel
{
    /** @use SdkModel<MdrUsageReportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<AggregationType> $aggregation_type */
    #[Required(enum: AggregationType::class)]
    public string $aggregation_type;

    #[Required]
    public \DateTimeInterface $end_date;

    #[Required]
    public \DateTimeInterface $start_date;

    #[Optional]
    public ?string $profiles;

    /**
     * `new MdrUsageReportCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MdrUsageReportCreateParams::with(
     *   aggregation_type: ..., end_date: ..., start_date: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MdrUsageReportCreateParams)
     *   ->withAggregationType(...)
     *   ->withEndDate(...)
     *   ->withStartDate(...)
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
     */
    public static function with(
        AggregationType|string $aggregation_type,
        \DateTimeInterface $end_date,
        \DateTimeInterface $start_date,
        ?string $profiles = null,
    ): self {
        $obj = new self;

        $obj['aggregation_type'] = $aggregation_type;
        $obj['end_date'] = $end_date;
        $obj['start_date'] = $start_date;

        null !== $profiles && $obj['profiles'] = $profiles;

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
        $obj['end_date'] = $endDate;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

        return $obj;
    }

    public function withProfiles(string $profiles): self
    {
        $obj = clone $this;
        $obj['profiles'] = $profiles;

        return $obj;
    }
}
