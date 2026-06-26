<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Stats;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Raw stats object emitted by the Voice SDK.
 *
 * @phpstan-type UnionMember1Shape = array{
 *   audio?: array<string,mixed>|null,
 *   connection?: array<string,mixed>|null,
 *   ice?: array<string,mixed>|null,
 *   transport?: array<string,mixed>|null,
 * }
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<UnionMember1Shape> */
    use SdkModel;

    /**
     * Raw audio stats such as inbound/outbound packet, byte, jitter, packet-loss, bitrate, and audio-level metrics.
     *
     * @var array<string,mixed>|null $audio
     */
    #[Optional(map: 'mixed')]
    public ?array $audio;

    /**
     * Raw connection stats such as round-trip time, packets, and bytes sent or received.
     *
     * @var array<string,mixed>|null $connection
     */
    #[Optional(map: 'mixed')]
    public ?array $connection;

    /**
     * Raw ICE candidate-pair information, including selected pair, local/remote candidates, state, and nomination data when provided by the SDK.
     *
     * @var array<string,mixed>|null $ice
     */
    #[Optional(map: 'mixed')]
    public ?array $ice;

    /**
     * Raw transport stats such as ICE state, DTLS state, SRTP cipher, TLS version, and selected-candidate-pair changes.
     *
     * @var array<string,mixed>|null $transport
     */
    #[Optional(map: 'mixed')]
    public ?array $transport;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $audio
     * @param array<string,mixed>|null $connection
     * @param array<string,mixed>|null $ice
     * @param array<string,mixed>|null $transport
     */
    public static function with(
        ?array $audio = null,
        ?array $connection = null,
        ?array $ice = null,
        ?array $transport = null,
    ): self {
        $self = new self;

        null !== $audio && $self['audio'] = $audio;
        null !== $connection && $self['connection'] = $connection;
        null !== $ice && $self['ice'] = $ice;
        null !== $transport && $self['transport'] = $transport;

        return $self;
    }

    /**
     * Raw audio stats such as inbound/outbound packet, byte, jitter, packet-loss, bitrate, and audio-level metrics.
     *
     * @param array<string,mixed> $audio
     */
    public function withAudio(array $audio): self
    {
        $self = clone $this;
        $self['audio'] = $audio;

        return $self;
    }

    /**
     * Raw connection stats such as round-trip time, packets, and bytes sent or received.
     *
     * @param array<string,mixed> $connection
     */
    public function withConnection(array $connection): self
    {
        $self = clone $this;
        $self['connection'] = $connection;

        return $self;
    }

    /**
     * Raw ICE candidate-pair information, including selected pair, local/remote candidates, state, and nomination data when provided by the SDK.
     *
     * @param array<string,mixed> $ice
     */
    public function withIce(array $ice): self
    {
        $self = clone $this;
        $self['ice'] = $ice;

        return $self;
    }

    /**
     * Raw transport stats such as ICE state, DTLS state, SRTP cipher, TLS version, and selected-candidate-pair changes.
     *
     * @param array<string,mixed> $transport
     */
    public function withTransport(array $transport): self
    {
        $self = clone $this;
        $self['transport'] = $transport;

        return $self;
    }
}
