<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 *   aggregationType: AggregationType|value-of<AggregationType>,
 *   endDate?: \DateTimeInterface|null,
 *   profiles?: list<string>|null,
 *   startDate?: \DateTimeInterface|null,
 * }
 */
final class MdrUsageReportFetchSyncParams implements BaseModel
{
    /** @use SdkModel<MdrUsageReportFetchSyncParamsShape> */
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
     * End of the date range filter (inclusive, ISO 8601).
     */
    #[Optional]
    public ?\DateTimeInterface $endDate;

    /**
     * Filter results by profile.
     *
     * @var list<string>|null $profiles
     */
    #[Optional(list: 'string')]
    public ?array $profiles;

    /**
     * Start of the date range filter (inclusive, ISO 8601).
     */
    #[Optional]
    public ?\DateTimeInterface $startDate;

    /**
     * `new MdrUsageReportFetchSyncParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MdrUsageReportFetchSyncParams::with(aggregationType: ...)
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
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param list<string>|null $profiles
     */
    public static function with(
        AggregationType|string $aggregationType,
        ?\DateTimeInterface $endDate = null,
        ?array $profiles = null,
        ?\DateTimeInterface $startDate = null,
    ): self {
        $self = new self;

        $self['aggregationType'] = $aggregationType;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $profiles && $self['profiles'] = $profiles;
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
     * End of the date range filter (inclusive, ISO 8601).
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Filter results by profile.
     *
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
    {
        $self = clone $this;
        $self['profiles'] = $profiles;

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
