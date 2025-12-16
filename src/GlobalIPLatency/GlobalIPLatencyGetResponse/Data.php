<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\MeanLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\ProberLocation;

/**
 * @phpstan-import-type GlobalIPShape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\GlobalIP
 * @phpstan-import-type MeanLatencyShape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\MeanLatency
 * @phpstan-import-type PercentileLatencyShape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\PercentileLatency
 * @phpstan-import-type ProberLocationShape from \Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data\ProberLocation
 *
 * @phpstan-type DataShape = array{
 *   globalIP?: null|GlobalIP|GlobalIPShape,
 *   meanLatency?: null|MeanLatency|MeanLatencyShape,
 *   percentileLatency?: null|PercentileLatency|PercentileLatencyShape,
 *   proberLocation?: null|ProberLocation|ProberLocationShape,
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
     * @param GlobalIPShape $globalIP
     * @param MeanLatencyShape $meanLatency
     * @param PercentileLatencyShape $percentileLatency
     * @param ProberLocationShape $proberLocation
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
     * @param GlobalIPShape $globalIP
     */
    public function withGlobalIP(GlobalIP|array $globalIP): self
    {
        $self = clone $this;
        $self['globalIP'] = $globalIP;

        return $self;
    }

    /**
     * @param MeanLatencyShape $meanLatency
     */
    public function withMeanLatency(MeanLatency|array $meanLatency): self
    {
        $self = clone $this;
        $self['meanLatency'] = $meanLatency;

        return $self;
    }

    /**
     * @param PercentileLatencyShape $percentileLatency
     */
    public function withPercentileLatency(
        PercentileLatency|array $percentileLatency
    ): self {
        $self = clone $this;
        $self['percentileLatency'] = $percentileLatency;

        return $self;
    }

    /**
     * @param ProberLocationShape $proberLocation
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
