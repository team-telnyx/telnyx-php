<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber\AcquiredCapability;

/**
 * @phpstan-type external_connection_phone_number = array{
 *   acquiredCapabilities?: list<value-of<AcquiredCapability>>,
 *   civicAddressID?: string,
 *   displayedCountryCode?: string,
 *   locationID?: string,
 *   numberID?: string,
 *   telephoneNumber?: string,
 *   ticketID?: string,
 * }
 */
final class ExternalConnectionPhoneNumber implements BaseModel
{
    /** @use SdkModel<external_connection_phone_number> */
    use SdkModel;

    /** @var list<value-of<AcquiredCapability>>|null $acquiredCapabilities */
    #[Api(
        'acquired_capabilities',
        list: AcquiredCapability::class,
        optional: true
    )]
    public ?array $acquiredCapabilities;

    /**
     * Identifies the civic address assigned to the phone number.
     */
    #[Api('civic_address_id', optional: true)]
    public ?string $civicAddressID;

    /**
     * The iso country code that will be displayed to the user when they receive a call from this phone number.
     */
    #[Api('displayed_country_code', optional: true)]
    public ?string $displayedCountryCode;

    /**
     * Identifies the location assigned to the phone number.
     */
    #[Api('location_id', optional: true)]
    public ?string $locationID;

    /**
     * Phone number ID from the Telnyx API.
     */
    #[Api('number_id', optional: true)]
    public ?string $numberID;

    /**
     * Phone number in E164 format.
     */
    #[Api('telephone_number', optional: true)]
    public ?string $telephoneNumber;

    /**
     * Uniquely identifies the resource.
     */
    #[Api('ticket_id', optional: true)]
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
     * @param list<AcquiredCapability|value-of<AcquiredCapability>> $acquiredCapabilities
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
        $obj = new self;

        null !== $acquiredCapabilities && $obj['acquiredCapabilities'] = $acquiredCapabilities;
        null !== $civicAddressID && $obj->civicAddressID = $civicAddressID;
        null !== $displayedCountryCode && $obj->displayedCountryCode = $displayedCountryCode;
        null !== $locationID && $obj->locationID = $locationID;
        null !== $numberID && $obj->numberID = $numberID;
        null !== $telephoneNumber && $obj->telephoneNumber = $telephoneNumber;
        null !== $ticketID && $obj->ticketID = $ticketID;

        return $obj;
    }

    /**
     * @param list<AcquiredCapability|value-of<AcquiredCapability>> $acquiredCapabilities
     */
    public function withAcquiredCapabilities(array $acquiredCapabilities): self
    {
        $obj = clone $this;
        $obj['acquiredCapabilities'] = $acquiredCapabilities;

        return $obj;
    }

    /**
     * Identifies the civic address assigned to the phone number.
     */
    public function withCivicAddressID(string $civicAddressID): self
    {
        $obj = clone $this;
        $obj->civicAddressID = $civicAddressID;

        return $obj;
    }

    /**
     * The iso country code that will be displayed to the user when they receive a call from this phone number.
     */
    public function withDisplayedCountryCode(string $displayedCountryCode): self
    {
        $obj = clone $this;
        $obj->displayedCountryCode = $displayedCountryCode;

        return $obj;
    }

    /**
     * Identifies the location assigned to the phone number.
     */
    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj->locationID = $locationID;

        return $obj;
    }

    /**
     * Phone number ID from the Telnyx API.
     */
    public function withNumberID(string $numberID): self
    {
        $obj = clone $this;
        $obj->numberID = $numberID;

        return $obj;
    }

    /**
     * Phone number in E164 format.
     */
    public function withTelephoneNumber(string $telephoneNumber): self
    {
        $obj = clone $this;
        $obj->telephoneNumber = $telephoneNumber;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj->ticketID = $ticketID;

        return $obj;
    }
}
