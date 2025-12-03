<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint\Status;

/**
 * @phpstan-type DynamicEmergencyEndpointShape = array{
 *   callback_number: string,
 *   caller_name: string,
 *   dynamic_emergency_address_id: string,
 *   id?: string|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   sip_from_id?: string|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: string|null,
 * }
 */
final class DynamicEmergencyEndpoint implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DynamicEmergencyEndpointShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $callback_number;

    #[Api]
    public string $caller_name;

    /**
     * An id of a currently active dynamic emergency location.
     */
    #[Api]
    public string $dynamic_emergency_address_id;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date of when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    #[Api(optional: true)]
    public ?string $sip_from_id;

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
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * `new DynamicEmergencyEndpoint()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicEmergencyEndpoint::with(
     *   callback_number: ..., caller_name: ..., dynamic_emergency_address_id: ...
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
        string $callback_number,
        string $caller_name,
        string $dynamic_emergency_address_id,
        ?string $id = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?string $sip_from_id = null,
        Status|string|null $status = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        $obj->callback_number = $callback_number;
        $obj->caller_name = $caller_name;
        $obj->dynamic_emergency_address_id = $dynamic_emergency_address_id;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $sip_from_id && $obj->sip_from_id = $sip_from_id;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    public function withCallbackNumber(string $callbackNumber): self
    {
        $obj = clone $this;
        $obj->callback_number = $callbackNumber;

        return $obj;
    }

    public function withCallerName(string $callerName): self
    {
        $obj = clone $this;
        $obj->caller_name = $callerName;

        return $obj;
    }

    /**
     * An id of a currently active dynamic emergency location.
     */
    public function withDynamicEmergencyAddressID(
        string $dynamicEmergencyAddressID
    ): self {
        $obj = clone $this;
        $obj->dynamic_emergency_address_id = $dynamicEmergencyAddressID;

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

    public function withSipFromID(string $sipFromID): self
    {
        $obj = clone $this;
        $obj->sip_from_id = $sipFromID;

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
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
