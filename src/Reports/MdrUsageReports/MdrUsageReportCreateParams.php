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
    #[Required('aggregation_type', enum: AggregationType::class)]
    public string $aggregationType;

    #[Required('end_date')]
    public \DateTimeInterface $endDate;

    #[Required('start_date')]
    public \DateTimeInterface $startDate;

    #[Optional]
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
        $self = new self;

        $self['aggregationType'] = $aggregationType;
        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;

        null !== $profiles && $self['profiles'] = $profiles;

        return $self;
    }

    /**
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public function withAggregationType(
        AggregationType|string $aggregationType
    ): self {
        $self = clone $this;
        $self['aggregationType'] = $aggregationType;

        return $self;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    public function withProfiles(string $profiles): self
    {
        $self = clone $this;
        $self['profiles'] = $profiles;

        return $self;
    }
}
