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
 * @phpstan-import-type PhoneNumberShape from \Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup\PhoneNumber
 *
 * @phpstan-type OrderingGroupShape = array{
 *   countRequested: string,
 *   countryISO: CountryISO|value-of<CountryISO>,
 *   phoneNumberType: string,
 *   administrativeArea?: string|null,
 *   excludeHeldNumbers?: bool|null,
 *   features?: list<string>|null,
 *   locality?: string|null,
 *   nationalDestinationCode?: string|null,
 *   phoneNumber?: null|PhoneNumber|PhoneNumberShape,
 *   quickship?: bool|null,
 *   strategy?: null|Strategy|value-of<Strategy>,
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
     * @param PhoneNumberShape $phoneNumber
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
        $self = new self;

        $self['countRequested'] = $countRequested;
        $self['countryISO'] = $countryISO;
        $self['phoneNumberType'] = $phoneNumberType;

        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $excludeHeldNumbers && $self['excludeHeldNumbers'] = $excludeHeldNumbers;
        null !== $features && $self['features'] = $features;
        null !== $locality && $self['locality'] = $locality;
        null !== $nationalDestinationCode && $self['nationalDestinationCode'] = $nationalDestinationCode;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $quickship && $self['quickship'] = $quickship;
        null !== $strategy && $self['strategy'] = $strategy;

        return $self;
    }

    /**
     * Quantity of phone numbers to order.
     */
    public function withCountRequested(string $countRequested): self
    {
        $self = clone $this;
        $self['countRequested'] = $countRequested;

        return $self;
    }

    /**
     * Country where you would like to purchase phone numbers. Allowable values: US, CA.
     *
     * @param CountryISO|value-of<CountryISO> $countryISO
     */
    public function withCountryISO(CountryISO|string $countryISO): self
    {
        $self = clone $this;
        $self['countryISO'] = $countryISO;

        return $self;
    }

    /**
     * Number type (local, toll-free, etc.).
     */
    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Filter for phone numbers in a given state / province.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    public function withExcludeHeldNumbers(bool $excludeHeldNumbers): self
    {
        $self = clone $this;
        $self['excludeHeldNumbers'] = $excludeHeldNumbers;

        return $self;
    }

    /**
     * Filter for phone numbers that have the features to satisfy your use case (e.g., ["voice"]).
     *
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $self = clone $this;
        $self['features'] = $features;

        return $self;
    }

    /**
     * Filter for phone numbers in a given city / region / rate center.
     */
    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    /**
     * Filter by area code.
     */
    public function withNationalDestinationCode(
        string $nationalDestinationCode
    ): self {
        $self = clone $this;
        $self['nationalDestinationCode'] = $nationalDestinationCode;

        return $self;
    }

    /**
     * Phone number search criteria.
     *
     * @param PhoneNumberShape $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Filter to exclude phone numbers that need additional time after to purchase to activate. Only applicable for +1 toll_free numbers.
     */
    public function withQuickship(bool $quickship): self
    {
        $self = clone $this;
        $self['quickship'] = $quickship;

        return $self;
    }

    /**
     * Ordering strategy. Define what action should be taken if we don't have enough phone numbers to fulfill your request. Allowable values are: always = proceed with ordering phone numbers, regardless of current inventory levels; never = do not place any orders unless there are enough phone numbers to satisfy the request. If not specified, the always strategy will be enforced.
     *
     * @param Strategy|value-of<Strategy> $strategy
     */
    public function withStrategy(Strategy|string $strategy): self
    {
        $self = clone $this;
        $self['strategy'] = $strategy;

        return $self;
    }
}
