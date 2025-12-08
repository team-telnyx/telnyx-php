<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   accepted_address_suggestions?: bool|null,
 *   location_id?: string|null,
 *   static_emergency_address_id?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $accepted_address_suggestions;

    #[Optional]
    public ?string $location_id;

    #[Optional]
    public ?string $static_emergency_address_id;

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
        ?bool $accepted_address_suggestions = null,
        ?string $location_id = null,
        ?string $static_emergency_address_id = null,
    ): self {
        $obj = new self;

        null !== $accepted_address_suggestions && $obj['accepted_address_suggestions'] = $accepted_address_suggestions;
        null !== $location_id && $obj['location_id'] = $location_id;
        null !== $static_emergency_address_id && $obj['static_emergency_address_id'] = $static_emergency_address_id;

        return $obj;
    }

    public function withAcceptedAddressSuggestions(
        bool $acceptedAddressSuggestions
    ): self {
        $obj = clone $this;
        $obj['accepted_address_suggestions'] = $acceptedAddressSuggestions;

        return $obj;
    }

    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj['location_id'] = $locationID;

        return $obj;
    }

    public function withStaticEmergencyAddressID(
        string $staticEmergencyAddressID
    ): self {
        $obj = clone $this;
        $obj['static_emergency_address_id'] = $staticEmergencyAddressID;

        return $obj;
    }
}
