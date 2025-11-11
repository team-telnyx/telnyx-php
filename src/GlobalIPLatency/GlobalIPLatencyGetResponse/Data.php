<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\MeanLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency;
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

    #[Api(optional: true)]
    public ?GlobalIP $global_ip;

    #[Api(optional: true)]
    public ?MeanLatency $mean_latency;

    #[Api(optional: true)]
    public ?PercentileLatency $percentile_latency;

    #[Api(optional: true)]
    public ?ProberLocation $prober_location;

    /**
     * The timestamp of the metric.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $timestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?GlobalIP $global_ip = null,
        ?MeanLatency $mean_latency = null,
        ?PercentileLatency $percentile_latency = null,
        ?ProberLocation $prober_location = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $obj = new self;

        null !== $global_ip && $obj->global_ip = $global_ip;
        null !== $mean_latency && $obj->mean_latency = $mean_latency;
        null !== $percentile_latency && $obj->percentile_latency = $percentile_latency;
        null !== $prober_location && $obj->prober_location = $prober_location;
        null !== $timestamp && $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withGlobalIP(GlobalIP $globalIP): self
    {
        $obj = clone $this;
        $obj->global_ip = $globalIP;

        return $obj;
    }

    public function withMeanLatency(MeanLatency $meanLatency): self
    {
        $obj = clone $this;
        $obj->mean_latency = $meanLatency;

        return $obj;
    }

    public function withPercentileLatency(
        PercentileLatency $percentileLatency
    ): self {
        $obj = clone $this;
        $obj->percentile_latency = $percentileLatency;

        return $obj;
    }

    public function withProberLocation(ProberLocation $proberLocation): self
    {
        $obj = clone $this;
        $obj->prober_location = $proberLocation;

        return $obj;
    }

    /**
     * The timestamp of the metric.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }
}
