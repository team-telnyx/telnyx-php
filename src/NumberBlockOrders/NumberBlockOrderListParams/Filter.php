<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders\NumberBlockOrderListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter\CreatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.starting_number].
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: CreatedAt|null,
 *   phoneNumbersStartingNumber?: string|null,
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
    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    /**
     * Filter number block  orders having these phone numbers.
     */
    #[Optional('phone_numbers.starting_number')]
    public ?string $phoneNumbersStartingNumber;

    /**
     * Filter number block orders by status.
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
        ?string $phoneNumbersStartingNumber = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $phoneNumbersStartingNumber && $obj['phoneNumbersStartingNumber'] = $phoneNumbersStartingNumber;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter number block orders by date range.
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
     * Filter number block  orders having these phone numbers.
     */
    public function withPhoneNumbersStartingNumber(
        string $phoneNumbersStartingNumber
    ): self {
        $obj = clone $this;
        $obj['phoneNumbersStartingNumber'] = $phoneNumbersStartingNumber;

        return $obj;
    }

    /**
     * Filter number block orders by status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
