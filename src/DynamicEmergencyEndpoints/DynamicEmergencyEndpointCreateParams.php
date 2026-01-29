<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a dynamic emergency endpoints.
 *
 * @see Telnyx\Services\DynamicEmergencyEndpointsService::create()
 *
 * @phpstan-type DynamicEmergencyEndpointCreateParamsShape = array{
 *   callbackNumber: string, callerName: string, dynamicEmergencyAddressID: string
 * }
 */
final class DynamicEmergencyEndpointCreateParams implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyEndpointCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('callback_number')]
    public string $callbackNumber;

    #[Required('caller_name')]
    public string $callerName;

    /**
     * An id of a currently active dynamic emergency location.
     */
    #[Required('dynamic_emergency_address_id')]
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
        $self = new self;

        $self['callbackNumber'] = $callbackNumber;
        $self['callerName'] = $callerName;
        $self['dynamicEmergencyAddressID'] = $dynamicEmergencyAddressID;

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
}
