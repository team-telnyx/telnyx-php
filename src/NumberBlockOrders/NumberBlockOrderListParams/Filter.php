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
 * @phpstan-import-type CreatedAtShape from \Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter\CreatedAt
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: null|CreatedAt|CreatedAtShape,
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
     * @param CreatedAt|CreatedAtShape|null $createdAt
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        ?string $phoneNumbersStartingNumber = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $phoneNumbersStartingNumber && $self['phoneNumbersStartingNumber'] = $phoneNumbersStartingNumber;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filter number block orders by date range.
     *
     * @param CreatedAt|CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Filter number block  orders having these phone numbers.
     */
    public function withPhoneNumbersStartingNumber(
        string $phoneNumbersStartingNumber
    ): self {
        $self = clone $this;
        $self['phoneNumbersStartingNumber'] = $phoneNumbersStartingNumber;

        return $self;
    }

    /**
     * Filter number block orders by status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
