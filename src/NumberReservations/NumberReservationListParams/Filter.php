<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations\NumberReservationListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\NumberReservationListParams\Filter\CreatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.phone_number], filter[customer_reference].
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: CreatedAt|null,
 *   customerReference?: string|null,
 *   phoneNumbersPhoneNumber?: string|null,
 *   status?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter number reservations by date range.
     */
    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    /**
     * Filter number reservations via the customer reference set.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Filter number reservations having these phone numbers.
     */
    #[Optional('phone_numbers.phone_number')]
    public ?string $phoneNumbersPhoneNumber;

    /**
     * Filter number reservations by status.
     */
    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAt|array{gt?: string|null, lt?: string|null} $createdAt
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        ?string $customerReference = null,
        ?string $phoneNumbersPhoneNumber = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $phoneNumbersPhoneNumber && $obj['phoneNumbersPhoneNumber'] = $phoneNumbersPhoneNumber;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter number reservations by date range.
     *
     * @param CreatedAt|array{gt?: string|null, lt?: string|null} $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Filter number reservations via the customer reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Filter number reservations having these phone numbers.
     */
    public function withPhoneNumbersPhoneNumber(
        string $phoneNumbersPhoneNumber
    ): self {
        $obj = clone $this;
        $obj['phoneNumbersPhoneNumber'] = $phoneNumbersPhoneNumber;

        return $obj;
    }

    /**
     * Filter number reservations by status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
