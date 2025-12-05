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
 * @phpstan-type DynamicEmergencyEndpointGetResponseShape = array{
 *   data?: DynamicEmergencyEndpoint|null
 * }
 */
final class DynamicEmergencyEndpointGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DynamicEmergencyEndpointGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     *   callback_number: string,
     *   caller_name: string,
     *   dynamic_emergency_address_id: string,
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   sip_from_id?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
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
     *   callback_number: string,
     *   caller_name: string,
     *   dynamic_emergency_address_id: string,
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   sip_from_id?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(DynamicEmergencyEndpoint|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
