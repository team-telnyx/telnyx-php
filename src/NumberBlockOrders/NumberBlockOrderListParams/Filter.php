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
 * @phpstan-type filter_alias = array{
 *   createdAt?: CreatedAt|null,
 *   phoneNumbersStartingNumber?: string|null,
 *   status?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter number block orders by date range.
     */
    #[Api('created_at', optional: true)]
    public ?CreatedAt $createdAt;

    /**
     * Filter number block  orders having these phone numbers.
     */
    #[Api('phone_numbers.starting_number', optional: true)]
    public ?string $phoneNumbersStartingNumber;

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
        ?CreatedAt $createdAt = null,
        ?string $phoneNumbersStartingNumber = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $phoneNumbersStartingNumber && $obj->phoneNumbersStartingNumber = $phoneNumbersStartingNumber;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * Filter number block orders by date range.
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Filter number block  orders having these phone numbers.
     */
    public function withPhoneNumbersStartingNumber(
        string $phoneNumbersStartingNumber
    ): self {
        $obj = clone $this;
        $obj->phoneNumbersStartingNumber = $phoneNumbersStartingNumber;

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
