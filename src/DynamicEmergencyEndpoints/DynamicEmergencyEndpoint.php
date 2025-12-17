<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint\Status;

/**
 * @phpstan-type DynamicEmergencyEndpointShape = array{
 *   callbackNumber: string,
 *   callerName: string,
 *   dynamicEmergencyAddressID: string,
 *   id?: string|null,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   sipFromID?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: string|null,
 * }
 */
final class DynamicEmergencyEndpoint implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyEndpointShape> */
    use SdkModel;

    #[Required('callback_number')]
    public string $callbackNumber;

    #[Required('caller_name')]
    public string $callerName;

    /**
     * An id of a currently active dynamic emergency location.
     */
    #[Required('dynamic_emergency_address_id')]
    public string $dynamicEmergencyAddressID;

    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date of when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('sip_from_id')]
    public ?string $sipFromID;

    /**
     * Status of dynamic emergency address.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * `new DynamicEmergencyEndpoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicEmergencyEndpoint::with(
     *   callbackNumber: ..., callerName: ..., dynamicEmergencyAddressID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DynamicEmergencyEndpoint)
     *   ->withCallbackNumber(...)
     *   ->withCallerName(...)
     *   ->withDynamicEmergencyAddressID(...)
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
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        string $callbackNumber,
        string $callerName,
        string $dynamicEmergencyAddressID,
        ?string $id = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?string $sipFromID = null,
        Status|string|null $status = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        $self['callbackNumber'] = $callbackNumber;
        $self['callerName'] = $callerName;
        $self['dynamicEmergencyAddressID'] = $dynamicEmergencyAddressID;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sipFromID && $self['sipFromID'] = $sipFromID;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withCallbackNumber(string $callbackNumber): self
    {
        $self = clone $this;
        $self['callbackNumber'] = $callbackNumber;

        return $self;
    }

    public function withCallerName(string $callerName): self
    {
        $self = clone $this;
        $self['callerName'] = $callerName;

        return $self;
    }

    /**
     * An id of a currently active dynamic emergency location.
     */
    public function withDynamicEmergencyAddressID(
        string $dynamicEmergencyAddressID
    ): self {
        $self = clone $this;
        $self['dynamicEmergencyAddressID'] = $dynamicEmergencyAddressID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the resource was created.
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

    public function withSipFromID(string $sipFromID): self
    {
        $self = clone $this;
        $self['sipFromID'] = $sipFromID;

        return $self;
    }

    /**
     * Status of dynamic emergency address.
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
     * ISO 8601 formatted date of when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
