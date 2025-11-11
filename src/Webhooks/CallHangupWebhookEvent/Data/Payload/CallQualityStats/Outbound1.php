<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangupWebhookEvent\Data\Payload\CallQualityStats;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Outbound call quality statistics.
 *
 * @phpstan-type OutboundShape = array{
 *   packet_count?: string|null, skip_packet_count?: string|null
 * }
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    /**
     * Total number of outbound audio packets.
     */
    #[Api(optional: true)]
    public ?string $packet_count;

    /**
     * Number of skipped outbound packets (packet loss).
     */
    #[Api(optional: true)]
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
        ?string $packet_count = null,
        ?string $skip_packet_count = null
    ): self {
        $obj = new self;

        null !== $packet_count && $obj->packet_count = $packet_count;
        null !== $skip_packet_count && $obj->skip_packet_count = $skip_packet_count;

        return $obj;
    }

    /**
     * Total number of outbound audio packets.
     */
    public function withPacketCount(string $packetCount): self
    {
        $obj = clone $this;
        $obj->packet_count = $packetCount;

        return $obj;
    }

    /**
     * Number of skipped outbound packets (packet loss).
     */
    public function withSkipPacketCount(string $skipPacketCount): self
    {
        $obj = clone $this;
        $obj->skip_packet_count = $skipPacketCount;

        return $obj;
    }
}
