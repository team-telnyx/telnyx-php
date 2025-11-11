<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders\NumberBlockOrderListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter\CreatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.starting_number].
 *
 * @phpstan-type FilterShape = array{
 *   created_at?: CreatedAt|null,
 *   phone_numbers_starting_number?: string|null,
 *   status?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter number block orders by date range.
     */
    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    /**
     * Filter number block  orders having these phone numbers.
     */
    #[Api('phone_numbers.starting_number', optional: true)]
    public ?string $phone_numbers_starting_number;

    /**
     * Filter number block orders by status.
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
        ?string $phone_numbers_starting_number = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj->created_at = $created_at;
        null !== $phone_numbers_starting_number && $obj->phone_numbers_starting_number = $phone_numbers_starting_number;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * Filter number block orders by date range.
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Filter number block  orders having these phone numbers.
     */
    public function withPhoneNumbersStartingNumber(
        string $phoneNumbersStartingNumber
    ): self {
        $obj = clone $this;
        $obj->phone_numbers_starting_number = $phoneNumbersStartingNumber;

        return $obj;
    }

    /**
     * Filter number block orders by status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
