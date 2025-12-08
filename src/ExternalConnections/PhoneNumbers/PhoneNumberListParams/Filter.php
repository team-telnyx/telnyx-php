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
 *   civic_address_id?: CivicAddressID|null,
 *   location_id?: LocationID|null,
 *   phone_number?: PhoneNumber|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional]
    public ?CivicAddressID $civic_address_id;

    #[Optional]
    public ?LocationID $location_id;

    #[Optional]
    public ?PhoneNumber $phone_number;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CivicAddressID|array{eq?: string|null} $civic_address_id
     * @param LocationID|array{eq?: string|null} $location_id
     * @param PhoneNumber|array{contains?: string|null, eq?: string|null} $phone_number
     */
    public static function with(
        CivicAddressID|array|null $civic_address_id = null,
        LocationID|array|null $location_id = null,
        PhoneNumber|array|null $phone_number = null,
    ): self {
        $obj = new self;

        null !== $civic_address_id && $obj['civic_address_id'] = $civic_address_id;
        null !== $location_id && $obj['location_id'] = $location_id;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * @param CivicAddressID|array{eq?: string|null} $civicAddressID
     */
    public function withCivicAddressID(
        CivicAddressID|array $civicAddressID
    ): self {
        $obj = clone $this;
        $obj['civic_address_id'] = $civicAddressID;

        return $obj;
    }

    /**
     * @param LocationID|array{eq?: string|null} $locationID
     */
    public function withLocationID(LocationID|array $locationID): self
    {
        $obj = clone $this;
        $obj['location_id'] = $locationID;

        return $obj;
    }

    /**
     * @param PhoneNumber|array{contains?: string|null, eq?: string|null} $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
