<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WireguardPeerShape from \Telnyx\WireguardPeers\WireguardPeer
 *
 * @phpstan-type WireguardPeerGetResponseShape = array{
 *   data?: null|WireguardPeer|WireguardPeerShape
 * }
 */
final class WireguardPeerGetResponse implements BaseModel
{
    /** @use SdkModel<WireguardPeerGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WireguardPeer $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WireguardPeer|WireguardPeerShape|null $data
     */
    public static function with(WireguardPeer|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WireguardPeer|WireguardPeerShape $data
     */
    public function withData(WireguardPeer|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
