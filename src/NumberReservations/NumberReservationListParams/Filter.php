<?php

declare(strict_types=1);

namespace Telnyx\NumberReservations\NumberReservationListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberReservations\NumberReservationListParams\Filter\CreatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.phone_number], filter[customer_reference].
 *
 * @phpstan-type FilterShape = array{
 *   created_at?: CreatedAt|null,
 *   customer_reference?: string|null,
 *   phone_numbers_phone_number?: string|null,
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
    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    /**
     * Filter number reservations via the customer reference set.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Filter number reservations having these phone numbers.
     */
    #[Api('phone_numbers.phone_number', optional: true)]
    public ?string $phone_numbers_phone_number;

    /**
     * Filter number reservations by status.
     */
    #[Api(optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?CreatedAt $created_at = null,
        ?string $customer_reference = null,
        ?string $phone_numbers_phone_number = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj->created_at = $created_at;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $phone_numbers_phone_number && $obj->phone_numbers_phone_number = $phone_numbers_phone_number;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * Filter number reservations by date range.
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Filter number reservations via the customer reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * Filter number reservations having these phone numbers.
     */
    public function withPhoneNumbersPhoneNumber(
        string $phoneNumbersPhoneNumber
    ): self {
        $obj = clone $this;
        $obj->phone_numbers_phone_number = $phoneNumbersPhoneNumber;

        return $obj;
    }

    /**
     * Filter number reservations by status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
