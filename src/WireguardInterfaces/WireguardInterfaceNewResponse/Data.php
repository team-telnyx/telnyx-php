<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse\Data\Region;

/**
 * @phpstan-import-type RegionShape from \Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse\Data\Region
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: string|null,
 *   name?: string|null,
 *   networkID?: string|null,
 *   status?: null|InterfaceStatus|value-of<InterfaceStatus>,
 *   enableSipTrunking?: bool|null,
 *   endpoint?: string|null,
 *   publicKey?: string|null,
 *   region?: null|Region|RegionShape,
 *   regionCode?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * A user specified name for the interface.
     */
    #[Optional]
    public ?string $name;

    /**
     * The id of the network associated with the interface.
     */
    #[Optional('network_id')]
    public ?string $networkID;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Optional(enum: InterfaceStatus::class)]
    public ?string $status;

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    #[Optional('enable_sip_trunking')]
    public ?bool $enableSipTrunking;

    /**
     * The Telnyx WireGuard peers `Peer.endpoint` value.
     */
    #[Optional]
    public ?string $endpoint;

    /**
     * The Telnyx WireGuard peers `Peer.PublicKey`.
     */
    #[Optional('public_key')]
    public ?string $publicKey;

    #[Optional]
    public ?Region $region;

    /**
     * The region interface is deployed to.
     */
    #[Optional('region_code')]
    public ?string $regionCode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus>|null $status
     * @param Region|RegionShape|null $region
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
        ?string $name = null,
        ?string $networkID = null,
        InterfaceStatus|string|null $status = null,
        ?bool $enableSipTrunking = null,
        ?string $endpoint = null,
        ?string $publicKey = null,
        Region|array|null $region = null,
        ?string $regionCode = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $status && $self['status'] = $status;
        null !== $enableSipTrunking && $self['enableSipTrunking'] = $enableSipTrunking;
        null !== $endpoint && $self['endpoint'] = $endpoint;
        null !== $publicKey && $self['publicKey'] = $publicKey;
        null !== $region && $self['region'] = $region;
        null !== $regionCode && $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * The current status of the interface deployment.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public function withStatus(InterfaceStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    public function withEnableSipTrunking(bool $enableSipTrunking): self
    {
        $self = clone $this;
        $self['enableSipTrunking'] = $enableSipTrunking;

        return $self;
    }

    /**
     * The Telnyx WireGuard peers `Peer.endpoint` value.
     */
    public function withEndpoint(string $endpoint): self
    {
        $self = clone $this;
        $self['endpoint'] = $endpoint;

        return $self;
    }

    /**
     * The Telnyx WireGuard peers `Peer.PublicKey`.
     */
    public function withPublicKey(string $publicKey): self
    {
        $self = clone $this;
        $self['publicKey'] = $publicKey;

        return $self;
    }

    /**
     * @param Region|RegionShape $region
     */
    public function withRegion(Region|array $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * The region interface is deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }
}
