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
 * @phpstan-type filter_alias = array{
 *   createdAt?: CreatedAt|null,
 *   customerReference?: string|null,
 *   phoneNumbersPhoneNumber?: string|null,
 *   status?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter number reservations by date range.
     */
    #[Api('created_at', optional: true)]
    public ?CreatedAt $createdAt;

    /**
     * Filter number reservations via the customer reference set.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Filter number reservations having these phone numbers.
     */
    #[Api('phone_numbers.phone_number', optional: true)]
    public ?string $phoneNumbersPhoneNumber;

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
        ?CreatedAt $createdAt = null,
        ?string $customerReference = null,
        ?string $phoneNumbersPhoneNumber = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $phoneNumbersPhoneNumber && $obj->phoneNumbersPhoneNumber = $phoneNumbersPhoneNumber;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * Filter number reservations by date range.
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Filter number reservations via the customer reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Filter number reservations having these phone numbers.
     */
    public function withPhoneNumbersPhoneNumber(
        string $phoneNumbersPhoneNumber
    ): self {
        $obj = clone $this;
        $obj->phoneNumbersPhoneNumber = $phoneNumbersPhoneNumber;

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
