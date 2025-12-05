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
 *   action?: value-of<Action>|null,
 *   country_code?: string|null,
 *   customer_reference?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   status?: value-of<Status>|null,
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
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Filter requirement groups by customer reference.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Filter requirement groups by phone number type.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        Action|string|null $action = null,
        ?string $country_code = null,
        ?string $customer_reference = null,
        PhoneNumberType|string|null $phone_number_type = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $action && $obj['action'] = $action;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
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
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * Filter requirement groups by customer reference.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

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
        $obj['phone_number_type'] = $phoneNumberType;

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
