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
 *   activationSettings?: ActivationSettings|null,
 *   customerGroupReference?: string|null,
 *   customerReference?: string|null,
 *   endUser?: EndUser|null,
 *   misc?: Misc|null,
 *   parentSupportKey?: string|null,
 *   phoneNumbers?: PhoneNumbers|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('activation_settings')]
    public ?ActivationSettings $activationSettings;

    /**
     * Filter results by customer_group_reference.
     */
    #[Optional('customer_group_reference')]
    public ?string $customerGroupReference;

    /**
     * Filter results by customer_reference.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    #[Optional('end_user')]
    public ?EndUser $endUser;

    #[Optional]
    public ?Misc $misc;

    /**
     * Filter results by parent_support_key.
     */
    #[Optional('parent_support_key')]
    public ?string $parentSupportKey;

    #[Optional('phone_numbers')]
    public ?PhoneNumbers $phoneNumbers;

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
     *   fastPortEligible?: bool|null, focDatetimeRequested?: FocDatetimeRequested|null
     * } $activationSettings
     * @param EndUser|array{admin?: Admin|null} $endUser
     * @param Misc|array{type?: value-of<PortingOrderType>|null} $misc
     * @param PhoneNumbers|array{
     *   carrierName?: string|null,
     *   countryCode?: string|null,
     *   phoneNumber?: PhoneNumber|null,
     * } $phoneNumbers
     */
    public static function with(
        ActivationSettings|array|null $activationSettings = null,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        EndUser|array|null $endUser = null,
        Misc|array|null $misc = null,
        ?string $parentSupportKey = null,
        PhoneNumbers|array|null $phoneNumbers = null,
    ): self {
        $self = new self;

        null !== $activationSettings && $self['activationSettings'] = $activationSettings;
        null !== $customerGroupReference && $self['customerGroupReference'] = $customerGroupReference;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $endUser && $self['endUser'] = $endUser;
        null !== $misc && $self['misc'] = $misc;
        null !== $parentSupportKey && $self['parentSupportKey'] = $parentSupportKey;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * @param ActivationSettings|array{
     *   fastPortEligible?: bool|null, focDatetimeRequested?: FocDatetimeRequested|null
     * } $activationSettings
     */
    public function withActivationSettings(
        ActivationSettings|array $activationSettings
    ): self {
        $self = clone $this;
        $self['activationSettings'] = $activationSettings;

        return $self;
    }

    /**
     * Filter results by customer_group_reference.
     */
    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $self = clone $this;
        $self['customerGroupReference'] = $customerGroupReference;

        return $self;
    }

    /**
     * Filter results by customer_reference.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * @param EndUser|array{admin?: Admin|null} $endUser
     */
    public function withEndUser(EndUser|array $endUser): self
    {
        $self = clone $this;
        $self['endUser'] = $endUser;

        return $self;
    }

    /**
     * @param Misc|array{type?: value-of<PortingOrderType>|null} $misc
     */
    public function withMisc(Misc|array $misc): self
    {
        $self = clone $this;
        $self['misc'] = $misc;

        return $self;
    }

    /**
     * Filter results by parent_support_key.
     */
    public function withParentSupportKey(string $parentSupportKey): self
    {
        $self = clone $this;
        $self['parentSupportKey'] = $parentSupportKey;

        return $self;
    }

    /**
     * @param PhoneNumbers|array{
     *   carrierName?: string|null,
     *   countryCode?: string|null,
     *   phoneNumber?: PhoneNumber|null,
     * } $phoneNumbers
     */
    public function withPhoneNumbers(PhoneNumbers|array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
