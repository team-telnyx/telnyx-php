<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserAddressShape = array{
 *   id?: string|null,
 *   administrative_area?: string|null,
 *   borough?: string|null,
 *   business_name?: string|null,
 *   country_code?: string|null,
 *   created_at?: string|null,
 *   customer_reference?: string|null,
 *   extended_address?: string|null,
 *   first_name?: string|null,
 *   last_name?: string|null,
 *   locality?: string|null,
 *   neighborhood?: string|null,
 *   phone_number?: string|null,
 *   postal_code?: string|null,
 *   record_type?: string|null,
 *   street_address?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class UserAddress implements BaseModel
{
    /** @use SdkModel<UserAddressShape> */
    use SdkModel;

    /**
     * Uniquely identifies the user address.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    #[Api(optional: true)]
    public ?string $administrative_area;

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    #[Api(optional: true)]
    public ?string $borough;

    /**
     * The business name associated with the user address.
     */
    #[Api(optional: true)]
    public ?string $business_name;

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    #[Api(optional: true)]
    public ?string $extended_address;

    /**
     * The first name associated with the user address.
     */
    #[Api(optional: true)]
    public ?string $first_name;

    /**
     * The last name associated with the user address.
     */
    #[Api(optional: true)]
    public ?string $last_name;

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
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * The postal code of the user address.
     */
    #[Api(optional: true)]
    public ?string $postal_code;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The primary street address information about the user address.
     */
    #[Api(optional: true)]
    public ?string $street_address;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

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
        ?string $administrative_area = null,
        ?string $borough = null,
        ?string $business_name = null,
        ?string $country_code = null,
        ?string $created_at = null,
        ?string $customer_reference = null,
        ?string $extended_address = null,
        ?string $first_name = null,
        ?string $last_name = null,
        ?string $locality = null,
        ?string $neighborhood = null,
        ?string $phone_number = null,
        ?string $postal_code = null,
        ?string $record_type = null,
        ?string $street_address = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $administrative_area && $obj['administrative_area'] = $administrative_area;
        null !== $borough && $obj['borough'] = $borough;
        null !== $business_name && $obj['business_name'] = $business_name;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $extended_address && $obj['extended_address'] = $extended_address;
        null !== $first_name && $obj['first_name'] = $first_name;
        null !== $last_name && $obj['last_name'] = $last_name;
        null !== $locality && $obj['locality'] = $locality;
        null !== $neighborhood && $obj['neighborhood'] = $neighborhood;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $postal_code && $obj['postal_code'] = $postal_code;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $street_address && $obj['street_address'] = $street_address;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies the user address.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the state of the address.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrative_area'] = $administrativeArea;

        return $obj;
    }

    /**
     * The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withBorough(string $borough): self
    {
        $obj = clone $this;
        $obj['borough'] = $borough;

        return $obj;
    }

    /**
     * The business name associated with the user address.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj['business_name'] = $businessName;

        return $obj;
    }

    /**
     * The two-character (ISO 3166-1 alpha-2) country code of the user address.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * Additional street address information about the user address such as, but not limited to, unit number or apartment number.
     */
    public function withExtendedAddress(string $extendedAddress): self
    {
        $obj = clone $this;
        $obj['extended_address'] = $extendedAddress;

        return $obj;
    }

    /**
     * The first name associated with the user address.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * The last name associated with the user address.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

        return $obj;
    }

    /**
     * The locality of the user address. For US addresses, this corresponds to the city of the address.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    /**
     * The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     */
    public function withNeighborhood(string $neighborhood): self
    {
        $obj = clone $this;
        $obj['neighborhood'] = $neighborhood;

        return $obj;
    }

    /**
     * The phone number associated with the user address.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * The postal code of the user address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $obj = clone $this;
        $obj['postal_code'] = $postalCode;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The primary street address information about the user address.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $obj = clone $this;
        $obj['street_address'] = $streetAddress;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
