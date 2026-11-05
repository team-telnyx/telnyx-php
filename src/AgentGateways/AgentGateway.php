<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways;

use Telnyx\AgentGateways\AgentGateway\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An Agent Gateway instance on a WireGuard Interface.
 *
 * @phpstan-type AgentGatewayShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   engine: 'litellm',
 *   engineVersion: string,
 *   gatewayURL: string|null,
 *   name: string|null,
 *   networkID: string|null,
 *   status: Status|value-of<Status>,
 *   wireguardInterfaceID: string|null,
 * }
 */
final class AgentGateway implements BaseModel
{
    /** @use SdkModel<AgentGatewayShape> */
    use SdkModel;

    /**
     * The gateway engine.
     *
     * @var 'litellm' $engine
     */
    #[Required]
    public string $engine = 'litellm';

    /**
     * Identifies the instance.
     */
    #[Required]
    public string $id;

    /**
     * When the instance was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The engine version the instance runs.
     */
    #[Required('engine_version')]
    public string $engineVersion;

    /**
     * The base URL of the instance's API, `http://<address>:4000`, where the address is the instance's peer address on the WireGuard Interface. Reachable only from hosts on the instance's *Network*, and every request to it carries a key from this API. `null` until the instance is `ready`.
     */
    #[Required('gateway_url')]
    public ?string $gatewayURL;

    /**
     * A label for people; `null` when none was given.
     */
    #[Required]
    public ?string $name;

    /**
     * The [*Network*](https://developers.telnyx.com/docs/network/overview) the WireGuard Interface belongs to.
     */
    #[Required('network_id')]
    public ?string $networkID;

    /**
     * Where the instance is in its lifecycle. `pending`: created and waiting to start. `provisioning`: starting. `ready`: running, with its `gateway_url` set. `failed`: did not start in time; delete it. `deleting`: being removed.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The WireGuard Interface the instance joins as a peer.
     */
    #[Required('wireguard_interface_id')]
    public ?string $wireguardInterfaceID;

    /**
     * `new AgentGateway()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGateway::with(
     *   id: ...,
     *   createdAt: ...,
     *   engineVersion: ...,
     *   gatewayURL: ...,
     *   name: ...,
     *   networkID: ...,
     *   status: ...,
     *   wireguardInterfaceID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGateway)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withEngineVersion(...)
     *   ->withGatewayURL(...)
     *   ->withName(...)
     *   ->withNetworkID(...)
     *   ->withStatus(...)
     *   ->withWireguardInterfaceID(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $engineVersion,
        ?string $gatewayURL,
        ?string $name,
        ?string $networkID,
        Status|string $status,
        ?string $wireguardInterfaceID,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['engineVersion'] = $engineVersion;
        $self['gatewayURL'] = $gatewayURL;
        $self['name'] = $name;
        $self['networkID'] = $networkID;
        $self['status'] = $status;
        $self['wireguardInterfaceID'] = $wireguardInterfaceID;

        return $self;
    }

    /**
     * Identifies the instance.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * When the instance was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The gateway engine.
     *
     * @param 'litellm' $engine
     */
    public function withEngine(string $engine): self
    {
        $self = clone $this;
        $self['engine'] = $engine;

        return $self;
    }

    /**
     * The engine version the instance runs.
     */
    public function withEngineVersion(string $engineVersion): self
    {
        $self = clone $this;
        $self['engineVersion'] = $engineVersion;

        return $self;
    }

    /**
     * The base URL of the instance's API, `http://<address>:4000`, where the address is the instance's peer address on the WireGuard Interface. Reachable only from hosts on the instance's *Network*, and every request to it carries a key from this API. `null` until the instance is `ready`.
     */
    public function withGatewayURL(?string $gatewayURL): self
    {
        $self = clone $this;
        $self['gatewayURL'] = $gatewayURL;

        return $self;
    }

    /**
     * A label for people; `null` when none was given.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The [*Network*](https://developers.telnyx.com/docs/network/overview) the WireGuard Interface belongs to.
     */
    public function withNetworkID(?string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * Where the instance is in its lifecycle. `pending`: created and waiting to start. `provisioning`: starting. `ready`: running, with its `gateway_url` set. `failed`: did not start in time; delete it. `deleting`: being removed.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The WireGuard Interface the instance joins as a peer.
     */
    public function withWireguardInterfaceID(
        ?string $wireguardInterfaceID
    ): self {
        $self = clone $this;
        $self['wireguardInterfaceID'] = $wireguardInterfaceID;

        return $self;
    }
}
