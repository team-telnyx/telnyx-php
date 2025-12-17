<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DynamicEmergencyEndpointShape from \Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint
 *
 * @phpstan-type DynamicEmergencyEndpointDeleteResponseShape = array{
 *   data?: null|DynamicEmergencyEndpoint|DynamicEmergencyEndpointShape
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
     * @param DynamicEmergencyEndpoint|DynamicEmergencyEndpointShape|null $data
     */
    public static function with(
        DynamicEmergencyEndpoint|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DynamicEmergencyEndpoint|DynamicEmergencyEndpointShape $data
     */
    public function withData(DynamicEmergencyEndpoint|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
