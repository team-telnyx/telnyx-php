<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   acceptedAddressSuggestions?: bool,
 *   locationID?: string,
 *   staticEmergencyAddressID?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api('accepted_address_suggestions', optional: true)]
    public ?bool $acceptedAddressSuggestions;

    #[Api('location_id', optional: true)]
    public ?string $locationID;

    #[Api('static_emergency_address_id', optional: true)]
    public ?string $staticEmergencyAddressID;

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
        ?bool $acceptedAddressSuggestions = null,
        ?string $locationID = null,
        ?string $staticEmergencyAddressID = null,
    ): self {
        $obj = new self;

        null !== $acceptedAddressSuggestions && $obj->acceptedAddressSuggestions = $acceptedAddressSuggestions;
        null !== $locationID && $obj->locationID = $locationID;
        null !== $staticEmergencyAddressID && $obj->staticEmergencyAddressID = $staticEmergencyAddressID;

        return $obj;
    }

    public function withAcceptedAddressSuggestions(
        bool $acceptedAddressSuggestions
    ): self {
        $obj = clone $this;
        $obj->acceptedAddressSuggestions = $acceptedAddressSuggestions;

        return $obj;
    }

    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj->locationID = $locationID;

        return $obj;
    }

    public function withStaticEmergencyAddressID(
        string $staticEmergencyAddressID
    ): self {
        $obj = clone $this;
        $obj->staticEmergencyAddressID = $staticEmergencyAddressID;

        return $obj;
    }
}
