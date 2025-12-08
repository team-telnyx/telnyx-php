<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Inbound call quality statistics.
 *
 * @phpstan-type InboundShape = array{
 *   jitter_max_variance?: string|null,
 *   jitter_packet_count?: string|null,
 *   mos?: string|null,
 *   packet_count?: string|null,
 *   skip_packet_count?: string|null,
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    /**
     * Maximum jitter variance for inbound audio.
     */
    #[Optional]
    public ?string $jitter_max_variance;

    /**
     * Number of packets used for jitter calculation on inbound audio.
     */
    #[Optional]
    public ?string $jitter_packet_count;

    /**
     * Mean Opinion Score (MOS) for inbound audio quality.
     */
    #[Optional]
    public ?string $mos;

    /**
     * Total number of inbound audio packets.
     */
    #[Optional]
    public ?string $packet_count;

    /**
     * Number of skipped inbound packets (packet loss).
     */
    #[Optional]
    public ?string $skip_packet_count;

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
        ?string $jitter_max_variance = null,
        ?string $jitter_packet_count = null,
        ?string $mos = null,
        ?string $packet_count = null,
        ?string $skip_packet_count = null,
    ): self {
        $obj = new self;

        null !== $jitter_max_variance && $obj['jitter_max_variance'] = $jitter_max_variance;
        null !== $jitter_packet_count && $obj['jitter_packet_count'] = $jitter_packet_count;
        null !== $mos && $obj['mos'] = $mos;
        null !== $packet_count && $obj['packet_count'] = $packet_count;
        null !== $skip_packet_count && $obj['skip_packet_count'] = $skip_packet_count;

        return $obj;
    }

    /**
     * Maximum jitter variance for inbound audio.
     */
    public function withJitterMaxVariance(string $jitterMaxVariance): self
    {
        $obj = clone $this;
        $obj['jitter_max_variance'] = $jitterMaxVariance;

        return $obj;
    }

    /**
     * Number of packets used for jitter calculation on inbound audio.
     */
    public function withJitterPacketCount(string $jitterPacketCount): self
    {
        $obj = clone $this;
        $obj['jitter_packet_count'] = $jitterPacketCount;

        return $obj;
    }

    /**
     * Mean Opinion Score (MOS) for inbound audio quality.
     */
    public function withMos(string $mos): self
    {
        $obj = clone $this;
        $obj['mos'] = $mos;

        return $obj;
    }

    /**
     * Total number of inbound audio packets.
     */
    public function withPacketCount(string $packetCount): self
    {
        $obj = clone $this;
        $obj['packet_count'] = $packetCount;

        return $obj;
    }

    /**
     * Number of skipped inbound packets (packet loss).
     */
    public function withSkipPacketCount(string $skipPacketCount): self
    {
        $obj = clone $this;
        $obj['skip_packet_count'] = $skipPacketCount;

        return $obj;
    }
}
