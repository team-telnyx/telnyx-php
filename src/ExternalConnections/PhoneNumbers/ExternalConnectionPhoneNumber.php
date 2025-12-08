<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber\AcquiredCapability;

/**
 * @phpstan-type ExternalConnectionPhoneNumberShape = array{
 *   acquired_capabilities?: list<value-of<AcquiredCapability>>|null,
 *   civic_address_id?: string|null,
 *   displayed_country_code?: string|null,
 *   location_id?: string|null,
 *   number_id?: string|null,
 *   telephone_number?: string|null,
 *   ticket_id?: string|null,
 * }
 */
final class ExternalConnectionPhoneNumber implements BaseModel
{
    /** @use SdkModel<ExternalConnectionPhoneNumberShape> */
    use SdkModel;

    /** @var list<value-of<AcquiredCapability>>|null $acquired_capabilities */
    #[Optional(list: AcquiredCapability::class)]
    public ?array $acquired_capabilities;

    /**
     * Identifies the civic address assigned to the phone number.
     */
    #[Optional]
    public ?string $civic_address_id;

    /**
     * The iso country code that will be displayed to the user when they receive a call from this phone number.
     */
    #[Optional]
    public ?string $displayed_country_code;

    /**
     * Identifies the location assigned to the phone number.
     */
    #[Optional]
    public ?string $location_id;

    /**
     * Phone number ID from the Telnyx API.
     */
    #[Optional]
    public ?string $number_id;

    /**
     * Phone number in E164 format.
     */
    #[Optional]
    public ?string $telephone_number;

    /**
     * Uniquely identifies the resource.
     */
    #[Optional]
    public ?string $ticket_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AcquiredCapability|value-of<AcquiredCapability>> $acquired_capabilities
     */
    public static function with(
        ?array $acquired_capabilities = null,
        ?string $civic_address_id = null,
        ?string $displayed_country_code = null,
        ?string $location_id = null,
        ?string $number_id = null,
        ?string $telephone_number = null,
        ?string $ticket_id = null,
    ): self {
        $obj = new self;

        null !== $acquired_capabilities && $obj['acquired_capabilities'] = $acquired_capabilities;
        null !== $civic_address_id && $obj['civic_address_id'] = $civic_address_id;
        null !== $displayed_country_code && $obj['displayed_country_code'] = $displayed_country_code;
        null !== $location_id && $obj['location_id'] = $location_id;
        null !== $number_id && $obj['number_id'] = $number_id;
        null !== $telephone_number && $obj['telephone_number'] = $telephone_number;
        null !== $ticket_id && $obj['ticket_id'] = $ticket_id;

        return $obj;
    }

    /**
     * @param list<AcquiredCapability|value-of<AcquiredCapability>> $acquiredCapabilities
     */
    public function withAcquiredCapabilities(array $acquiredCapabilities): self
    {
        $obj = clone $this;
        $obj['acquired_capabilities'] = $acquiredCapabilities;

        return $obj;
    }

    /**
     * Identifies the civic address assigned to the phone number.
     */
    public function withCivicAddressID(string $civicAddressID): self
    {
        $obj = clone $this;
        $obj['civic_address_id'] = $civicAddressID;

        return $obj;
    }

    /**
     * The iso country code that will be displayed to the user when they receive a call from this phone number.
     */
    public function withDisplayedCountryCode(string $displayedCountryCode): self
    {
        $obj = clone $this;
        $obj['displayed_country_code'] = $displayedCountryCode;

        return $obj;
    }

    /**
     * Identifies the location assigned to the phone number.
     */
    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj['location_id'] = $locationID;

        return $obj;
    }

    /**
     * Phone number ID from the Telnyx API.
     */
    public function withNumberID(string $numberID): self
    {
        $obj = clone $this;
        $obj['number_id'] = $numberID;

        return $obj;
    }

    /**
     * Phone number in E164 format.
     */
    public function withTelephoneNumber(string $telephoneNumber): self
    {
        $obj = clone $this;
        $obj['telephone_number'] = $telephoneNumber;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj['ticket_id'] = $ticketID;

        return $obj;
    }
}
