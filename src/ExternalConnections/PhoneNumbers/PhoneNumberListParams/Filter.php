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
        $obj = new self;

        null !== $civicAddressID && $obj['civicAddressID'] = $civicAddressID;
        null !== $locationID && $obj['locationID'] = $locationID;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * @param CivicAddressID|array{eq?: string|null} $civicAddressID
     */
    public function withCivicAddressID(
        CivicAddressID|array $civicAddressID
    ): self {
        $obj = clone $this;
        $obj['civicAddressID'] = $civicAddressID;

        return $obj;
    }

    /**
     * @param LocationID|array{eq?: string|null} $locationID
     */
    public function withLocationID(LocationID|array $locationID): self
    {
        $obj = clone $this;
        $obj['locationID'] = $locationID;

        return $obj;
    }

    /**
     * @param PhoneNumber|array{contains?: string|null, eq?: string|null} $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}
