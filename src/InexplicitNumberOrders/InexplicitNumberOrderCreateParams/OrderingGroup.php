<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\CountryISO;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\PhoneNumber;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\Strategy;

/**
 * @phpstan-type OrderingGroupShape = array{
 *   countRequested: string,
 *   countryISO: value-of<CountryISO>,
 *   phoneNumberType: string,
 *   administrativeArea?: string|null,
 *   excludeHeldNumbers?: bool|null,
 *   features?: list<string>|null,
 *   locality?: string|null,
 *   nationalDestinationCode?: string|null,
 *   phoneNumber?: PhoneNumber|null,
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
    #[Required('count_requested')]
    public string $countRequested;

    /**
     * Country where you would like to purchase phone numbers. Allowable values: US, CA.
     *
     * @var value-of<CountryISO> $countryISO
     */
    #[Required('country_iso', enum: CountryISO::class)]
    public string $countryISO;

    /**
     * Number type (local, toll-free, etc.).
     */
    #[Required('phone_number_type')]
    public string $phoneNumberType;

    /**
     * Filter for phone numbers in a given state / province.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    #[Optional('exclude_held_numbers')]
    public ?bool $excludeHeldNumbers;

    /**
     * Filter for phone numbers that have the features to satisfy your use case (e.g., ["voice"]).
     *
     * @var list<string>|null $features
     */
    #[Optional(list: 'string')]
    public ?array $features;

    /**
     * Filter for phone numbers in a given city / region / rate center.
     */
    #[Optional]
    public ?string $locality;

    /**
     * Filter by area code.
     */
    #[Optional('national_destination_code')]
    public ?string $nationalDestinationCode;

    /**
     * Phone number search criteria.
     */
    #[Optional('phone_number')]
    public ?PhoneNumber $phoneNumber;

    /**
     * Filter to exclude phone numbers that need additional time after to purchase to activate. Only applicable for +1 toll_free numbers.
     */
    #[Optional]
    public ?bool $quickship;

    /**
     * Ordering strategy. Define what action should be taken if we don't have enough phone numbers to fulfill your request. Allowable values are: always = proceed with ordering phone numbers, regardless of current inventory levels; never = do not place any orders unless there are enough phone numbers to satisfy the request. If not specified, the always strategy will be enforced.
     *
     * @var value-of<Strategy>|null $strategy
     */
    #[Optional(enum: Strategy::class)]
    public ?string $strategy;

    /**
     * `new OrderingGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OrderingGroup::with(countRequested: ..., countryISO: ..., phoneNumberType: ...)
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
     * @param CountryISO|value-of<CountryISO> $countryISO
     * @param list<string> $features
     * @param PhoneNumber|array{
     *   contains?: string|null, endsWith?: string|null, startsWith?: string|null
     * } $phoneNumber
     * @param Strategy|value-of<Strategy> $strategy
     */
    public static function with(
        string $countRequested,
        CountryISO|string $countryISO,
        string $phoneNumberType,
        ?string $administrativeArea = null,
        ?bool $excludeHeldNumbers = null,
        ?array $features = null,
        ?string $locality = null,
        ?string $nationalDestinationCode = null,
        PhoneNumber|array|null $phoneNumber = null,
        ?bool $quickship = null,
        Strategy|string|null $strategy = null,
    ): self {
        $obj = new self;

        $obj['countRequested'] = $countRequested;
        $obj['countryISO'] = $countryISO;
        $obj['phoneNumberType'] = $phoneNumberType;

        null !== $administrativeArea && $obj['administrativeArea'] = $administrativeArea;
        null !== $excludeHeldNumbers && $obj['excludeHeldNumbers'] = $excludeHeldNumbers;
        null !== $features && $obj['features'] = $features;
        null !== $locality && $obj['locality'] = $locality;
        null !== $nationalDestinationCode && $obj['nationalDestinationCode'] = $nationalDestinationCode;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $quickship && $obj['quickship'] = $quickship;
        null !== $strategy && $obj['strategy'] = $strategy;

        return $obj;
    }

    /**
     * Quantity of phone numbers to order.
     */
    public function withCountRequested(string $countRequested): self
    {
        $obj = clone $this;
        $obj['countRequested'] = $countRequested;

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
        $obj['countryISO'] = $countryISO;

        return $obj;
    }

    /**
     * Number type (local, toll-free, etc.).
     */
    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Filter for phone numbers in a given state / province.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrativeArea'] = $administrativeArea;

        return $obj;
    }

    /**
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    public function withExcludeHeldNumbers(bool $excludeHeldNumbers): self
    {
        $obj = clone $this;
        $obj['excludeHeldNumbers'] = $excludeHeldNumbers;

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
        $obj['features'] = $features;

        return $obj;
    }

    /**
     * Filter for phone numbers in a given city / region / rate center.
     */
    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    /**
     * Filter by area code.
     */
    public function withNationalDestinationCode(
        string $nationalDestinationCode
    ): self {
        $obj = clone $this;
        $obj['nationalDestinationCode'] = $nationalDestinationCode;

        return $obj;
    }

    /**
     * Phone number search criteria.
     *
     * @param PhoneNumber|array{
     *   contains?: string|null, endsWith?: string|null, startsWith?: string|null
     * } $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Filter to exclude phone numbers that need additional time after to purchase to activate. Only applicable for +1 toll_free numbers.
     */
    public function withQuickship(bool $quickship): self
    {
        $obj = clone $this;
        $obj['quickship'] = $quickship;

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
