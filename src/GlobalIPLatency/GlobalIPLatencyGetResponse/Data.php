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
 * @phpstan-type data_alias = array{
 *   globalIP?: GlobalIP,
 *   meanLatency?: MeanLatency,
 *   percentileLatency?: PercentileLatency,
 *   proberLocation?: ProberLocation,
 *   timestamp?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('global_ip', optional: true)]
    public ?GlobalIP $globalIP;

    #[Api('mean_latency', optional: true)]
    public ?MeanLatency $meanLatency;

    #[Api('percentile_latency', optional: true)]
    public ?PercentileLatency $percentileLatency;

    #[Api('prober_location', optional: true)]
    public ?ProberLocation $proberLocation;

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
        ?GlobalIP $globalIP = null,
        ?MeanLatency $meanLatency = null,
        ?PercentileLatency $percentileLatency = null,
        ?ProberLocation $proberLocation = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $obj = new self;

        null !== $globalIP && $obj->globalIP = $globalIP;
        null !== $meanLatency && $obj->meanLatency = $meanLatency;
        null !== $percentileLatency && $obj->percentileLatency = $percentileLatency;
        null !== $proberLocation && $obj->proberLocation = $proberLocation;
        null !== $timestamp && $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withGlobalIP(GlobalIP $globalIP): self
    {
        $obj = clone $this;
        $obj->globalIP = $globalIP;

        return $obj;
    }

    public function withMeanLatency(MeanLatency $meanLatency): self
    {
        $obj = clone $this;
        $obj->meanLatency = $meanLatency;

        return $obj;
    }

    public function withPercentileLatency(
        PercentileLatency $percentileLatency
    ): self {
        $obj = clone $this;
        $obj->percentileLatency = $percentileLatency;

        return $obj;
    }

    public function withProberLocation(ProberLocation $proberLocation): self
    {
        $obj = clone $this;
        $obj->proberLocation = $proberLocation;

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
