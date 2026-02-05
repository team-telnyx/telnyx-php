<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHangup\Payload\CallQualityStats;

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
        $self = new self;

        null !== $packetCount && $self['packetCount'] = $packetCount;
        null !== $skipPacketCount && $self['skipPacketCount'] = $skipPacketCount;

        return $self;
    }

    /**
     * Total number of outbound audio packets.
     */
    public function withPacketCount(string $packetCount): self
    {
        $self = clone $this;
        $self['packetCount'] = $packetCount;

        return $self;
    }

    /**
     * Number of skipped outbound packets (packet loss).
     */
    public function withSkipPacketCount(string $skipPacketCount): self
    {
        $self = clone $this;
        $self['skipPacketCount'] = $skipPacketCount;

        return $self;
    }
}
