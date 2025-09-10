<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\CivicAddressID;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\LocationID;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\PhoneNumber;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\Status;

/**
 * Filter parameter for releases (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
 *
 * @phpstan-type filter_alias = array{
 *   civicAddressID?: CivicAddressID|null,
 *   locationID?: LocationID|null,
 *   phoneNumber?: PhoneNumber|null,
 *   status?: Status|null,
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

    /**
     * Phone number filter operations. Use 'eq' for exact matches or 'contains' for partial matches.
     */
    #[Api('phone_number', optional: true)]
    public ?PhoneNumber $phoneNumber;

    #[Api(optional: true)]
    public ?Status $status;

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
        ?Status $status = null,
    ): self {
        $obj = new self;

        null !== $civicAddressID && $obj->civicAddressID = $civicAddressID;
        null !== $locationID && $obj->locationID = $locationID;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $status && $obj->status = $status;

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

    /**
     * Phone number filter operations. Use 'eq' for exact matches or 'contains' for partial matches.
     */
    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withStatus(Status $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
