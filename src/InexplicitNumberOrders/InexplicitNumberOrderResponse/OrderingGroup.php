<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse\OrderingGroup\Order;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse\OrderingGroup\Status;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse\OrderingGroup\Strategy;

/**
 * @phpstan-import-type OrderShape from \Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse\OrderingGroup\Order
 *
 * @phpstan-type OrderingGroupShape = array{
 *   administrativeArea?: string|null,
 *   countAllocated?: int|null,
 *   countRequested?: int|null,
 *   countryISO?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   errorReason?: string|null,
 *   excludeHeldNumbers?: bool|null,
 *   nationalDestinationCode?: string|null,
 *   orders?: list<OrderShape>|null,
 *   phoneNumberType?: string|null,
 *   phoneNumberContains?: string|null,
 *   phoneNumberEndsWith?: string|null,
 *   phoneNumberStartsWith?: string|null,
 *   quickship?: bool|null,
 *   status?: null|Status|value-of<Status>,
 *   strategy?: null|Strategy|value-of<Strategy>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class OrderingGroup implements BaseModel
{
    /** @use SdkModel<OrderingGroupShape> */
    use SdkModel;

    /**
     * Filter for phone numbers in a given state / province.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * Quantity of phone numbers allocated.
     */
    #[Optional('count_allocated')]
    public ?int $countAllocated;

    /**
     * Quantity of phone numbers requested.
     */
    #[Optional('count_requested')]
    public ?int $countRequested;

    /**
     * Country where you would like to purchase phone numbers.
     */
    #[Optional('country_iso')]
    public ?string $countryISO;

    /**
     * ISO 8601 formatted date indicating when the ordering group was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Error reason if applicable.
     */
    #[Optional('error_reason')]
    public ?string $errorReason;

    /**
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    #[Optional('exclude_held_numbers')]
    public ?bool $excludeHeldNumbers;

    /**
     * Filter by area code.
     */
    #[Optional('national_destination_code')]
    public ?string $nationalDestinationCode;

    /**
     * Array of orders created to fulfill the inexplicit order.
     *
     * @var list<Order>|null $orders
     */
    #[Optional(list: Order::class)]
    public ?array $orders;

    /**
     * Number type.
     */
    #[Optional('phone_number_type')]
    public ?string $phoneNumberType;

    /**
     * Filter for phone numbers that contain the digits specified.
     */
    #[Optional('phone_number[contains]')]
    public ?string $phoneNumberContains;

    /**
     * Filter by the ending digits of the phone number.
     */
    #[Optional('phone_number[ends_with]')]
    public ?string $phoneNumberEndsWith;

    /**
     * Filter by the starting digits of the phone number.
     */
    #[Optional('phone_number[starts_with]')]
    public ?string $phoneNumberStartsWith;

    /**
     * Filter to exclude phone numbers that need additional time after to purchase to activate. Only applicable for +1 toll_free numbers.
     */
    #[Optional]
    public ?bool $quickship;

    /**
     * Status of the ordering group.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Ordering strategy used.
     *
     * @var value-of<Strategy>|null $strategy
     */
    #[Optional(enum: Strategy::class)]
    public ?string $strategy;

    /**
     * ISO 8601 formatted date indicating when the ordering group was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<OrderShape> $orders
     * @param Status|value-of<Status> $status
     * @param Strategy|value-of<Strategy> $strategy
     */
    public static function with(
        ?string $administrativeArea = null,
        ?int $countAllocated = null,
        ?int $countRequested = null,
        ?string $countryISO = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $errorReason = null,
        ?bool $excludeHeldNumbers = null,
        ?string $nationalDestinationCode = null,
        ?array $orders = null,
        ?string $phoneNumberType = null,
        ?string $phoneNumberContains = null,
        ?string $phoneNumberEndsWith = null,
        ?string $phoneNumberStartsWith = null,
        ?bool $quickship = null,
        Status|string|null $status = null,
        Strategy|string|null $strategy = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $countAllocated && $self['countAllocated'] = $countAllocated;
        null !== $countRequested && $self['countRequested'] = $countRequested;
        null !== $countryISO && $self['countryISO'] = $countryISO;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $errorReason && $self['errorReason'] = $errorReason;
        null !== $excludeHeldNumbers && $self['excludeHeldNumbers'] = $excludeHeldNumbers;
        null !== $nationalDestinationCode && $self['nationalDestinationCode'] = $nationalDestinationCode;
        null !== $orders && $self['orders'] = $orders;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $phoneNumberContains && $self['phoneNumberContains'] = $phoneNumberContains;
        null !== $phoneNumberEndsWith && $self['phoneNumberEndsWith'] = $phoneNumberEndsWith;
        null !== $phoneNumberStartsWith && $self['phoneNumberStartsWith'] = $phoneNumberStartsWith;
        null !== $quickship && $self['quickship'] = $quickship;
        null !== $status && $self['status'] = $status;
        null !== $strategy && $self['strategy'] = $strategy;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

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
     * Quantity of phone numbers allocated.
     */
    public function withCountAllocated(int $countAllocated): self
    {
        $self = clone $this;
        $self['countAllocated'] = $countAllocated;

        return $self;
    }

    /**
     * Quantity of phone numbers requested.
     */
    public function withCountRequested(int $countRequested): self
    {
        $self = clone $this;
        $self['countRequested'] = $countRequested;

        return $self;
    }

    /**
     * Country where you would like to purchase phone numbers.
     */
    public function withCountryISO(string $countryISO): self
    {
        $self = clone $this;
        $self['countryISO'] = $countryISO;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the ordering group was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Error reason if applicable.
     */
    public function withErrorReason(string $errorReason): self
    {
        $self = clone $this;
        $self['errorReason'] = $errorReason;

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
     * Array of orders created to fulfill the inexplicit order.
     *
     * @param list<OrderShape> $orders
     */
    public function withOrders(array $orders): self
    {
        $self = clone $this;
        $self['orders'] = $orders;

        return $self;
    }

    /**
     * Number type.
     */
    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Filter for phone numbers that contain the digits specified.
     */
    public function withPhoneNumberContains(string $phoneNumberContains): self
    {
        $self = clone $this;
        $self['phoneNumberContains'] = $phoneNumberContains;

        return $self;
    }

    /**
     * Filter by the ending digits of the phone number.
     */
    public function withPhoneNumberEndsWith(string $phoneNumberEndsWith): self
    {
        $self = clone $this;
        $self['phoneNumberEndsWith'] = $phoneNumberEndsWith;

        return $self;
    }

    /**
     * Filter by the starting digits of the phone number.
     */
    public function withPhoneNumberStartsWith(
        string $phoneNumberStartsWith
    ): self {
        $self = clone $this;
        $self['phoneNumberStartsWith'] = $phoneNumberStartsWith;

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
     * Status of the ordering group.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Ordering strategy used.
     *
     * @param Strategy|value-of<Strategy> $strategy
     */
    public function withStrategy(Strategy|string $strategy): self
    {
        $self = clone $this;
        $self['strategy'] = $strategy;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the ordering group was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
