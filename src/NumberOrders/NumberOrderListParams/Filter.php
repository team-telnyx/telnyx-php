<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderListParams\Filter\CreatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers_count], filter[customer_reference], filter[requirements_met].
 *
 * @phpstan-type FilterShape = array{
 *   created_at?: CreatedAt|null,
 *   customer_reference?: string|null,
 *   phone_numbers_count?: string|null,
 *   requirements_met?: bool|null,
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
    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    /**
     * Filter number orders via the customer reference set.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Filter number order with this amount of numbers.
     */
    #[Api(optional: true)]
    public ?string $phone_numbers_count;

    /**
     * Filter number orders by requirements met.
     */
    #[Api(optional: true)]
    public ?bool $requirements_met;

    /**
     * Filter number orders by status.
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
     *
     * @param CreatedAt|array{gt?: string|null, lt?: string|null} $created_at
     */
    public static function with(
        CreatedAt|array|null $created_at = null,
        ?string $customer_reference = null,
        ?string $phone_numbers_count = null,
        ?bool $requirements_met = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $phone_numbers_count && $obj['phone_numbers_count'] = $phone_numbers_count;
        null !== $requirements_met && $obj['requirements_met'] = $requirements_met;
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
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Filter number orders via the customer reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * Filter number order with this amount of numbers.
     */
    public function withPhoneNumbersCount(string $phoneNumbersCount): self
    {
        $obj = clone $this;
        $obj['phone_numbers_count'] = $phoneNumbersCount;

        return $obj;
    }

    /**
     * Filter number orders by requirements met.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj['requirements_met'] = $requirementsMet;

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
