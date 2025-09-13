<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter\CivicAddressID;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter\LocationID;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter\PhoneNumber;

/**
 * Filter parameter for phone numbers (deepObject style). Supports filtering by phone_number, civic_address_id, and location_id with eq/contains operations.
 *
 * @phpstan-type filter_alias = array{
 *   civicAddressID?: CivicAddressID,
 *   locationID?: LocationID,
 *   phoneNumber?: PhoneNumber,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api('civic_address_id', optional: true)]
    public ?CivicAddressID $civicAddressID;

    #[Api('location_id', optional: true)]
    public ?LocationID $locationID;

    #[Api('phone_number', optional: true)]
    public ?PhoneNumber $phoneNumber;

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
        ?CivicAddressID $civicAddressID = null,
        ?LocationID $locationID = null,
        ?PhoneNumber $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $civicAddressID && $obj->civicAddressID = $civicAddressID;
        null !== $locationID && $obj->locationID = $locationID;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withCivicAddressID(CivicAddressID $civicAddressID): self
    {
        $obj = clone $this;
        $obj->civicAddressID = $civicAddressID;

        return $obj;
    }

    public function withLocationID(LocationID $locationID): self
    {
        $obj = clone $this;
        $obj->locationID = $locationID;

        return $obj;
    }

    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
