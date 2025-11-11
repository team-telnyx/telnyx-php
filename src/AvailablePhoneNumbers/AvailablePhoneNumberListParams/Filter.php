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
 * @phpstan-type FilterShape = array{
 *   administrative_area?: string|null,
 *   best_effort?: bool|null,
 *   country_code?: string|null,
 *   exclude_held_numbers?: bool|null,
 *   features?: list<value-of<Feature>>|null,
 *   limit?: int|null,
 *   locality?: string|null,
 *   national_destination_code?: string|null,
 *   phone_number?: PhoneNumber|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   quickship?: bool|null,
 *   rate_center?: string|null,
 *   reservable?: bool|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Find numbers in a particular US state or CA province.
     */
    #[Api(optional: true)]
    public ?string $administrative_area;

    /**
     * Filter to determine if best effort results should be included. Only available in USA/CANADA.
     */
    #[Api(optional: true)]
    public ?bool $best_effort;

    /**
     * Filter phone numbers by country.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    #[Api(optional: true)]
    public ?bool $exclude_held_numbers;

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
    #[Api(optional: true)]
    public ?string $national_destination_code;

    /**
     * Filter phone numbers by pattern matching.
     */
    #[Api(optional: true)]
    public ?PhoneNumber $phone_number;

    /**
     * Filter phone numbers by number type.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    /**
     * Filter to exclude phone numbers that need additional time after to purchase to activate. Only applicable for +1 toll_free numbers.
     */
    #[Api(optional: true)]
    public ?bool $quickship;

    /**
     * Filter phone numbers by rate center. This filter is only applicable to USA and Canada numbers.
     */
    #[Api(optional: true)]
    public ?string $rate_center;

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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     */
    public static function with(
        ?string $administrative_area = null,
        ?bool $best_effort = null,
        ?string $country_code = null,
        ?bool $exclude_held_numbers = null,
        ?array $features = null,
        ?int $limit = null,
        ?string $locality = null,
        ?string $national_destination_code = null,
        ?PhoneNumber $phone_number = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?bool $quickship = null,
        ?string $rate_center = null,
        ?bool $reservable = null,
    ): self {
        $obj = new self;

        null !== $administrative_area && $obj->administrative_area = $administrative_area;
        null !== $best_effort && $obj->best_effort = $best_effort;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $exclude_held_numbers && $obj->exclude_held_numbers = $exclude_held_numbers;
        null !== $features && $obj['features'] = $features;
        null !== $limit && $obj->limit = $limit;
        null !== $locality && $obj->locality = $locality;
        null !== $national_destination_code && $obj->national_destination_code = $national_destination_code;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $quickship && $obj->quickship = $quickship;
        null !== $rate_center && $obj->rate_center = $rate_center;
        null !== $reservable && $obj->reservable = $reservable;

        return $obj;
    }

    /**
     * Find numbers in a particular US state or CA province.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrative_area = $administrativeArea;

        return $obj;
    }

    /**
     * Filter to determine if best effort results should be included. Only available in USA/CANADA.
     */
    public function withBestEffort(bool $bestEffort): self
    {
        $obj = clone $this;
        $obj->best_effort = $bestEffort;

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
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    public function withExcludeHeldNumbers(bool $excludeHeldNumbers): self
    {
        $obj = clone $this;
        $obj->exclude_held_numbers = $excludeHeldNumbers;

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
        $obj->national_destination_code = $nationalDestinationCode;

        return $obj;
    }

    /**
     * Filter phone numbers by pattern matching.
     */
    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

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
        $obj->rate_center = $rateCenter;

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
