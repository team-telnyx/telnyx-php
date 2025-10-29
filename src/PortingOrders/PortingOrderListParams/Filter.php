<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\Misc;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[customer_group_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains].
 *
 * @phpstan-type FilterShape = array{
 *   activationSettings?: ActivationSettings,
 *   customerGroupReference?: string,
 *   customerReference?: string,
 *   endUser?: EndUser,
 *   misc?: Misc,
 *   parentSupportKey?: string,
 *   phoneNumbers?: PhoneNumbers,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api('activation_settings', optional: true)]
    public ?ActivationSettings $activationSettings;

    /**
     * Filter results by customer_group_reference.
     */
    #[Api('customer_group_reference', optional: true)]
    public ?string $customerGroupReference;

    /**
     * Filter results by customer_reference.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    #[Api('end_user', optional: true)]
    public ?EndUser $endUser;

    #[Api(optional: true)]
    public ?Misc $misc;

    /**
     * Filter results by parent_support_key.
     */
    #[Api('parent_support_key', optional: true)]
    public ?string $parentSupportKey;

    #[Api('phone_numbers', optional: true)]
    public ?PhoneNumbers $phoneNumbers;

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
        ?ActivationSettings $activationSettings = null,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        ?EndUser $endUser = null,
        ?Misc $misc = null,
        ?string $parentSupportKey = null,
        ?PhoneNumbers $phoneNumbers = null,
    ): self {
        $obj = new self;

        null !== $activationSettings && $obj->activationSettings = $activationSettings;
        null !== $customerGroupReference && $obj->customerGroupReference = $customerGroupReference;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $endUser && $obj->endUser = $endUser;
        null !== $misc && $obj->misc = $misc;
        null !== $parentSupportKey && $obj->parentSupportKey = $parentSupportKey;
        null !== $phoneNumbers && $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    public function withActivationSettings(
        ActivationSettings $activationSettings
    ): self {
        $obj = clone $this;
        $obj->activationSettings = $activationSettings;

        return $obj;
    }

    /**
     * Filter results by customer_group_reference.
     */
    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj->customerGroupReference = $customerGroupReference;

        return $obj;
    }

    /**
     * Filter results by customer_reference.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    public function withEndUser(EndUser $endUser): self
    {
        $obj = clone $this;
        $obj->endUser = $endUser;

        return $obj;
    }

    public function withMisc(Misc $misc): self
    {
        $obj = clone $this;
        $obj->misc = $misc;

        return $obj;
    }

    /**
     * Filter results by parent_support_key.
     */
    public function withParentSupportKey(string $parentSupportKey): self
    {
        $obj = clone $this;
        $obj->parentSupportKey = $parentSupportKey;

        return $obj;
    }

    public function withPhoneNumbers(PhoneNumbers $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
