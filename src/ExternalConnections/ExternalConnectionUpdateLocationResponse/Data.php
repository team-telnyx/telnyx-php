<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionUpdateLocationResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   acceptedAddressSuggestions?: bool|null,
 *   locationID?: string|null,
 *   staticEmergencyAddressID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('accepted_address_suggestions')]
    public ?bool $acceptedAddressSuggestions;

    #[Optional('location_id')]
    public ?string $locationID;

    #[Optional('static_emergency_address_id')]
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
        $self = new self;

        null !== $acceptedAddressSuggestions && $self['acceptedAddressSuggestions'] = $acceptedAddressSuggestions;
        null !== $locationID && $self['locationID'] = $locationID;
        null !== $staticEmergencyAddressID && $self['staticEmergencyAddressID'] = $staticEmergencyAddressID;

        return $self;
    }

    public function withAcceptedAddressSuggestions(
        bool $acceptedAddressSuggestions
    ): self {
        $self = clone $this;
        $self['acceptedAddressSuggestions'] = $acceptedAddressSuggestions;

        return $self;
    }

    public function withLocationID(string $locationID): self
    {
        $self = clone $this;
        $self['locationID'] = $locationID;

        return $self;
    }

    public function withStaticEmergencyAddressID(
        string $staticEmergencyAddressID
    ): self {
        $self = clone $this;
        $self['staticEmergencyAddressID'] = $staticEmergencyAddressID;

        return $self;
    }
}
