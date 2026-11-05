<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Creates an Agent Gateway instance on one of the account's WireGuard Interfaces. The instance starts `pending`, moves to `provisioning`, and then to `ready` or `failed`. It joins the WireGuard Interface as a peer named `agw-<instance id>`, and its `gateway_url` is set when it is `ready`.
 *
 * @see Telnyx\Services\AgentGatewaysService::create()
 *
 * @phpstan-type AgentGatewayCreateParamsShape = array{
 *   wireguardInterfaceID: string, name?: string|null
 * }
 */
final class AgentGatewayCreateParams implements BaseModel
{
    /** @use SdkModel<AgentGatewayCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * One of the account's WireGuard Interfaces. The instance joins it as a peer, and the interface's other peers reach the instance.
     */
    #[Required('wireguard_interface_id')]
    public string $wireguardInterfaceID;

    /**
     * A label for people.
     */
    #[Optional(nullable: true)]
    public ?string $name;

    /**
     * `new AgentGatewayCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayCreateParams::with(wireguardInterfaceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayCreateParams)->withWireguardInterfaceID(...)
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
    public static function with(
        string $wireguardInterfaceID,
        string|Omitted|null $name = Omitted::VALUE
    ): self {
        $self = new self;

        $self['wireguardInterfaceID'] = $wireguardInterfaceID;

        Omitted::VALUE !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * One of the account's WireGuard Interfaces. The instance joins it as a peer, and the interface's other peers reach the instance.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $self = clone $this;
        $self['wireguardInterfaceID'] = $wireguardInterfaceID;

        return $self;
    }

    /**
     * A label for people.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
