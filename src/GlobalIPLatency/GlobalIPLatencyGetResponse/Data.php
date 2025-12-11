<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\MeanLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P0;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P100;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P25;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P50;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P75;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P90;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\P99;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\ProberLocation;

/**
 * @phpstan-type DataShape = array{
 *   globalIP?: GlobalIP|null,
 *   meanLatency?: MeanLatency|null,
 *   percentileLatency?: PercentileLatency|null,
 *   proberLocation?: ProberLocation|null,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('global_ip')]
    public ?GlobalIP $globalIP;

    #[Optional('mean_latency')]
    public ?MeanLatency $meanLatency;

    #[Optional('percentile_latency')]
    public ?PercentileLatency $percentileLatency;

    #[Optional('prober_location')]
    public ?ProberLocation $proberLocation;

    /**
     * The timestamp of the metric.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GlobalIP|array{id?: string|null, ipAddress?: string|null} $globalIP
     * @param MeanLatency|array{amount?: float|null, unit?: string|null} $meanLatency
     * @param PercentileLatency|array{
     *   p0?: P0|null,
     *   p100?: P100|null,
     *   p25?: P25|null,
     *   p50?: P50|null,
     *   p75?: P75|null,
     *   p90?: P90|null,
     *   p99?: P99|null,
     * } $percentileLatency
     * @param ProberLocation|array{
     *   id?: string|null, lat?: float|null, lon?: float|null, name?: string|null
     * } $proberLocation
     */
    public static function with(
        GlobalIP|array|null $globalIP = null,
        MeanLatency|array|null $meanLatency = null,
        PercentileLatency|array|null $percentileLatency = null,
        ProberLocation|array|null $proberLocation = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $self = new self;

        null !== $globalIP && $self['globalIP'] = $globalIP;
        null !== $meanLatency && $self['meanLatency'] = $meanLatency;
        null !== $percentileLatency && $self['percentileLatency'] = $percentileLatency;
        null !== $proberLocation && $self['proberLocation'] = $proberLocation;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * @param GlobalIP|array{id?: string|null, ipAddress?: string|null} $globalIP
     */
    public function withGlobalIP(GlobalIP|array $globalIP): self
    {
        $self = clone $this;
        $self['globalIP'] = $globalIP;

        return $self;
    }

    /**
     * @param MeanLatency|array{amount?: float|null, unit?: string|null} $meanLatency
     */
    public function withMeanLatency(MeanLatency|array $meanLatency): self
    {
        $self = clone $this;
        $self['meanLatency'] = $meanLatency;

        return $self;
    }

    /**
     * @param PercentileLatency|array{
     *   p0?: P0|null,
     *   p100?: P100|null,
     *   p25?: P25|null,
     *   p50?: P50|null,
     *   p75?: P75|null,
     *   p90?: P90|null,
     *   p99?: P99|null,
     * } $percentileLatency
     */
    public function withPercentileLatency(
        PercentileLatency|array $percentileLatency
    ): self {
        $self = clone $this;
        $self['percentileLatency'] = $percentileLatency;

        return $self;
    }

    /**
     * @param ProberLocation|array{
     *   id?: string|null, lat?: float|null, lon?: float|null, name?: string|null
     * } $proberLocation
     */
    public function withProberLocation(
        ProberLocation|array $proberLocation
    ): self {
        $self = clone $this;
        $self['proberLocation'] = $proberLocation;

        return $self;
    }

    /**
     * The timestamp of the metric.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
