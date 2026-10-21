<?php

declare(strict_types=1);

namespace Telnyx\DialMetrics;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\DialMetrics\DialMetricListResponse\Dials;
use Telnyx\DialMetrics\DialMetricListResponse\RecordType;

/**
 * Dial counts and rates for one region in one time bucket. One record per region per bucket.
 *
 * @phpstan-import-type DialsShape from \Telnyx\DialMetrics\DialMetricListResponse\Dials
 *
 * @phpstan-type DialMetricListResponseShape = array{
 *   averageDps?: float|null,
 *   dials?: null|Dials|DialsShape,
 *   dpsLimit?: int|null,
 *   endTime?: \DateTimeInterface|null,
 *   peakDps?: float|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   region?: string|null,
 *   startTime?: \DateTimeInterface|null,
 * }
 */
final class DialMetricListResponse implements BaseModel
{
    /** @use SdkModel<DialMetricListResponseShape> */
    use SdkModel;

    /**
     * `dials.total` divided by the bucket duration in seconds, rounded to 4 decimal places. Counts every dial attempt, rejected ones included.
     */
    #[Optional('average_dps')]
    public ?float $averageDps;

    /**
     * Dial attempt counts in the bucket.
     */
    #[Optional]
    public ?Dials $dials;

    /**
     * DPS limit in force during the busiest 5-second window, so it compares directly with `peak_dps`. `null` means unlimited. Enforcement near the limit is approximate; `dials.rejected.dps_limit` is the authoritative signal that the limit was reached.
     */
    #[Optional('dps_limit', nullable: true)]
    public ?int $dpsLimit;

    /**
     * End of the bucket (exclusive), UTC. Five seconds, one minute or one hour after `start_time`, depending on `granularity`.
     */
    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    /**
     * Dials per second, rounded to 4 decimal places, in the busiest 5-second window of the bucket, summed across all call-processing nodes of the region. Counts every dial attempt, rejected ones included, so `peak_dps` above `dps_limit` is expected when dials were rejected. For `granularity=second` it equals `average_dps`.
     */
    #[Optional('peak_dps')]
    public ?float $peakDps;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * Region where the dials were handled. Current values are `us`, `eu`, `australia`, `middle_east`, `canada` and `india`. New values can be added, so clients must tolerate values not listed here. Buckets of different regions are separate records.
     */
    #[Optional]
    public ?string $region;

    /**
     * Start of the bucket (inclusive), UTC.
     */
    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Dials|DialsShape|null $dials
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        int|Omitted|null $dpsLimit = Omitted::VALUE,
        ?float $averageDps = null,
        Dials|array|null $dials = null,
        ?\DateTimeInterface $endTime = null,
        ?float $peakDps = null,
        RecordType|string|null $recordType = null,
        ?string $region = null,
        ?\DateTimeInterface $startTime = null,
    ): self {
        $self = new self;

        null !== $averageDps && $self['averageDps'] = $averageDps;
        null !== $dials && $self['dials'] = $dials;
        Omitted::VALUE !== $dpsLimit && $self['dpsLimit'] = $dpsLimit;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $peakDps && $self['peakDps'] = $peakDps;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $region && $self['region'] = $region;
        null !== $startTime && $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * `dials.total` divided by the bucket duration in seconds, rounded to 4 decimal places. Counts every dial attempt, rejected ones included.
     */
    public function withAverageDps(float $averageDps): self
    {
        $self = clone $this;
        $self['averageDps'] = $averageDps;

        return $self;
    }

    /**
     * Dial attempt counts in the bucket.
     *
     * @param Dials|DialsShape $dials
     */
    public function withDials(Dials|array $dials): self
    {
        $self = clone $this;
        $self['dials'] = $dials;

        return $self;
    }

    /**
     * DPS limit in force during the busiest 5-second window, so it compares directly with `peak_dps`. `null` means unlimited. Enforcement near the limit is approximate; `dials.rejected.dps_limit` is the authoritative signal that the limit was reached.
     */
    public function withDpsLimit(?int $dpsLimit): self
    {
        $self = clone $this;
        $self['dpsLimit'] = $dpsLimit;

        return $self;
    }

    /**
     * End of the bucket (exclusive), UTC. Five seconds, one minute or one hour after `start_time`, depending on `granularity`.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * Dials per second, rounded to 4 decimal places, in the busiest 5-second window of the bucket, summed across all call-processing nodes of the region. Counts every dial attempt, rejected ones included, so `peak_dps` above `dps_limit` is expected when dials were rejected. For `granularity=second` it equals `average_dps`.
     */
    public function withPeakDps(float $peakDps): self
    {
        $self = clone $this;
        $self['peakDps'] = $peakDps;

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
     * Region where the dials were handled. Current values are `us`, `eu`, `australia`, `middle_east`, `canada` and `india`. New values can be added, so clients must tolerate values not listed here. Buckets of different regions are separate records.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Start of the bucket (inclusive), UTC.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
