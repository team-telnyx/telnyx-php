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
 * @phpstan-type FilterShape = array{
 *   civic_address_id?: CivicAddressID|null,
 *   location_id?: LocationID|null,
 *   phone_number?: PhoneNumber|null,
 *   status?: Status|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CivicAddressID $civic_address_id;

    #[Api(optional: true)]
    public ?LocationID $location_id;

    /**
     * Phone number filter operations. Use 'eq' for exact matches or 'contains' for partial matches.
     */
    #[Api(optional: true)]
    public ?PhoneNumber $phone_number;

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
        ?CivicAddressID $civic_address_id = null,
        ?LocationID $location_id = null,
        ?PhoneNumber $phone_number = null,
        ?Status $status = null,
    ): self {
        $obj = new self;

        null !== $civic_address_id && $obj->civic_address_id = $civic_address_id;
        null !== $location_id && $obj->location_id = $location_id;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withCivicAddressID(CivicAddressID $civicAddressID): self
    {
        $obj = clone $this;
        $obj->civic_address_id = $civicAddressID;

        return $obj;
    }

    public function withLocationID(LocationID $locationID): self
    {
        $obj = clone $this;
        $obj->location_id = $locationID;

        return $obj;
    }

    /**
     * Phone number filter operations. Use 'eq' for exact matches or 'contains' for partial matches.
     */
    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    public function withStatus(Status $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
