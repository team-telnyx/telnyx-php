<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;

/**
 * Submit request for new new messaging usage report. This endpoint will pull and aggregate messaging data in specified time period.
 *
 * @see Telnyx\Reports\MdrUsageReports->create
 *
 * @phpstan-type MdrUsageReportCreateParamsShape = array{
 *   aggregationType: AggregationType|value-of<AggregationType>,
 *   endDate: \DateTimeInterface,
 *   startDate: \DateTimeInterface,
 *   profiles?: string,
 * }
 */
final class MdrUsageReportCreateParams implements BaseModel
{
    /** @use SdkModel<MdrUsageReportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<AggregationType> $aggregationType */
    #[Api('aggregation_type', enum: AggregationType::class)]
    public string $aggregationType;

    #[Api('end_date')]
    public \DateTimeInterface $endDate;

    #[Api('start_date')]
    public \DateTimeInterface $startDate;

    #[Api(optional: true)]
    public ?string $profiles;

    /**
     * `new MdrUsageReportCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MdrUsageReportCreateParams::with(
     *   aggregationType: ..., endDate: ..., startDate: ...
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
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public static function with(
        AggregationType|string $aggregationType,
        \DateTimeInterface $endDate,
        \DateTimeInterface $startDate,
        ?string $profiles = null,
    ): self {
        $obj = new self;

        $obj['aggregationType'] = $aggregationType;
        $obj->endDate = $endDate;
        $obj->startDate = $startDate;

        null !== $profiles && $obj->profiles = $profiles;

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

    public function withProfiles(string $profiles): self
    {
        $obj = clone $this;
        $obj->profiles = $profiles;

        return $obj;
    }
}
