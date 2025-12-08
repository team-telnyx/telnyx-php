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
 *   administrative_area?: string|null,
 *   count_allocated?: int|null,
 *   count_requested?: int|null,
 *   country_iso?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   error_reason?: string|null,
 *   exclude_held_numbers?: bool|null,
 *   national_destination_code?: string|null,
 *   orders?: list<Order>|null,
 *   phone_number_type?: string|null,
 *   phone_number_contains_?: string|null,
 *   phone_number_ends_with_?: string|null,
 *   phone_number_starts_with_?: string|null,
 *   quickship?: bool|null,
 *   status?: value-of<Status>|null,
 *   strategy?: value-of<Strategy>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class OrderingGroup implements BaseModel
{
    /** @use SdkModel<OrderingGroupShape> */
    use SdkModel;

    /**
     * Filter for phone numbers in a given state / province.
     */
    #[Optional]
    public ?string $administrative_area;

    /**
     * Quantity of phone numbers allocated.
     */
    #[Optional]
    public ?int $count_allocated;

    /**
     * Quantity of phone numbers requested.
     */
    #[Optional]
    public ?int $count_requested;

    /**
     * Country where you would like to purchase phone numbers.
     */
    #[Optional]
    public ?string $country_iso;

    /**
     * ISO 8601 formatted date indicating when the ordering group was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Error reason if applicable.
     */
    #[Optional]
    public ?string $error_reason;

    /**
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    #[Optional]
    public ?bool $exclude_held_numbers;

    /**
     * Filter by area code.
     */
    #[Optional]
    public ?string $national_destination_code;

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
    #[Optional]
    public ?string $phone_number_type;

    /**
     * Filter for phone numbers that contain the digits specified.
     */
    #[Optional('phone_number[contains]')]
    public ?string $phone_number_contains_;

    /**
     * Filter by the ending digits of the phone number.
     */
    #[Optional('phone_number[ends_with]')]
    public ?string $phone_number_ends_with_;

    /**
     * Filter by the starting digits of the phone number.
     */
    #[Optional('phone_number[starts_with]')]
    public ?string $phone_number_starts_with_;

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
    #[Optional]
    public ?\DateTimeInterface $updated_at;

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
     *   number_order_id: string, sub_number_order_ids: list<string>
     * }> $orders
     * @param Status|value-of<Status> $status
     * @param Strategy|value-of<Strategy> $strategy
     */
    public static function with(
        ?string $administrative_area = null,
        ?int $count_allocated = null,
        ?int $count_requested = null,
        ?string $country_iso = null,
        ?\DateTimeInterface $created_at = null,
        ?string $error_reason = null,
        ?bool $exclude_held_numbers = null,
        ?string $national_destination_code = null,
        ?array $orders = null,
        ?string $phone_number_type = null,
        ?string $phone_number_contains_ = null,
        ?string $phone_number_ends_with_ = null,
        ?string $phone_number_starts_with_ = null,
        ?bool $quickship = null,
        Status|string|null $status = null,
        Strategy|string|null $strategy = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $administrative_area && $obj['administrative_area'] = $administrative_area;
        null !== $count_allocated && $obj['count_allocated'] = $count_allocated;
        null !== $count_requested && $obj['count_requested'] = $count_requested;
        null !== $country_iso && $obj['country_iso'] = $country_iso;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $error_reason && $obj['error_reason'] = $error_reason;
        null !== $exclude_held_numbers && $obj['exclude_held_numbers'] = $exclude_held_numbers;
        null !== $national_destination_code && $obj['national_destination_code'] = $national_destination_code;
        null !== $orders && $obj['orders'] = $orders;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $phone_number_contains_ && $obj['phone_number_contains_'] = $phone_number_contains_;
        null !== $phone_number_ends_with_ && $obj['phone_number_ends_with_'] = $phone_number_ends_with_;
        null !== $phone_number_starts_with_ && $obj['phone_number_starts_with_'] = $phone_number_starts_with_;
        null !== $quickship && $obj['quickship'] = $quickship;
        null !== $status && $obj['status'] = $status;
        null !== $strategy && $obj['strategy'] = $strategy;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Filter for phone numbers in a given state / province.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrative_area'] = $administrativeArea;

        return $obj;
    }

    /**
     * Quantity of phone numbers allocated.
     */
    public function withCountAllocated(int $countAllocated): self
    {
        $obj = clone $this;
        $obj['count_allocated'] = $countAllocated;

        return $obj;
    }

    /**
     * Quantity of phone numbers requested.
     */
    public function withCountRequested(int $countRequested): self
    {
        $obj = clone $this;
        $obj['count_requested'] = $countRequested;

        return $obj;
    }

    /**
     * Country where you would like to purchase phone numbers.
     */
    public function withCountryISO(string $countryISO): self
    {
        $obj = clone $this;
        $obj['country_iso'] = $countryISO;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the ordering group was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Error reason if applicable.
     */
    public function withErrorReason(string $errorReason): self
    {
        $obj = clone $this;
        $obj['error_reason'] = $errorReason;

        return $obj;
    }

    /**
     * Filter to exclude phone numbers that are currently on hold/reserved for your account.
     */
    public function withExcludeHeldNumbers(bool $excludeHeldNumbers): self
    {
        $obj = clone $this;
        $obj['exclude_held_numbers'] = $excludeHeldNumbers;

        return $obj;
    }

    /**
     * Filter by area code.
     */
    public function withNationalDestinationCode(
        string $nationalDestinationCode
    ): self {
        $obj = clone $this;
        $obj['national_destination_code'] = $nationalDestinationCode;

        return $obj;
    }

    /**
     * Array of orders created to fulfill the inexplicit order.
     *
     * @param list<Order|array{
     *   number_order_id: string, sub_number_order_ids: list<string>
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
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Filter for phone numbers that contain the digits specified.
     */
    public function withPhoneNumberContains(string $phoneNumberContains): self
    {
        $obj = clone $this;
        $obj['phone_number_contains_'] = $phoneNumberContains;

        return $obj;
    }

    /**
     * Filter by the ending digits of the phone number.
     */
    public function withPhoneNumberEndsWith(string $phoneNumberEndsWith): self
    {
        $obj = clone $this;
        $obj['phone_number_ends_with_'] = $phoneNumberEndsWith;

        return $obj;
    }

    /**
     * Filter by the starting digits of the phone number.
     */
    public function withPhoneNumberStartsWith(
        string $phoneNumberStartsWith
    ): self {
        $obj = clone $this;
        $obj['phone_number_starts_with_'] = $phoneNumberStartsWith;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
