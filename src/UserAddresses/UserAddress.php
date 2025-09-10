<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type user_address = array{
 *   id?: string|null,
 *   administrativeArea?: string|null,
 *   borough?: string|null,
 *   businessName?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: string|null,
 *   customerReference?: string|null,
 *   extendedAddress?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   locality?: string|null,
 *   neighborhood?: string|null,
 *   phoneNumber?: string|null,
 *   postalCode?: string|null,
 *   recordType?: string|null,
 *   streetAddress?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class UserAddress implements BaseModel
{
    /** @use SdkModel<user_address> */
    use SdkModel;

    /**
     * Uniquely identifies the user address.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    #[Api('administrative_area', optional: true)]
    public ?string $administrativeArea;

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Api(optional: true)]
    public ?string $borough;

    /**
     * The business name associated with the user address.
     */
    #[Api('business_name', optional: true)]
    public ?string $businessName;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    #[Api('extended_address', optional: true)]
    public ?string $extendedAddress;

    /**
     * The first name associated with the user address.
     */
    #[Api('first_name', optional: true)]
    public ?string $firstName;

    /**
     * The last name associated with the user address.
     */
    #[Api('last_name', optional: true)]
    public ?string $lastName;

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Api(optional: true)]
    public ?string $neighborhood;

    /**
     * The phone number associated with the user address.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * The postal code of the user address.
     */
    #[Api('postal_code', optional: true)]
    public ?string $postalCode;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The primary street address information about the user address.
     */
    #[Api('street_address', optional: true)]
    public ?string $streetAddress;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

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
        ?string $id = null,
        ?string $administrativeArea = null,
        ?string $borough = null,
        ?string $businessName = null,
        ?string $countryCode = null,
        ?string $createdAt = null,
        ?string $customerReference = null,
        ?string $extendedAddress = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $locality = null,
        ?string $neighborhood = null,
        ?string $phoneNumber = null,
        ?string $postalCode = null,
        ?string $recordType = null,
        ?string $streetAddress = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $administrativeArea && $obj->administrativeArea = $administrativeArea;
        null !== $borough && $obj->borough = $borough;
        null !== $businessName && $obj->businessName = $businessName;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $extendedAddress && $obj->extendedAddress = $extendedAddress;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $locality && $obj->locality = $locality;
        null !== $neighborhood && $obj->neighborhood = $neighborhood;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $postalCode && $obj->postalCode = $postalCode;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $streetAddress && $obj->streetAddress = $streetAddress;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the user address.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrativeArea = $administrativeArea;

        return $obj;
    }

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withBorough(string $borough): self
    {
        $obj = clone $this;
        $obj->borough = $borough;

        return $obj;
    }

    /**
     * The business name associated with the user address.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj->businessName = $businessName;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj->extendedAddress = $extendedAddress;

        return $obj;
    }

    /**
     * The first name associated with the user address.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * The last name associated with the user address.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withNeighborhood(string $neighborhood): self
    {
        $obj = clone $this;
        $obj->neighborhood = $neighborhood;

        return $obj;
    }

    /**
     * The phone number associated with the user address.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The postal code of the user address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj->postalCode = $postalCode;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The primary street address information about the user address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj->streetAddress = $streetAddress;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
