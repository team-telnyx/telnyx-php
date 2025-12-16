<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderListParams\Filter\CreatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers_count], filter[customer_reference], filter[requirements_met].
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\NumberOrders\NumberOrderListParams\Filter\CreatedAt
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: null|CreatedAt|CreatedAtShape,
 *   customerReference?: string|null,
 *   phoneNumbersCount?: string|null,
 *   requirementsMet?: bool|null,
 *   status?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter number orders by date range.
     */
    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    /**
     * Filter number orders via the customer reference set.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Filter number order with this amount of numbers.
     */
    #[Optional('phone_numbers_count')]
    public ?string $phoneNumbersCount;

    /**
     * Filter number orders by requirements met.
     */
    #[Optional('requirements_met')]
    public ?bool $requirementsMet;

    /**
     * Filter number orders by status.
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
        ?string $phoneNumbersCount = null,
        ?bool $requirementsMet = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $phoneNumbersCount && $self['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $requirementsMet && $self['requirementsMet'] = $requirementsMet;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filter number orders by date range.
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
     * Filter number orders via the customer reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Filter number order with this amount of numbers.
     */
    public function withPhoneNumbersCount(string $phoneNumbersCount): self
    {
        $self = clone $this;
        $self['phoneNumbersCount'] = $phoneNumbersCount;

        return $self;
    }

    /**
     * Filter number orders by requirements met.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $self = clone $this;
        $self['requirementsMet'] = $requirementsMet;

        return $self;
    }

    /**
     * Filter number orders by status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
