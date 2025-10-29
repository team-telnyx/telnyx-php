<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroupListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\Action;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\PhoneNumberType;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference].
 *
 * @phpstan-type FilterShape = array{
 *   action?: value-of<Action>,
 *   countryCode?: string,
 *   customerReference?: string,
 *   phoneNumberType?: value-of<PhoneNumberType>,
 *   status?: value-of<Status>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter requirement groups by action type.
     *
     * @var value-of<Action>|null $action
     */
    #[Api(enum: Action::class, optional: true)]
    public ?string $action;

    /**
     * Filter requirement groups by country code (iso alpha 2).
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Filter requirement groups by customer reference.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Filter requirement groups by phone number type.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * Filter requirement groups by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
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
     * @param Action|value-of<Action> $action
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        Action|string|null $action = null,
        ?string $countryCode = null,
        ?string $customerReference = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $action && $obj['action'] = $action;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter requirement groups by action type.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * Filter requirement groups by country code (iso alpha 2).
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Filter requirement groups by customer reference.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Filter requirement groups by phone number type.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Filter requirement groups by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
