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
 *   endDate?: \DateTimeInterface,
 *   profiles?: list<string>,
 *   startDate?: \DateTimeInterface,
 * }
 */
final class MdrUsageReportFetchSyncParams implements BaseModel
{
    /** @use SdkModel<MdrUsageReportFetchSyncParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<AggregationType> $aggregationType */
    #[Required(enum: AggregationType::class)]
    public string $aggregationType;

    #[Optional]
    public ?\DateTimeInterface $endDate;

    /** @var list<string>|null $profiles */
    #[Optional(list: 'string')]
    public ?array $profiles;

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
     * @param list<string> $profiles
     */
    public static function with(
        AggregationType|string $aggregationType,
        ?\DateTimeInterface $endDate = null,
        ?array $profiles = null,
        ?\DateTimeInterface $startDate = null,
    ): self {
        $obj = new self;

        $obj['aggregationType'] = $aggregationType;

        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $profiles && $obj['profiles'] = $profiles;
        null !== $startDate && $obj['startDate'] = $startDate;

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
        $obj['endDate'] = $endDate;

        return $obj;
    }

    /**
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
    {
        $obj = clone $this;
        $obj['profiles'] = $profiles;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['startDate'] = $startDate;

        return $obj;
    }
}
