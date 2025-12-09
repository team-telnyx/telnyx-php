<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint\Status;

/**
 * @phpstan-type DynamicEmergencyEndpointDeleteResponseShape = array{
 *   data?: DynamicEmergencyEndpoint|null
 * }
 */
final class DynamicEmergencyEndpointDeleteResponse implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyEndpointDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?DynamicEmergencyEndpoint $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DynamicEmergencyEndpoint|array{
     *   callbackNumber: string,
     *   callerName: string,
     *   dynamicEmergencyAddressID: string,
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   sipFromID?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(
        DynamicEmergencyEndpoint|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param DynamicEmergencyEndpoint|array{
     *   callbackNumber: string,
     *   callerName: string,
     *   dynamicEmergencyAddressID: string,
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   sipFromID?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(DynamicEmergencyEndpoint|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
