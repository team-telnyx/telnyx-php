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
 * @phpstan-import-type CreatedAtShape from \Telnyx\NumberReservations\NumberReservationListParams\Filter\CreatedAt
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: null|CreatedAt|CreatedAtShape,
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
     * @param CreatedAtShape $createdAt
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        ?string $customerReference = null,
        ?string $phoneNumbersPhoneNumber = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $phoneNumbersPhoneNumber && $self['phoneNumbersPhoneNumber'] = $phoneNumbersPhoneNumber;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filter number reservations by date range.
     *
     * @param CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Filter number reservations via the customer reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Filter number reservations having these phone numbers.
     */
    public function withPhoneNumbersPhoneNumber(
        string $phoneNumbersPhoneNumber
    ): self {
        $self = clone $this;
        $self['phoneNumbersPhoneNumber'] = $phoneNumbersPhoneNumber;

        return $self;
    }

    /**
     * Filter number reservations by status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
