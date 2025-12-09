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
     *   p0?: _0|null,
     *   p100?: _100|null,
     *   p25?: _25|null,
     *   p50?: _50|null,
     *   p75?: _75|null,
     *   p90?: _90|null,
     *   p99?: _99|null,
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
        $obj = new self;

        null !== $globalIP && $obj['globalIP'] = $globalIP;
        null !== $meanLatency && $obj['meanLatency'] = $meanLatency;
        null !== $percentileLatency && $obj['percentileLatency'] = $percentileLatency;
        null !== $proberLocation && $obj['proberLocation'] = $proberLocation;
        null !== $timestamp && $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * @param GlobalIP|array{id?: string|null, ipAddress?: string|null} $globalIP
     */
    public function withGlobalIP(GlobalIP|array $globalIP): self
    {
        $obj = clone $this;
        $obj['globalIP'] = $globalIP;

        return $obj;
    }

    /**
     * @param MeanLatency|array{amount?: float|null, unit?: string|null} $meanLatency
     */
    public function withMeanLatency(MeanLatency|array $meanLatency): self
    {
        $obj = clone $this;
        $obj['meanLatency'] = $meanLatency;

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
        $obj['percentileLatency'] = $percentileLatency;

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
        $obj['proberLocation'] = $proberLocation;

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
