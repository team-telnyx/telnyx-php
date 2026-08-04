<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventGetStatsResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventGetStatsResponse\Data\Counts;
use Telnyx\EmailEvents\EmailEventGetStatsResponse\Data\Rates;
use Telnyx\EmailEvents\EmailEventGetStatsResponse\Data\RecordType;
use Telnyx\EmailEvents\TimeRange;

/**
 * @phpstan-import-type CountsShape from \Telnyx\EmailEvents\EmailEventGetStatsResponse\Data\Counts
 * @phpstan-import-type RatesShape from \Telnyx\EmailEvents\EmailEventGetStatsResponse\Data\Rates
 * @phpstan-import-type TimeRangeShape from \Telnyx\EmailEvents\TimeRange
 *
 * @phpstan-type DataShape = array{
 *   counts: Counts|CountsShape,
 *   rates: Rates|RatesShape,
 *   recordType: RecordType|value-of<RecordType>,
 *   timeRange: TimeRange|TimeRangeShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Recipient-level outcome counts for the queried time range. Each to, cc, and bcc recipient counts separately; repeated events of the same type for the same message and recipient count once. Partial MTA injection results count successful recipients as sent and unsuccessful recipients as failed. Only the ten listed event types are counted; other valid event types (scheduled, cancelled, sandbox, sending, rejected) are not included in stats.
     */
    #[Required]
    public Counts $counts;

    /**
     * Recipient-level event rates as percentages, rounded to 2 decimal places.
     */
    #[Required]
    public Rates $rates;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    #[Required('time_range')]
    public TimeRange $timeRange;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(counts: ..., rates: ..., recordType: ..., timeRange: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withCounts(...)
     *   ->withRates(...)
     *   ->withRecordType(...)
     *   ->withTimeRange(...)
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
     * @param Counts|CountsShape $counts
     * @param Rates|RatesShape $rates
     * @param RecordType|value-of<RecordType> $recordType
     * @param TimeRange|TimeRangeShape $timeRange
     */
    public static function with(
        Counts|array $counts,
        Rates|array $rates,
        RecordType|string $recordType,
        TimeRange|array $timeRange,
    ): self {
        $self = new self;

        $self['counts'] = $counts;
        $self['rates'] = $rates;
        $self['recordType'] = $recordType;
        $self['timeRange'] = $timeRange;

        return $self;
    }

    /**
     * Recipient-level outcome counts for the queried time range. Each to, cc, and bcc recipient counts separately; repeated events of the same type for the same message and recipient count once. Partial MTA injection results count successful recipients as sent and unsuccessful recipients as failed. Only the ten listed event types are counted; other valid event types (scheduled, cancelled, sandbox, sending, rejected) are not included in stats.
     *
     * @param Counts|CountsShape $counts
     */
    public function withCounts(Counts|array $counts): self
    {
        $self = clone $this;
        $self['counts'] = $counts;

        return $self;
    }

    /**
     * Recipient-level event rates as percentages, rounded to 2 decimal places.
     *
     * @param Rates|RatesShape $rates
     */
    public function withRates(Rates|array $rates): self
    {
        $self = clone $this;
        $self['rates'] = $rates;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param TimeRange|TimeRangeShape $timeRange
     */
    public function withTimeRange(TimeRange|array $timeRange): self
    {
        $self = clone $this;
        $self['timeRange'] = $timeRange;

        return $self;
    }
}
