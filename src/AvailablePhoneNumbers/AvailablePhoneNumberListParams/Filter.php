<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\Feature;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\PhoneNumber;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\PhoneNumberType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[locality], filter[administrative_area], filter[country_code], filter[national_destination_code], filter[rate_center], filter[phone_number_type], filter[features], filter[limit], filter[best_effort], filter[quickship], filter[reservable], filter[exclude_held_numbers].
 *
 * @phpstan-type filter_alias = array{
 *   administrativeArea?: string,
 *   bestEffort?: bool,
 *   countryCode?: string,
 *   excludeHeldNumbers?: bool,
 *   features?: list<value-of<Feature>>,
 *   limit?: int,
 *   locality?: string,
 *   nationalDestinationCode?: string,
 *   phoneNumber?: PhoneNumber,
 *   phoneNumberType?: value-of<PhoneNumberType>,
 *   quickship?: bool,
 *   rateCenter?: string,
 *   reservable?: bool,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Find numbers in a particular US state or CA province.
     */
    #[Api('administrative_area', optional: true)]
    public ?string $administrativeArea;

    /**
     * Filter to determine if best effort results should be included. Only available in USA/CANADA.
     */
    #[Api('best_effort', optional: true)]
    public ?bool $bestEffort;

    /**
     * Filter phone numbers by country.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    #[Api('exclude_held_numbers', optional: true)]
    public ?bool $excludeHeldNumbers;

    /**
     * Filter phone numbers with specific features.
     *
     * @var list<value-of<Feature>>|null $features
     */
    #[Api(list: Feature::class, optional: true)]
    public ?array $features;

    /**
     * Limits the number of results.
     */
    #[Api(optional: true)]
    public ?int $limit;

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
     * Filter phone numbers by pattern matching.
     */
    #[Api('phone_number', optional: true)]
    public ?PhoneNumber $phoneNumber;

    /**
     * Filter phone numbers by number type.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * Filter to exclude phone numbers that need additional time after to purchase to activate. Only applicable for +1 toll_free numbers.
     */
    #[Api(optional: true)]
    public ?bool $quickship;

    /**
     * Filter phone numbers by rate center. This filter is only applicable to USA and Canada numbers.
     */
    #[Api('rate_center', optional: true)]
    public ?string $rateCenter;

    /**
     * Filter to ensure only numbers that can be reserved are included in the results.
     */
    #[Api(optional: true)]
    public ?bool $reservable;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Feature|value-of<Feature>> $features
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public static function with(
        ?string $administrativeArea = null,
        ?bool $bestEffort = null,
        ?string $countryCode = null,
        ?bool $excludeHeldNumbers = null,
        ?array $features = null,
        ?int $limit = null,
        ?string $locality = null,
        ?string $nationalDestinationCode = null,
        ?PhoneNumber $phoneNumber = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?bool $quickship = null,
        ?string $rateCenter = null,
        ?bool $reservable = null,
    ): self {
        $obj = new self;

        null !== $administrativeArea && $obj->administrativeArea = $administrativeArea;
        null !== $bestEffort && $obj->bestEffort = $bestEffort;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $excludeHeldNumbers && $obj->excludeHeldNumbers = $excludeHeldNumbers;
        null !== $features && $obj['features'] = $features;
        null !== $limit && $obj->limit = $limit;
        null !== $locality && $obj->locality = $locality;
        null !== $nationalDestinationCode && $obj->nationalDestinationCode = $nationalDestinationCode;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $quickship && $obj->quickship = $quickship;
        null !== $rateCenter && $obj->rateCenter = $rateCenter;
        null !== $reservable && $obj->reservable = $reservable;

        return $obj;
    }

    /**
     * Find numbers in a particular US state or CA province.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrativeArea = $administrativeArea;

        return $obj;
    }

    /**
     * Filter to determine if best effort results should be included. Only available in USA/CANADA.
     */
    public function withBestEffort(bool $bestEffort): self
    {
        $obj = clone $this;
        $obj->bestEffort = $bestEffort;

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
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    public function withExcludeHeldNumbers(bool $excludeHeldNumbers): self
    {
        $obj = clone $this;
        $obj->excludeHeldNumbers = $excludeHeldNumbers;

        return $obj;
    }

    /**
     * Filter phone numbers with specific features.
     *
     * @param list<Feature|value-of<Feature>> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj['features'] = $features;

        return $obj;
    }

    /**
     * Limits the number of results.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

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
     * Filter phone numbers by pattern matching.
     */
    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

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
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Filter to exclude phone numbers that need additional time after to purchase to activate. Only applicable for +1 toll_free numbers.
     */
    public function withQuickship(bool $quickship): self
    {
        $obj = clone $this;
        $obj->quickship = $quickship;

        return $obj;
    }

    /**
     * Filter phone numbers by rate center. This filter is only applicable to USA and Canada numbers.
     */
    public function withRateCenter(string $rateCenter): self
    {
        $obj = clone $this;
        $obj->rateCenter = $rateCenter;

        return $obj;
    }

    /**
     * Filter to ensure only numbers that can be reserved are included in the results.
     */
    public function withReservable(bool $reservable): self
    {
        $obj = clone $this;
        $obj->reservable = $reservable;

        return $obj;
    }
}
