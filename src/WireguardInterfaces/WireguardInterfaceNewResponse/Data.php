<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse\Data\Region;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 *   name?: string|null,
 *   network_id?: string|null,
 *   status?: value-of<InterfaceStatus>|null,
 *   enable_sip_trunking?: bool|null,
 *   endpoint?: string|null,
 *   public_key?: string|null,
 *   region?: Region|null,
 *   region_code?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * A user specified name for the interface.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The id of the network associated with the interface.
     */
    #[Api(optional: true)]
    public ?string $network_id;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Api(enum: InterfaceStatus::class, optional: true)]
    public ?string $status;

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    #[Api(optional: true)]
    public ?bool $enable_sip_trunking;

    /**
     * The Telnyx WireGuard peers `Peer.endpoint` value.
     */
    #[Api(optional: true)]
    public ?string $endpoint;

    /**
     * The Telnyx WireGuard peers `Peer.PublicKey`.
     */
    #[Api(optional: true)]
    public ?string $public_key;

    #[Api(optional: true)]
    public ?Region $region;

    /**
     * The region interface is deployed to.
     */
    #[Api(optional: true)]
    public ?string $region_code;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public static function with(
        ?string $id = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?string $updated_at = null,
        ?string $name = null,
        ?string $network_id = null,
        InterfaceStatus|string|null $status = null,
        ?bool $enable_sip_trunking = null,
        ?string $endpoint = null,
        ?string $public_key = null,
        ?Region $region = null,
        ?string $region_code = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $name && $obj->name = $name;
        null !== $network_id && $obj->network_id = $network_id;
        null !== $status && $obj['status'] = $status;
        null !== $enable_sip_trunking && $obj->enable_sip_trunking = $enable_sip_trunking;
        null !== $endpoint && $obj->endpoint = $endpoint;
        null !== $public_key && $obj->public_key = $public_key;
        null !== $region && $obj->region = $region;
        null !== $region_code && $obj->region_code = $region_code;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj->network_id = $networkID;

        return $obj;
    }

    /**
     * The current status of the interface deployment.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public function withStatus(InterfaceStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    public function withEnableSipTrunking(bool $enableSipTrunking): self
    {
        $obj = clone $this;
        $obj->enable_sip_trunking = $enableSipTrunking;

        return $obj;
    }

    /**
     * The Telnyx WireGuard peers `Peer.endpoint` value.
     */
    public function withEndpoint(string $endpoint): self
    {
        $obj = clone $this;
        $obj->endpoint = $endpoint;

        return $obj;
    }

    /**
     * The Telnyx WireGuard peers `Peer.PublicKey`.
     */
    public function withPublicKey(string $publicKey): self
    {
        $obj = clone $this;
        $obj->public_key = $publicKey;

        return $obj;
    }

    public function withRegion(Region $region): self
    {
        $obj = clone $this;
        $obj->region = $region;

        return $obj;
    }

    /**
     * The region interface is deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->region_code = $regionCode;

        return $obj;
    }
}
