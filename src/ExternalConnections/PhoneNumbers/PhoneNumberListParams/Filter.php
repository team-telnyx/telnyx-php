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
 * @phpstan-type FilterShape = array{
 *   civicAddressID?: CivicAddressID|null,
 *   locationID?: LocationID|null,
 *   phoneNumber?: PhoneNumber|null,
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
     * @param CivicAddressID|array{eq?: string|null} $civicAddressID
     * @param LocationID|array{eq?: string|null} $locationID
     * @param PhoneNumber|array{contains?: string|null, eq?: string|null} $phoneNumber
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
     * @param CivicAddressID|array{eq?: string|null} $civicAddressID
     */
    public function withCivicAddressID(
        CivicAddressID|array $civicAddressID
    ): self {
        $self = clone $this;
        $self['civicAddressID'] = $civicAddressID;

        return $self;
    }

    /**
     * @param LocationID|array{eq?: string|null} $locationID
     */
    public function withLocationID(LocationID|array $locationID): self
    {
        $self = clone $this;
        $self['locationID'] = $locationID;

        return $self;
    }

    /**
     * @param PhoneNumber|array{contains?: string|null, eq?: string|null} $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
