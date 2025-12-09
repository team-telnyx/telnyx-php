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
 * @phpstan-type FilterShape = array{
 *   createdAt?: CreatedAt|null,
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
     * @param CreatedAt|array{gt?: string|null, lt?: string|null} $createdAt
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        ?string $customerReference = null,
        ?string $phoneNumbersCount = null,
        ?bool $requirementsMet = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $phoneNumbersCount && $obj['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $requirementsMet && $obj['requirementsMet'] = $requirementsMet;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter number orders by date range.
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
     * Filter number orders via the customer reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Filter number order with this amount of numbers.
     */
    public function withPhoneNumbersCount(string $phoneNumbersCount): self
    {
        $obj = clone $this;
        $obj['phoneNumbersCount'] = $phoneNumbersCount;

        return $obj;
    }

    /**
     * Filter number orders by requirements met.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj['requirementsMet'] = $requirementsMet;

        return $obj;
    }

    /**
     * Filter number orders by status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
