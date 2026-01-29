<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber\AcquiredCapability;

/**
 * @phpstan-type ExternalConnectionPhoneNumberShape = array{
 *   acquiredCapabilities?: list<AcquiredCapability|value-of<AcquiredCapability>>|null,
 *   civicAddressID?: string|null,
 *   displayedCountryCode?: string|null,
 *   locationID?: string|null,
 *   numberID?: string|null,
 *   telephoneNumber?: string|null,
 *   ticketID?: string|null,
 * }
 */
final class ExternalConnectionPhoneNumber implements BaseModel
{
    /** @use SdkModel<ExternalConnectionPhoneNumberShape> */
    use SdkModel;

    /** @var list<value-of<AcquiredCapability>>|null $acquiredCapabilities */
    #[Optional('acquired_capabilities', list: AcquiredCapability::class)]
    public ?array $acquiredCapabilities;

    /**
     * Identifies the civic address assigned to the phone number.
     */
    #[Optional('civic_address_id')]
    public ?string $civicAddressID;

    /**
     * The iso country code that will be displayed to the user when they receive a call from this phone number.
     */
    #[Optional('displayed_country_code')]
    public ?string $displayedCountryCode;

    /**
     * Identifies the location assigned to the phone number.
     */
    #[Optional('location_id')]
    public ?string $locationID;

    /**
     * Phone number ID from the Telnyx API.
     */
    #[Optional('number_id')]
    public ?string $numberID;

    /**
     * Phone number in E164 format.
     */
    #[Optional('telephone_number')]
    public ?string $telephoneNumber;

    /**
     * Uniquely identifies the resource.
     */
    #[Optional('ticket_id')]
    public ?string $ticketID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AcquiredCapability|value-of<AcquiredCapability>>|null $acquiredCapabilities
     */
    public static function with(
        ?array $acquiredCapabilities = null,
        ?string $civicAddressID = null,
        ?string $displayedCountryCode = null,
        ?string $locationID = null,
        ?string $numberID = null,
        ?string $telephoneNumber = null,
        ?string $ticketID = null,
    ): self {
        $self = new self;

        null !== $acquiredCapabilities && $self['acquiredCapabilities'] = $acquiredCapabilities;
        null !== $civicAddressID && $self['civicAddressID'] = $civicAddressID;
        null !== $displayedCountryCode && $self['displayedCountryCode'] = $displayedCountryCode;
        null !== $locationID && $self['locationID'] = $locationID;
        null !== $numberID && $self['numberID'] = $numberID;
        null !== $telephoneNumber && $self['telephoneNumber'] = $telephoneNumber;
        null !== $ticketID && $self['ticketID'] = $ticketID;

        return $self;
    }

    /**
     * @param list<AcquiredCapability|value-of<AcquiredCapability>> $acquiredCapabilities
     */
    public function withAcquiredCapabilities(array $acquiredCapabilities): self
    {
        $self = clone $this;
        $self['acquiredCapabilities'] = $acquiredCapabilities;

        return $self;
    }

    /**
     * Identifies the civic address assigned to the phone number.
     */
    public function withCivicAddressID(string $civicAddressID): self
    {
        $self = clone $this;
        $self['civicAddressID'] = $civicAddressID;

        return $self;
    }

    /**
     * The iso country code that will be displayed to the user when they receive a call from this phone number.
     */
    public function withDisplayedCountryCode(string $displayedCountryCode): self
    {
        $self = clone $this;
        $self['displayedCountryCode'] = $displayedCountryCode;

        return $self;
    }

    /**
     * Identifies the location assigned to the phone number.
     */
    public function withLocationID(string $locationID): self
    {
        $self = clone $this;
        $self['locationID'] = $locationID;

        return $self;
    }

    /**
     * Phone number ID from the Telnyx API.
     */
    public function withNumberID(string $numberID): self
    {
        $self = clone $this;
        $self['numberID'] = $numberID;

        return $self;
    }

    /**
     * Phone number in E164 format.
     */
    public function withTelephoneNumber(string $telephoneNumber): self
    {
        $self = clone $this;
        $self['telephoneNumber'] = $telephoneNumber;

        return $self;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withTicketID(string $ticketID): self
    {
        $self = clone $this;
        $self['ticketID'] = $ticketID;

        return $self;
    }
}
