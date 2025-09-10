<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint\Status;

/**
 * @phpstan-type dynamic_emergency_endpoint = array{
 *   callbackNumber: string,
 *   callerName: string,
 *   dynamicEmergencyAddressID: string,
 *   id?: string|null,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   sipFromID?: string|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: string|null,
 * }
 */
final class DynamicEmergencyEndpoint implements BaseModel
{
    /** @use SdkModel<dynamic_emergency_endpoint> */
    use SdkModel;

    #[Api('callback_number')]
    public string $callbackNumber;

    #[Api('caller_name')]
    public string $callerName;

    /**
     * An id of a currently active dynamic emergency location.
     */
    #[Api('dynamic_emergency_address_id')]
    public string $dynamicEmergencyAddressID;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date of when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api('sip_from_id', optional: true)]
    public ?string $sipFromID;

    /**
     * Status of dynamic emergency address.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    #[Api('updated_at', optional: true)]
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
     * @param Status|value-of<Status> $status
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
        $obj = new self;

        $obj->callbackNumber = $callbackNumber;
        $obj->callerName = $callerName;
        $obj->dynamicEmergencyAddressID = $dynamicEmergencyAddressID;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $sipFromID && $obj->sipFromID = $sipFromID;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withCallbackNumber(string $callbackNumber): self
    {
        $obj = clone $this;
        $obj->callbackNumber = $callbackNumber;

        return $obj;
    }

    public function withCallerName(string $callerName): self
    {
        $obj = clone $this;
        $obj->callerName = $callerName;

        return $obj;
    }

    /**
     * An id of a currently active dynamic emergency location.
     */
    public function withDynamicEmergencyAddressID(
        string $dynamicEmergencyAddressID
    ): self {
        $obj = clone $this;
        $obj->dynamicEmergencyAddressID = $dynamicEmergencyAddressID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withSipFromID(string $sipFromID): self
    {
        $obj = clone $this;
        $obj->sipFromID = $sipFromID;

        return $obj;
    }

    /**
     * Status of dynamic emergency address.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
