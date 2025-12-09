<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse\Data\OrderingGroup\Order;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse\Data\OrderingGroup\Status;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse\Data\OrderingGroup\Strategy;

/**
 * @phpstan-type OrderingGroupShape = array{
 *   administrativeArea?: string|null,
 *   countAllocated?: int|null,
 *   countRequested?: int|null,
 *   countryISO?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   errorReason?: string|null,
 *   excludeHeldNumbers?: bool|null,
 *   nationalDestinationCode?: string|null,
 *   orders?: list<Order>|null,
 *   phoneNumberType?: string|null,
 *   phoneNumberContains?: string|null,
 *   phoneNumberEndsWith?: string|null,
 *   phoneNumberStartsWith?: string|null,
 *   quickship?: bool|null,
 *   status?: value-of<Status>|null,
 *   strategy?: value-of<Strategy>|null,
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
     * @param list<Order|array{
     *   numberOrderID: string, subNumberOrderIDs: list<string>
     * }> $orders
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
        $obj = new self;

        null !== $administrativeArea && $obj['administrativeArea'] = $administrativeArea;
        null !== $countAllocated && $obj['countAllocated'] = $countAllocated;
        null !== $countRequested && $obj['countRequested'] = $countRequested;
        null !== $countryISO && $obj['countryISO'] = $countryISO;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $errorReason && $obj['errorReason'] = $errorReason;
        null !== $excludeHeldNumbers && $obj['excludeHeldNumbers'] = $excludeHeldNumbers;
        null !== $nationalDestinationCode && $obj['nationalDestinationCode'] = $nationalDestinationCode;
        null !== $orders && $obj['orders'] = $orders;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $phoneNumberContains && $obj['phoneNumberContains'] = $phoneNumberContains;
        null !== $phoneNumberEndsWith && $obj['phoneNumberEndsWith'] = $phoneNumberEndsWith;
        null !== $phoneNumberStartsWith && $obj['phoneNumberStartsWith'] = $phoneNumberStartsWith;
        null !== $quickship && $obj['quickship'] = $quickship;
        null !== $status && $obj['status'] = $status;
        null !== $strategy && $obj['strategy'] = $strategy;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

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
     * Quantity of phone numbers allocated.
     */
    public function withCountAllocated(int $countAllocated): self
    {
        $obj = clone $this;
        $obj['countAllocated'] = $countAllocated;

        return $obj;
    }

    /**
     * Quantity of phone numbers requested.
     */
    public function withCountRequested(int $countRequested): self
    {
        $obj = clone $this;
        $obj['countRequested'] = $countRequested;

        return $obj;
    }

    /**
     * Country where you would like to purchase phone numbers.
     */
    public function withCountryISO(string $countryISO): self
    {
        $obj = clone $this;
        $obj['countryISO'] = $countryISO;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the ordering group was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Error reason if applicable.
     */
    public function withErrorReason(string $errorReason): self
    {
        $obj = clone $this;
        $obj['errorReason'] = $errorReason;

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
     * Array of orders created to fulfill the inexplicit order.
     *
     * @param list<Order|array{
     *   numberOrderID: string, subNumberOrderIDs: list<string>
     * }> $orders
     */
    public function withOrders(array $orders): self
    {
        $obj = clone $this;
        $obj['orders'] = $orders;

        return $obj;
    }

    /**
     * Number type.
     */
    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Filter for phone numbers that contain the digits specified.
     */
    public function withPhoneNumberContains(string $phoneNumberContains): self
    {
        $obj = clone $this;
        $obj['phoneNumberContains'] = $phoneNumberContains;

        return $obj;
    }

    /**
     * Filter by the ending digits of the phone number.
     */
    public function withPhoneNumberEndsWith(string $phoneNumberEndsWith): self
    {
        $obj = clone $this;
        $obj['phoneNumberEndsWith'] = $phoneNumberEndsWith;

        return $obj;
    }

    /**
     * Filter by the starting digits of the phone number.
     */
    public function withPhoneNumberStartsWith(
        string $phoneNumberStartsWith
    ): self {
        $obj = clone $this;
        $obj['phoneNumberStartsWith'] = $phoneNumberStartsWith;

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
     * Status of the ordering group.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Ordering strategy used.
     *
     * @param Strategy|value-of<Strategy> $strategy
     */
    public function withStrategy(Strategy|string $strategy): self
    {
        $obj = clone $this;
        $obj['strategy'] = $strategy;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the ordering group was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
