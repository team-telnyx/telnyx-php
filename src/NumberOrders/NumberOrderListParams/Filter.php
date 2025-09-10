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
 * @phpstan-type filter_alias = array{
 *   createdAt?: CreatedAt|null,
 *   customerReference?: string|null,
 *   phoneNumbersCount?: string|null,
 *   requirementsMet?: bool|null,
 *   status?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter number orders by date range.
     */
    #[Api('created_at', optional: true)]
    public ?CreatedAt $createdAt;

    /**
     * Filter number orders via the customer reference set.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Filter number order with this amount of numbers.
     */
    #[Api('phone_numbers_count', optional: true)]
    public ?string $phoneNumbersCount;

    /**
     * Filter number orders by requirements met.
     */
    #[Api('requirements_met', optional: true)]
    public ?bool $requirementsMet;

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
     */
    public static function with(
        ?CreatedAt $createdAt = null,
        ?string $customerReference = null,
        ?string $phoneNumbersCount = null,
        ?bool $requirementsMet = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $phoneNumbersCount && $obj->phoneNumbersCount = $phoneNumbersCount;
        null !== $requirementsMet && $obj->requirementsMet = $requirementsMet;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * Filter number orders by date range.
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Filter number orders via the customer reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Filter number order with this amount of numbers.
     */
    public function withPhoneNumbersCount(string $phoneNumbersCount): self
    {
        $obj = clone $this;
        $obj->phoneNumbersCount = $phoneNumbersCount;

        return $obj;
    }

    /**
     * Filter number orders by requirements met.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj->requirementsMet = $requirementsMet;

        return $obj;
    }

    /**
     * Filter number orders by status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
