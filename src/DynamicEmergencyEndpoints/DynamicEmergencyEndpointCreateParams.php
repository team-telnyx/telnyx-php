<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a dynamic emergency endpoints.
 *
 * @see Telnyx\Services\DynamicEmergencyEndpointsService::create()
 *
 * @phpstan-type DynamicEmergencyEndpointCreateParamsShape = array{
 *   callback_number: string,
 *   caller_name: string,
 *   dynamic_emergency_address_id: string,
 * }
 */
final class DynamicEmergencyEndpointCreateParams implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyEndpointCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $callback_number;

    #[Api]
    public string $caller_name;

    /**
     * An id of a currently active dynamic emergency location.
     */
    #[Api]
    public string $dynamic_emergency_address_id;

    /**
     * `new DynamicEmergencyEndpointCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicEmergencyEndpointCreateParams::with(
     *   callback_number: ..., caller_name: ..., dynamic_emergency_address_id: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DynamicEmergencyEndpointCreateParams)
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
     */
    public static function with(
        string $callback_number,
        string $caller_name,
        string $dynamic_emergency_address_id,
    ): self {
        $obj = new self;

        $obj['callback_number'] = $callback_number;
        $obj['caller_name'] = $caller_name;
        $obj['dynamic_emergency_address_id'] = $dynamic_emergency_address_id;

        return $obj;
    }

    public function withCallbackNumber(string $callbackNumber): self
    {
        $obj = clone $this;
        $obj['callback_number'] = $callbackNumber;

        return $obj;
    }

    public function withCallerName(string $callerName): self
    {
        $obj = clone $this;
        $obj['caller_name'] = $callerName;

        return $obj;
    }

    /**
     * An id of a currently active dynamic emergency location.
     */
    public function withDynamicEmergencyAddressID(
        string $dynamicEmergencyAddressID
    ): self {
        $obj = clone $this;
        $obj['dynamic_emergency_address_id'] = $dynamicEmergencyAddressID;

        return $obj;
    }
}
