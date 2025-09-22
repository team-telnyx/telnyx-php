<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettingsFocDatetimeRequested;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbersPhoneNumber;
use Telnyx\PortingOrders\PortingOrderType;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[customer_group_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains].
 *
 * @phpstan-type filter_alias = array{
 *   activationSettingsFastPortEligible?: bool,
 *   activationSettingsFocDatetimeRequested?: ActivationSettingsFocDatetimeRequested,
 *   customerGroupReference?: string,
 *   customerReference?: string,
 *   endUserAdminAuthPersonName?: string,
 *   endUserAdminEntityName?: string,
 *   miscType?: value-of<PortingOrderType>,
 *   parentSupportKey?: string,
 *   phoneNumbersCarrierName?: string,
 *   phoneNumbersCountryCode?: string,
 *   phoneNumbersPhoneNumber?: PhoneNumbersPhoneNumber,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter results by fast port eligible.
     */
    #[Api('activation_settings.fast_port_eligible', optional: true)]
    public ?bool $activationSettingsFastPortEligible;

    /**
     * FOC datetime range filtering operations.
     */
    #[Api('activation_settings.foc_datetime_requested', optional: true)]
    public ?ActivationSettingsFocDatetimeRequested $activationSettingsFocDatetimeRequested;

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

    /**
     * Filter results by authorized person.
     */
    #[Api('end_user.admin.auth_person_name', optional: true)]
    public ?string $endUserAdminAuthPersonName;

    /**
     * Filter results by person or company name.
     */
    #[Api('end_user.admin.entity_name', optional: true)]
    public ?string $endUserAdminEntityName;

    /**
     * Filter results by porting order type.
     *
     * @var value-of<PortingOrderType>|null $miscType
     */
    #[Api('misc.type', enum: PortingOrderType::class, optional: true)]
    public ?string $miscType;

    /**
     * Filter results by parent_support_key.
     */
    #[Api('parent_support_key', optional: true)]
    public ?string $parentSupportKey;

    /**
     * Filter results by old service provider.
     */
    #[Api('phone_numbers.carrier_name', optional: true)]
    public ?string $phoneNumbersCarrierName;

    /**
     * Filter results by country ISO 3166-1 alpha-2 code.
     */
    #[Api('phone_numbers.country_code', optional: true)]
    public ?string $phoneNumbersCountryCode;

    /**
     * Phone number filtering operations.
     */
    #[Api('phone_numbers.phone_number', optional: true)]
    public ?PhoneNumbersPhoneNumber $phoneNumbersPhoneNumber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrderType|value-of<PortingOrderType> $miscType
     */
    public static function with(
        ?bool $activationSettingsFastPortEligible = null,
        ?ActivationSettingsFocDatetimeRequested $activationSettingsFocDatetimeRequested = null,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        ?string $endUserAdminAuthPersonName = null,
        ?string $endUserAdminEntityName = null,
        PortingOrderType|string|null $miscType = null,
        ?string $parentSupportKey = null,
        ?string $phoneNumbersCarrierName = null,
        ?string $phoneNumbersCountryCode = null,
        ?PhoneNumbersPhoneNumber $phoneNumbersPhoneNumber = null,
    ): self {
        $obj = new self;

        null !== $activationSettingsFastPortEligible && $obj->activationSettingsFastPortEligible = $activationSettingsFastPortEligible;
        null !== $activationSettingsFocDatetimeRequested && $obj->activationSettingsFocDatetimeRequested = $activationSettingsFocDatetimeRequested;
        null !== $customerGroupReference && $obj->customerGroupReference = $customerGroupReference;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $endUserAdminAuthPersonName && $obj->endUserAdminAuthPersonName = $endUserAdminAuthPersonName;
        null !== $endUserAdminEntityName && $obj->endUserAdminEntityName = $endUserAdminEntityName;
        null !== $miscType && $obj->miscType = $miscType instanceof PortingOrderType ? $miscType->value : $miscType;
        null !== $parentSupportKey && $obj->parentSupportKey = $parentSupportKey;
        null !== $phoneNumbersCarrierName && $obj->phoneNumbersCarrierName = $phoneNumbersCarrierName;
        null !== $phoneNumbersCountryCode && $obj->phoneNumbersCountryCode = $phoneNumbersCountryCode;
        null !== $phoneNumbersPhoneNumber && $obj->phoneNumbersPhoneNumber = $phoneNumbersPhoneNumber;

        return $obj;
    }

    /**
     * Filter results by fast port eligible.
     */
    public function withActivationSettingsFastPortEligible(
        bool $activationSettingsFastPortEligible
    ): self {
        $obj = clone $this;
        $obj->activationSettingsFastPortEligible = $activationSettingsFastPortEligible;

        return $obj;
    }

    /**
     * FOC datetime range filtering operations.
     */
    public function withActivationSettingsFocDatetimeRequested(
        ActivationSettingsFocDatetimeRequested $activationSettingsFocDatetimeRequested,
    ): self {
        $obj = clone $this;
        $obj->activationSettingsFocDatetimeRequested = $activationSettingsFocDatetimeRequested;

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

    /**
     * Filter results by authorized person.
     */
    public function withEndUserAdminAuthPersonName(
        string $endUserAdminAuthPersonName
    ): self {
        $obj = clone $this;
        $obj->endUserAdminAuthPersonName = $endUserAdminAuthPersonName;

        return $obj;
    }

    /**
     * Filter results by person or company name.
     */
    public function withEndUserAdminEntityName(
        string $endUserAdminEntityName
    ): self {
        $obj = clone $this;
        $obj->endUserAdminEntityName = $endUserAdminEntityName;

        return $obj;
    }

    /**
     * Filter results by porting order type.
     *
     * @param PortingOrderType|value-of<PortingOrderType> $miscType
     */
    public function withMiscType(PortingOrderType|string $miscType): self
    {
        $obj = clone $this;
        $obj->miscType = $miscType instanceof PortingOrderType ? $miscType->value : $miscType;

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

    /**
     * Filter results by old service provider.
     */
    public function withPhoneNumbersCarrierName(
        string $phoneNumbersCarrierName
    ): self {
        $obj = clone $this;
        $obj->phoneNumbersCarrierName = $phoneNumbersCarrierName;

        return $obj;
    }

    /**
     * Filter results by country ISO 3166-1 alpha-2 code.
     */
    public function withPhoneNumbersCountryCode(
        string $phoneNumbersCountryCode
    ): self {
        $obj = clone $this;
        $obj->phoneNumbersCountryCode = $phoneNumbersCountryCode;

        return $obj;
    }

    /**
     * Phone number filtering operations.
     */
    public function withPhoneNumbersPhoneNumber(
        PhoneNumbersPhoneNumber $phoneNumbersPhoneNumber
    ): self {
        $obj = clone $this;
        $obj->phoneNumbersPhoneNumber = $phoneNumbersPhoneNumber;

        return $obj;
    }
}
