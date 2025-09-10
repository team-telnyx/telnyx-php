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
 * @phpstan-type filter_alias = array{
 *   countryCode?: string|null,
 *   locality?: string|null,
 *   nationalDestinationCode?: string|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter phone numbers by country.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Filter phone numbers by city.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * Filter by the national destination code of the number.
     */
    #[Api('national_destination_code', optional: true)]
    public ?string $nationalDestinationCode;

    /**
     * Filter phone numbers by number type.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public static function with(
        ?string $countryCode = null,
        ?string $locality = null,
        ?string $nationalDestinationCode = null,
        PhoneNumberType|string|null $phoneNumberType = null,
    ): self {
        $obj = new self;

        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $locality && $obj->locality = $locality;
        null !== $nationalDestinationCode && $obj->nationalDestinationCode = $nationalDestinationCode;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;

        return $obj;
    }

    /**
     * Filter phone numbers by country.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

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
        $obj->nationalDestinationCode = $nationalDestinationCode;

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
        $obj->phoneNumberType = $phoneNumberType instanceof PhoneNumberType ? $phoneNumberType->value : $phoneNumberType;

        return $obj;
    }
}
