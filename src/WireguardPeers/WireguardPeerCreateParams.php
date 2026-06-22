<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WireguardPeers\WireguardPeerCreateParams\Body;

/**
 * Create a new WireGuard Peer. Current limitation of 5 peers per interface can be created.
 *
 * @see Telnyx\Services\WireguardPeersService::create()
 *
 * @phpstan-import-type BodyShape from \Telnyx\WireguardPeers\WireguardPeerCreateParams\Body
 *
 * @phpstan-type WireguardPeerCreateParamsShape = array{body: Body|BodyShape}
 */
final class WireguardPeerCreateParams implements BaseModel
{
    /** @use SdkModel<WireguardPeerCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Body $body;

    /**
     * `new WireguardPeerCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WireguardPeerCreateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WireguardPeerCreateParams)->withBody(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Body|BodyShape $body
     */
    public static function with(Body|array $body): self
    {
        $self = new self;

        $self['body'] = $body;

        return $self;
    }

    /**
     * @param Body|BodyShape $body
     */
    public function withBody(Body|array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
