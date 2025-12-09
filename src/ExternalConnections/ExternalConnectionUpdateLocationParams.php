<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a location's static emergency address.
 *
 * @see Telnyx\Services\ExternalConnectionsService::updateLocation()
 *
 * @phpstan-type ExternalConnectionUpdateLocationParamsShape = array{
 *   id: string, staticEmergencyAddressID: string
 * }
 */
final class ExternalConnectionUpdateLocationParams implements BaseModel
{
    /** @use SdkModel<ExternalConnectionUpdateLocationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * A new static emergency address ID to update the location with.
     */
    #[Required('static_emergency_address_id')]
    public string $staticEmergencyAddressID;

    /**
     * `new ExternalConnectionUpdateLocationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalConnectionUpdateLocationParams::with(
     *   id: ..., staticEmergencyAddressID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalConnectionUpdateLocationParams)
     *   ->withID(...)
     *   ->withStaticEmergencyAddressID(...)
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
        string $id,
        string $staticEmergencyAddressID
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['staticEmergencyAddressID'] = $staticEmergencyAddressID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A new static emergency address ID to update the location with.
     */
    public function withStaticEmergencyAddressID(
        string $staticEmergencyAddressID
    ): self {
        $self = clone $this;
        $self['staticEmergencyAddressID'] = $staticEmergencyAddressID;

        return $self;
    }
}
