<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings\FocDatetimeRequested;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser\Admin;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\Misc;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers\PhoneNumber;
use Telnyx\PortingOrders\PortingOrderType;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[customer_group_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains].
 *
 * @phpstan-type FilterShape = array{
 *   activation_settings?: ActivationSettings|null,
 *   customer_group_reference?: string|null,
 *   customer_reference?: string|null,
 *   end_user?: EndUser|null,
 *   misc?: Misc|null,
 *   parent_support_key?: string|null,
 *   phone_numbers?: PhoneNumbers|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional]
    public ?ActivationSettings $activation_settings;

    /**
     * Filter results by customer_group_reference.
     */
    #[Optional]
    public ?string $customer_group_reference;

    /**
     * Filter results by customer_reference.
     */
    #[Optional]
    public ?string $customer_reference;

    #[Optional]
    public ?EndUser $end_user;

    #[Optional]
    public ?Misc $misc;

    /**
     * Filter results by parent_support_key.
     */
    #[Optional]
    public ?string $parent_support_key;

    #[Optional]
    public ?PhoneNumbers $phone_numbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ActivationSettings|array{
     *   fast_port_eligible?: bool|null,
     *   foc_datetime_requested?: FocDatetimeRequested|null,
     * } $activation_settings
     * @param EndUser|array{admin?: Admin|null} $end_user
     * @param Misc|array{type?: value-of<PortingOrderType>|null} $misc
     * @param PhoneNumbers|array{
     *   carrier_name?: string|null,
     *   country_code?: string|null,
     *   phone_number?: PhoneNumber|null,
     * } $phone_numbers
     */
    public static function with(
        ActivationSettings|array|null $activation_settings = null,
        ?string $customer_group_reference = null,
        ?string $customer_reference = null,
        EndUser|array|null $end_user = null,
        Misc|array|null $misc = null,
        ?string $parent_support_key = null,
        PhoneNumbers|array|null $phone_numbers = null,
    ): self {
        $obj = new self;

        null !== $activation_settings && $obj['activation_settings'] = $activation_settings;
        null !== $customer_group_reference && $obj['customer_group_reference'] = $customer_group_reference;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $end_user && $obj['end_user'] = $end_user;
        null !== $misc && $obj['misc'] = $misc;
        null !== $parent_support_key && $obj['parent_support_key'] = $parent_support_key;
        null !== $phone_numbers && $obj['phone_numbers'] = $phone_numbers;

        return $obj;
    }

    /**
     * @param ActivationSettings|array{
     *   fast_port_eligible?: bool|null,
     *   foc_datetime_requested?: FocDatetimeRequested|null,
     * } $activationSettings
     */
    public function withActivationSettings(
        ActivationSettings|array $activationSettings
    ): self {
        $obj = clone $this;
        $obj['activation_settings'] = $activationSettings;

        return $obj;
    }

    /**
     * Filter results by customer_group_reference.
     */
    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj['customer_group_reference'] = $customerGroupReference;

        return $obj;
    }

    /**
     * Filter results by customer_reference.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * @param EndUser|array{admin?: Admin|null} $endUser
     */
    public function withEndUser(EndUser|array $endUser): self
    {
        $obj = clone $this;
        $obj['end_user'] = $endUser;

        return $obj;
    }

    /**
     * @param Misc|array{type?: value-of<PortingOrderType>|null} $misc
     */
    public function withMisc(Misc|array $misc): self
    {
        $obj = clone $this;
        $obj['misc'] = $misc;

        return $obj;
    }

    /**
     * Filter results by parent_support_key.
     */
    public function withParentSupportKey(string $parentSupportKey): self
    {
        $obj = clone $this;
        $obj['parent_support_key'] = $parentSupportKey;

        return $obj;
    }

    /**
     * @param PhoneNumbers|array{
     *   carrier_name?: string|null,
     *   country_code?: string|null,
     *   phone_number?: PhoneNumber|null,
     * } $phoneNumbers
     */
    public function withPhoneNumbers(PhoneNumbers|array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }
}
