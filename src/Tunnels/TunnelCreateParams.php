<?php

declare(strict_types=1);

namespace Telnyx\Tunnels;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a tunnel and returns its `tunnel_token`. The token is the only credential the tunnel process needs, and this response and `POST /tunnels/{id}/actions/rotate_token` are the only ones that return it. A new tunnel is `inactive` until a tunnel process connects with the token.
 *
 * @see Telnyx\Services\TunnelsService::create()
 *
 * @phpstan-type TunnelCreateParamsShape = array{name: string}
 */
final class TunnelCreateParams implements BaseModel
{
    /** @use SdkModel<TunnelCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user specified name for the tunnel.
     */
    #[Required]
    public string $name;

    /**
     * `new TunnelCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TunnelCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TunnelCreateParams)->withName(...)
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
     */
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * A user specified name for the tunnel.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
