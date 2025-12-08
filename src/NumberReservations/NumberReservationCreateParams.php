<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\ReservedPhoneNumber\Status;

/**
 * Creates a Phone Number Reservation for multiple numbers.
 *
 * @see Telnyx\Services\NumberReservationsService::create()
 *
 * @phpstan-type NumberReservationCreateParamsShape = array{
 *   customer_reference?: string,
 *   phone_numbers?: list<ReservedPhoneNumber|array{
 *     id?: string|null,
 *     created_at?: \DateTimeInterface|null,
 *     expired_at?: \DateTimeInterface|null,
 *     phone_number?: string|null,
 *     record_type?: string|null,
 *     status?: value-of<Status>|null,
 *     updated_at?: \DateTimeInterface|null,
 *   }>,
 * }
 */
final class NumberReservationCreateParams implements BaseModel
{
    /** @use SdkModel<NumberReservationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional]
    public ?string $customer_reference;

    /** @var list<ReservedPhoneNumber>|null $phone_numbers */
    #[Optional(list: ReservedPhoneNumber::class)]
    public ?array $phone_numbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ReservedPhoneNumber|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   expired_at?: \DateTimeInterface|null,
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $phone_numbers
     */
    public static function with(
        ?string $customer_reference = null,
        ?array $phone_numbers = null
    ): self {
        $obj = new self;

        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $phone_numbers && $obj['phone_numbers'] = $phone_numbers;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * @param list<ReservedPhoneNumber|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   expired_at?: \DateTimeInterface|null,
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }
}
