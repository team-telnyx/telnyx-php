<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data1\Payload\CallQualityStats;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Inbound call quality statistics.
 *
 * @phpstan-type InboundShape = array{
 *   jitterMaxVariance?: string|null,
 *   jitterPacketCount?: string|null,
 *   mos?: string|null,
 *   packetCount?: string|null,
 *   skipPacketCount?: string|null,
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    /**
     * Maximum jitter variance for inbound audio.
     */
    #[Optional('jitter_max_variance')]
    public ?string $jitterMaxVariance;

    /**
     * Number of packets used for jitter calculation on inbound audio.
     */
    #[Optional('jitter_packet_count')]
    public ?string $jitterPacketCount;

    /**
     * Mean Opinion Score (MOS) for inbound audio quality.
     */
    #[Optional]
    public ?string $mos;

    /**
     * Total number of inbound audio packets.
     */
    #[Optional('packet_count')]
    public ?string $packetCount;

    /**
     * Number of skipped inbound packets (packet loss).
     */
    #[Optional('skip_packet_count')]
    public ?string $skipPacketCount;

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
        ?string $jitterMaxVariance = null,
        ?string $jitterPacketCount = null,
        ?string $mos = null,
        ?string $packetCount = null,
        ?string $skipPacketCount = null,
    ): self {
        $self = new self;

        null !== $jitterMaxVariance && $self['jitterMaxVariance'] = $jitterMaxVariance;
        null !== $jitterPacketCount && $self['jitterPacketCount'] = $jitterPacketCount;
        null !== $mos && $self['mos'] = $mos;
        null !== $packetCount && $self['packetCount'] = $packetCount;
        null !== $skipPacketCount && $self['skipPacketCount'] = $skipPacketCount;

        return $self;
    }

    /**
     * Maximum jitter variance for inbound audio.
     */
    public function withJitterMaxVariance(string $jitterMaxVariance): self
    {
        $self = clone $this;
        $self['jitterMaxVariance'] = $jitterMaxVariance;

        return $self;
    }

    /**
     * Number of packets used for jitter calculation on inbound audio.
     */
    public function withJitterPacketCount(string $jitterPacketCount): self
    {
        $self = clone $this;
        $self['jitterPacketCount'] = $jitterPacketCount;

        return $self;
    }

    /**
     * Mean Opinion Score (MOS) for inbound audio quality.
     */
    public function withMos(string $mos): self
    {
        $self = clone $this;
        $self['mos'] = $mos;

        return $self;
    }

    /**
     * Total number of inbound audio packets.
     */
    public function withPacketCount(string $packetCount): self
    {
        $self = clone $this;
        $self['packetCount'] = $packetCount;

        return $self;
    }

    /**
     * Number of skipped inbound packets (packet loss).
     */
    public function withSkipPacketCount(string $skipPacketCount): self
    {
        $self = clone $this;
        $self['skipPacketCount'] = $skipPacketCount;

        return $self;
    }
}
