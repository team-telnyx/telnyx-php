<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WireguardInterfaces\WireguardInterfaceCreateParams\Body;

/**
 * Create a new WireGuard Interface. Current limitation of 10 interfaces per user can be created.
 *
 * @see Telnyx\Services\WireguardInterfacesService::create()
 *
 * @phpstan-import-type BodyShape from \Telnyx\WireguardInterfaces\WireguardInterfaceCreateParams\Body
 *
 * @phpstan-type WireguardInterfaceCreateParamsShape = array{body: Body|BodyShape}
 */
final class WireguardInterfaceCreateParams implements BaseModel
{
    /** @use SdkModel<WireguardInterfaceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Body $body;

    /**
     * `new WireguardInterfaceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WireguardInterfaceCreateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WireguardInterfaceCreateParams)->withBody(...)
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
