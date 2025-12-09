<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\CivicAddressID;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\LocationID;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\PhoneNumber;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\Status;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\Status\Eq;

/**
 * Filter parameter for releases (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
 *
 * @phpstan-type FilterShape = array{
 *   civicAddressID?: CivicAddressID|null,
 *   locationID?: LocationID|null,
 *   phoneNumber?: PhoneNumber|null,
 *   status?: Status|null,
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

    /**
     * Phone number filter operations. Use 'eq' for exact matches or 'contains' for partial matches.
     */
    #[Optional('phone_number')]
    public ?PhoneNumber $phoneNumber;

    #[Optional]
    public ?Status $status;

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
     * @param Status|array{eq?: list<value-of<Eq>>|null} $status
     */
    public static function with(
        CivicAddressID|array|null $civicAddressID = null,
        LocationID|array|null $locationID = null,
        PhoneNumber|array|null $phoneNumber = null,
        Status|array|null $status = null,
    ): self {
        $obj = new self;

        null !== $civicAddressID && $obj['civicAddressID'] = $civicAddressID;
        null !== $locationID && $obj['locationID'] = $locationID;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $status && $obj['status'] = $status;

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
     * Phone number filter operations. Use 'eq' for exact matches or 'contains' for partial matches.
     *
     * @param PhoneNumber|array{contains?: string|null, eq?: string|null} $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * @param Status|array{eq?: list<value-of<Eq>>|null} $status
     */
    public function withStatus(Status|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
