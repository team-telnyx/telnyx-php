<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\MeanLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_0;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_100;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_25;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_50;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_75;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_90;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency\_99;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\ProberLocation;

/**
 * @phpstan-type DataShape = array{
 *   global_ip?: GlobalIP|null,
 *   mean_latency?: MeanLatency|null,
 *   percentile_latency?: PercentileLatency|null,
 *   prober_location?: ProberLocation|null,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?GlobalIP $global_ip;

    #[Optional]
    public ?MeanLatency $mean_latency;

    #[Optional]
    public ?PercentileLatency $percentile_latency;

    #[Optional]
    public ?ProberLocation $prober_location;

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
     * @param GlobalIP|array{id?: string|null, ip_address?: string|null} $global_ip
     * @param MeanLatency|array{amount?: float|null, unit?: string|null} $mean_latency
     * @param PercentileLatency|array{
     *   p0?: _0|null,
     *   p100?: _100|null,
     *   p25?: _25|null,
     *   p50?: _50|null,
     *   p75?: _75|null,
     *   p90?: _90|null,
     *   p99?: _99|null,
     * } $percentile_latency
     * @param ProberLocation|array{
     *   id?: string|null, lat?: float|null, lon?: float|null, name?: string|null
     * } $prober_location
     */
    public static function with(
        GlobalIP|array|null $global_ip = null,
        MeanLatency|array|null $mean_latency = null,
        PercentileLatency|array|null $percentile_latency = null,
        ProberLocation|array|null $prober_location = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $obj = new self;

        null !== $global_ip && $obj['global_ip'] = $global_ip;
        null !== $mean_latency && $obj['mean_latency'] = $mean_latency;
        null !== $percentile_latency && $obj['percentile_latency'] = $percentile_latency;
        null !== $prober_location && $obj['prober_location'] = $prober_location;
        null !== $timestamp && $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * @param GlobalIP|array{id?: string|null, ip_address?: string|null} $globalIP
     */
    public function withGlobalIP(GlobalIP|array $globalIP): self
    {
        $obj = clone $this;
        $obj['global_ip'] = $globalIP;

        return $obj;
    }

    /**
     * @param MeanLatency|array{amount?: float|null, unit?: string|null} $meanLatency
     */
    public function withMeanLatency(MeanLatency|array $meanLatency): self
    {
        $obj = clone $this;
        $obj['mean_latency'] = $meanLatency;

        return $obj;
    }

    /**
     * @param PercentileLatency|array{
     *   p0?: _0|null,
     *   p100?: _100|null,
     *   p25?: _25|null,
     *   p50?: _50|null,
     *   p75?: _75|null,
     *   p90?: _90|null,
     *   p99?: _99|null,
     * } $percentileLatency
     */
    public function withPercentileLatency(
        PercentileLatency|array $percentileLatency
    ): self {
        $obj = clone $this;
        $obj['percentile_latency'] = $percentileLatency;

        return $obj;
    }

    /**
     * @param ProberLocation|array{
     *   id?: string|null, lat?: float|null, lon?: float|null, name?: string|null
     * } $proberLocation
     */
    public function withProberLocation(
        ProberLocation|array $proberLocation
    ): self {
        $obj = clone $this;
        $obj['prober_location'] = $proberLocation;

        return $obj;
    }

    /**
     * The timestamp of the metric.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
