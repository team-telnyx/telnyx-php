<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter\PhoneNumberType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type].
 *
 * @phpstan-type FilterShape = array{
 *   country_code?: string|null,
 *   locality?: string|null,
 *   national_destination_code?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter phone numbers by country.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Filter phone numbers by city.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * Filter by the national destination code of the number.
     */
    #[Api(optional: true)]
    public ?string $national_destination_code;

    /**
     * Filter phone numbers by number type.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     */
    public static function with(
        ?string $country_code = null,
        ?string $locality = null,
        ?string $national_destination_code = null,
        PhoneNumberType|string|null $phone_number_type = null,
    ): self {
        $obj = new self;

        null !== $country_code && $obj->country_code = $country_code;
        null !== $locality && $obj->locality = $locality;
        null !== $national_destination_code && $obj->national_destination_code = $national_destination_code;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;

        return $obj;
    }

    /**
     * Filter phone numbers by country.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    /**
     * Filter phone numbers by city.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * Filter by the national destination code of the number.
     */
    public function withNationalDestinationCode(
        string $nationalDestinationCode
    ): self {
        $obj = clone $this;
        $obj->national_destination_code = $nationalDestinationCode;

        return $obj;
    }

    /**
     * Filter phone numbers by number type.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }
}
