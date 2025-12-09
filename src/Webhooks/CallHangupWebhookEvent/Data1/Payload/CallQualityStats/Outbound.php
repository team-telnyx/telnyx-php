<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data1\Payload\CallQualityStats;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Outbound call quality statistics.
 *
 * @phpstan-type OutboundShape = array{
 *   packetCount?: string|null, skipPacketCount?: string|null
 * }
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    /**
     * Total number of outbound audio packets.
     */
    #[Optional('packet_count')]
    public ?string $packetCount;

    /**
     * Number of skipped outbound packets (packet loss).
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
        ?string $packetCount = null,
        ?string $skipPacketCount = null
    ): self {
        $obj = new self;

        null !== $packetCount && $obj['packetCount'] = $packetCount;
        null !== $skipPacketCount && $obj['skipPacketCount'] = $skipPacketCount;

        return $obj;
    }

    /**
     * Total number of outbound audio packets.
     */
    public function withPacketCount(string $packetCount): self
    {
        $obj = clone $this;
        $obj['packetCount'] = $packetCount;

        return $obj;
    }

    /**
     * Number of skipped outbound packets (packet loss).
     */
    public function withSkipPacketCount(string $skipPacketCount): self
    {
        $obj = clone $this;
        $obj['skipPacketCount'] = $skipPacketCount;

        return $obj;
    }
}
