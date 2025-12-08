<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\UploadListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter\CivicAddressID;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter\LocationID;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter\PhoneNumber;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter\Status;
use Telnyx\ExternalConnections\Uploads\UploadListParams\Filter\Status\Eq;

/**
 * Filter parameter for uploads (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
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

    #[Optional]
    public ?CivicAddressID $civic_address_id;

    #[Optional]
    public ?LocationID $location_id;

    #[Optional]
    public ?PhoneNumber $phone_number;

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
     * @param CivicAddressID|array{eq?: string|null} $civic_address_id
     * @param LocationID|array{eq?: string|null} $location_id
     * @param PhoneNumber|array{contains?: string|null, eq?: string|null} $phone_number
     * @param Status|array{eq?: list<value-of<Eq>>|null} $status
     */
    public static function with(
        CivicAddressID|array|null $civic_address_id = null,
        LocationID|array|null $location_id = null,
        PhoneNumber|array|null $phone_number = null,
        Status|array|null $status = null,
    ): self {
        $obj = new self;

        null !== $civic_address_id && $obj['civic_address_id'] = $civic_address_id;
        null !== $location_id && $obj['location_id'] = $location_id;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
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
