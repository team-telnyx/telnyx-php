<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter\CivicAddressID;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter\LocationID;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter\PhoneNumber;

/**
 * Filter parameter for phone numbers (deepObject style). Supports filtering by phone_number, civic_address_id, and location_id with eq/contains operations.
 *
 * @phpstan-import-type CivicAddressIDShape from \Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter\CivicAddressID
 * @phpstan-import-type LocationIDShape from \Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter\LocationID
 * @phpstan-import-type PhoneNumberShape from \Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter\PhoneNumber
 *
 * @phpstan-type FilterShape = array{
 *   civicAddressID?: null|CivicAddressID|CivicAddressIDShape,
 *   locationID?: null|LocationID|LocationIDShape,
 *   phoneNumber?: null|PhoneNumber|PhoneNumberShape,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('civic_address_id')]
    public ?CivicAddressID $civicAddressID;

    #[Optional('location_id')]
    public ?LocationID $locationID;

    #[Optional('phone_number')]
    public ?PhoneNumber $phoneNumber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CivicAddressID|CivicAddressIDShape|null $civicAddressID
     * @param LocationID|LocationIDShape|null $locationID
     * @param PhoneNumber|PhoneNumberShape|null $phoneNumber
     */
    public static function with(
        CivicAddressID|array|null $civicAddressID = null,
        LocationID|array|null $locationID = null,
        PhoneNumber|array|null $phoneNumber = null,
    ): self {
        $self = new self;

        null !== $civicAddressID && $self['civicAddressID'] = $civicAddressID;
        null !== $locationID && $self['locationID'] = $locationID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * @param CivicAddressID|CivicAddressIDShape $civicAddressID
     */
    public function withCivicAddressID(
        CivicAddressID|array $civicAddressID
    ): self {
        $self = clone $this;
        $self['civicAddressID'] = $civicAddressID;

        return $self;
    }

    /**
     * @param LocationID|LocationIDShape $locationID
     */
    public function withLocationID(LocationID|array $locationID): self
    {
        $self = clone $this;
        $self['locationID'] = $locationID;

        return $self;
    }

    /**
     * @param PhoneNumber|PhoneNumberShape $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
