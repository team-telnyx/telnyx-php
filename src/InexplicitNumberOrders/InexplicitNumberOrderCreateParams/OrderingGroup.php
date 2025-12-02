<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\CountryISO;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\PhoneNumber;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\Strategy;

/**
 * @phpstan-type OrderingGroupShape = array{
 *   count_requested: string,
 *   country_iso: value-of<CountryISO>,
 *   phone_number_type: string,
 *   administrative_area?: string|null,
 *   exclude_held_numbers?: bool|null,
 *   features?: list<string>|null,
 *   locality?: string|null,
 *   national_destination_code?: string|null,
 *   phone_number?: PhoneNumber|null,
 *   quickship?: bool|null,
 *   strategy?: value-of<Strategy>|null,
 * }
 */
final class OrderingGroup implements BaseModel
{
    /** @use SdkModel<OrderingGroupShape> */
    use SdkModel;

    /**
     * Quantity of phone numbers to order.
     */
    #[Api]
    public string $count_requested;

    /**
     * Country where you would like to purchase phone numbers. Allowable values: US, CA.
     *
     * @var value-of<CountryISO> $country_iso
     */
    #[Api(enum: CountryISO::class)]
    public string $country_iso;

    /**
     * Number type (local, toll-free, etc.).
     */
    #[Api]
    public string $phone_number_type;

    /**
     * Filter for phone numbers in a given state / province.
     */
    #[Api(optional: true)]
    public ?string $administrative_area;

    /**
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    #[Api(optional: true)]
    public ?bool $exclude_held_numbers;

    /**
     * Filter for phone numbers that have the features to satisfy your use case (e.g., ["voice"]).
     *
     * @var list<string>|null $features
     */
    #[Api(list: 'string', optional: true)]
    public ?array $features;

    /**
     * Filter for phone numbers in a given city / region / rate center.
     */
    #[Api(optional: true)]
    public ?string $locality;

    /**
     * Filter by area code.
     */
    #[Api(optional: true)]
    public ?string $national_destination_code;

    /**
     * Phone number search criteria.
     */
    #[Api(optional: true)]
    public ?PhoneNumber $phone_number;

    /**
     * Filter to exclude phone numbers that need additional time after to purchase to activate. Only applicable for +1 toll_free numbers.
     */
    #[Api(optional: true)]
    public ?bool $quickship;

    /**
     * Ordering strategy. Define what action should be taken if we don't have enough phone numbers to fulfill your request. Allowable values are: always = proceed with ordering phone numbers, regardless of current inventory levels; never = do not place any orders unless there are enough phone numbers to satisfy the request. If not specified, the always strategy will be enforced.
     *
     * @var value-of<Strategy>|null $strategy
     */
    #[Api(enum: Strategy::class, optional: true)]
    public ?string $strategy;

    /**
     * `new OrderingGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OrderingGroup::with(
     *   count_requested: ..., country_iso: ..., phone_number_type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OrderingGroup)
     *   ->withCountRequested(...)
     *   ->withCountryISO(...)
     *   ->withPhoneNumberType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CountryISO|value-of<CountryISO> $country_iso
     * @param list<string> $features
     * @param Strategy|value-of<Strategy> $strategy
     */
    public static function with(
        string $count_requested,
        CountryISO|string $country_iso,
        string $phone_number_type,
        ?string $administrative_area = null,
        ?bool $exclude_held_numbers = null,
        ?array $features = null,
        ?string $locality = null,
        ?string $national_destination_code = null,
        ?PhoneNumber $phone_number = null,
        ?bool $quickship = null,
        Strategy|string|null $strategy = null,
    ): self {
        $obj = new self;

        $obj->count_requested = $count_requested;
        $obj['country_iso'] = $country_iso;
        $obj->phone_number_type = $phone_number_type;

        null !== $administrative_area && $obj->administrative_area = $administrative_area;
        null !== $exclude_held_numbers && $obj->exclude_held_numbers = $exclude_held_numbers;
        null !== $features && $obj->features = $features;
        null !== $locality && $obj->locality = $locality;
        null !== $national_destination_code && $obj->national_destination_code = $national_destination_code;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $quickship && $obj->quickship = $quickship;
        null !== $strategy && $obj['strategy'] = $strategy;

        return $obj;
    }

    /**
     * Quantity of phone numbers to order.
     */
    public function withCountRequested(string $countRequested): self
    {
        $obj = clone $this;
        $obj->count_requested = $countRequested;

        return $obj;
    }

    /**
     * Country where you would like to purchase phone numbers. Allowable values: US, CA.
     *
     * @param CountryISO|value-of<CountryISO> $countryISO
     */
    public function withCountryISO(CountryISO|string $countryISO): self
    {
        $obj = clone $this;
        $obj['country_iso'] = $countryISO;

        return $obj;
    }

    /**
     * Number type (local, toll-free, etc.).
     */
    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj->phone_number_type = $phoneNumberType;

        return $obj;
    }

    /**
     * Filter for phone numbers in a given state / province.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrative_area = $administrativeArea;

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
     * Filter for phone numbers that have the features to satisfy your use case (e.g., ["voice"]).
     *
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj->features = $features;

        return $obj;
    }

    /**
     * Filter for phone numbers in a given city / region / rate center.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj->locality = $locality;

        return $obj;
    }

    /**
     * Filter by area code.
     */
    public function withNationalDestinationCode(
        string $nationalDestinationCode
    ): self {
        $obj = clone $this;
        $obj->national_destination_code = $nationalDestinationCode;

        return $obj;
    }

    /**
     * Phone number search criteria.
     */
    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

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
     * Ordering strategy. Define what action should be taken if we don't have enough phone numbers to fulfill your request. Allowable values are: always = proceed with ordering phone numbers, regardless of current inventory levels; never = do not place any orders unless there are enough phone numbers to satisfy the request. If not specified, the always strategy will be enforced.
     *
     * @param Strategy|value-of<Strategy> $strategy
     */
    public function withStrategy(Strategy|string $strategy): self
    {
        $obj = clone $this;
        $obj['strategy'] = $strategy;

        return $obj;
    }
}
