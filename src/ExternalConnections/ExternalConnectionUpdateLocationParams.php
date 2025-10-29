<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a location's static emergency address.
 *
 * @see Telnyx\ExternalConnections->updateLocation
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

    #[Api]
    public string $id;

    /**
     * A new static emergency address ID to update the location with.
     */
    #[Api('static_emergency_address_id')]
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
        $obj = new self;

        $obj->id = $id;
        $obj->staticEmergencyAddressID = $staticEmergencyAddressID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A new static emergency address ID to update the location with.
     */
    public function withStaticEmergencyAddressID(
        string $staticEmergencyAddressID
    ): self {
        $obj = clone $this;
        $obj->staticEmergencyAddressID = $staticEmergencyAddressID;

        return $obj;
    }
}
