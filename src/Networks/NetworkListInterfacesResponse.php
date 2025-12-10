<?php

declare(strict_types=1);

namespace Telnyx\Networks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\NetworkListInterfacesResponse\Region;

/**
 * @phpstan-type NetworkListInterfacesResponseShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: string|null,
 *   name?: string|null,
 *   networkID?: string|null,
 *   status?: value-of<InterfaceStatus>|null,
 *   region?: Region|null,
 *   regionCode?: string|null,
 *   type?: string|null,
 * }
 */
final class NetworkListInterfacesResponse implements BaseModel
{
    /** @use SdkModel<NetworkListInterfacesResponseShape> */
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

    #[Optional]
    public ?Region $region;

    /**
     * The region interface is deployed to.
     */
    #[Optional('region_code')]
    public ?string $regionCode;

    /**
     * Identifies the type of the interface.
     */
    #[Optional]
    public ?string $type;

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
     * @param Region|array{
     *   code?: string|null, name?: string|null, recordType?: string|null
     * } $region
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
        ?string $name = null,
        ?string $networkID = null,
        InterfaceStatus|string|null $status = null,
        Region|array|null $region = null,
        ?string $regionCode = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $status && $self['status'] = $status;
        null !== $region && $self['region'] = $region;
        null !== $regionCode && $self['regionCode'] = $regionCode;
        null !== $type && $self['type'] = $type;

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
     * @param Region|array{
     *   code?: string|null, name?: string|null, recordType?: string|null
     * } $region
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

    /**
     * Identifies the type of the interface.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
