<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Inbound call quality statistics.
 *
 * @phpstan-type InboundShape = array{
 *   jitterMaxVariance?: string,
 *   jitterPacketCount?: string,
 *   mos?: string,
 *   packetCount?: string,
 *   skipPacketCount?: string,
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    /**
     * Maximum jitter variance for inbound audio.
     */
    #[Api('jitter_max_variance', optional: true)]
    public ?string $jitterMaxVariance;

    /**
     * Number of packets used for jitter calculation on inbound audio.
     */
    #[Api('jitter_packet_count', optional: true)]
    public ?string $jitterPacketCount;

    /**
     * Mean Opinion Score (MOS) for inbound audio quality.
     */
    #[Api(optional: true)]
    public ?string $mos;

    /**
     * Total number of inbound audio packets.
     */
    #[Api('packet_count', optional: true)]
    public ?string $packetCount;

    /**
     * Number of skipped inbound packets (packet loss).
     */
    #[Api('skip_packet_count', optional: true)]
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
        $obj = new self;

        null !== $jitterMaxVariance && $obj->jitterMaxVariance = $jitterMaxVariance;
        null !== $jitterPacketCount && $obj->jitterPacketCount = $jitterPacketCount;
        null !== $mos && $obj->mos = $mos;
        null !== $packetCount && $obj->packetCount = $packetCount;
        null !== $skipPacketCount && $obj->skipPacketCount = $skipPacketCount;

        return $obj;
    }

    /**
     * Maximum jitter variance for inbound audio.
     */
    public function withJitterMaxVariance(string $jitterMaxVariance): self
    {
        $obj = clone $this;
        $obj->jitterMaxVariance = $jitterMaxVariance;

        return $obj;
    }

    /**
     * Number of packets used for jitter calculation on inbound audio.
     */
    public function withJitterPacketCount(string $jitterPacketCount): self
    {
        $obj = clone $this;
        $obj->jitterPacketCount = $jitterPacketCount;

        return $obj;
    }

    /**
     * Mean Opinion Score (MOS) for inbound audio quality.
     */
    public function withMos(string $mos): self
    {
        $obj = clone $this;
        $obj->mos = $mos;

        return $obj;
    }

    /**
     * Total number of inbound audio packets.
     */
    public function withPacketCount(string $packetCount): self
    {
        $obj = clone $this;
        $obj->packetCount = $packetCount;

        return $obj;
    }

    /**
     * Number of skipped inbound packets (packet loss).
     */
    public function withSkipPacketCount(string $skipPacketCount): self
    {
        $obj = clone $this;
        $obj->skipPacketCount = $skipPacketCount;

        return $obj;
    }
}
