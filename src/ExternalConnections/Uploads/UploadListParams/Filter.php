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
        $self = new self;

        null !== $civicAddressID && $self['civicAddressID'] = $civicAddressID;
        null !== $locationID && $self['locationID'] = $locationID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $status && $self['status'] = $status;

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

    /**
     * @param Status|array{eq?: list<value-of<Eq>>|null} $status
     */
    public function withStatus(Status|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
