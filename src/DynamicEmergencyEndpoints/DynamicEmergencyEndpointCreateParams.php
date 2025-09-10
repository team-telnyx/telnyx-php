<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DynamicEmergencyEndpointCreateParams); // set properties as needed
 * $client->dynamicEmergencyEndpoints->create(...$params->toArray());
 * ```
 * Creates a dynamic emergency endpoints.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->dynamicEmergencyEndpoints->create(...$params->toArray());`
 *
 * @see Telnyx\DynamicEmergencyEndpoints->create
 *
 * @phpstan-type dynamic_emergency_endpoint_create_params = array{
 *   callbackNumber: string, callerName: string, dynamicEmergencyAddressID: string
 * }
 */
final class DynamicEmergencyEndpointCreateParams implements BaseModel
{
    /** @use SdkModel<dynamic_emergency_endpoint_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api('callback_number')]
    public string $callbackNumber;

    #[Api('caller_name')]
    public string $callerName;

    /**
     * An id of a currently active dynamic emergency location.
     */
    #[Api('dynamic_emergency_address_id')]
    public string $dynamicEmergencyAddressID;

    /**
     * `new DynamicEmergencyEndpointCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicEmergencyEndpointCreateParams::with(
     *   callbackNumber: ..., callerName: ..., dynamicEmergencyAddressID: ...
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
        string $callbackNumber,
        string $callerName,
        string $dynamicEmergencyAddressID,
    ): self {
        $obj = new self;

        $obj->callbackNumber = $callbackNumber;
        $obj->callerName = $callerName;
        $obj->dynamicEmergencyAddressID = $dynamicEmergencyAddressID;

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
}
