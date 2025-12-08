<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortingOrderEndUserAdminShape = array{
 *   account_number?: string|null,
 *   auth_person_name?: string|null,
 *   billing_phone_number?: string|null,
 *   business_identifier?: string|null,
 *   entity_name?: string|null,
 *   pin_passcode?: string|null,
 *   tax_identifier?: string|null,
 * }
 */
final class PortingOrderEndUserAdmin implements BaseModel
{
    /** @use SdkModel<PortingOrderEndUserAdminShape> */
    use SdkModel;

    /**
     * The authorized person's account number with the current service provider.
     */
    #[Optional(nullable: true)]
    public ?string $account_number;

    /**
     * Name of person authorizing the porting order.
     */
    #[Optional(nullable: true)]
    public ?string $auth_person_name;

    /**
     * Billing phone number associated with these phone numbers.
     */
    #[Optional(nullable: true)]
    public ?string $billing_phone_number;

    /**
     * European business identification number. Applicable only in the European Union.
     */
    #[Optional(nullable: true)]
    public ?string $business_identifier;

    /**
     * Person Name or Company name requesting the port.
     */
    #[Optional(nullable: true)]
    public ?string $entity_name;

    /**
     * PIN/passcode possibly required by the old service provider for extra verification.
     */
    #[Optional(nullable: true)]
    public ?string $pin_passcode;

    /**
     * European tax identification number. Applicable only in the European Union.
     */
    #[Optional(nullable: true)]
    public ?string $tax_identifier;

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
        ?string $account_number = null,
        ?string $auth_person_name = null,
        ?string $billing_phone_number = null,
        ?string $business_identifier = null,
        ?string $entity_name = null,
        ?string $pin_passcode = null,
        ?string $tax_identifier = null,
    ): self {
        $obj = new self;

        null !== $account_number && $obj['account_number'] = $account_number;
        null !== $auth_person_name && $obj['auth_person_name'] = $auth_person_name;
        null !== $billing_phone_number && $obj['billing_phone_number'] = $billing_phone_number;
        null !== $business_identifier && $obj['business_identifier'] = $business_identifier;
        null !== $entity_name && $obj['entity_name'] = $entity_name;
        null !== $pin_passcode && $obj['pin_passcode'] = $pin_passcode;
        null !== $tax_identifier && $obj['tax_identifier'] = $tax_identifier;

        return $obj;
    }

    /**
     * The authorized person's account number with the current service provider.
     */
    public function withAccountNumber(?string $accountNumber): self
    {
        $obj = clone $this;
        $obj['account_number'] = $accountNumber;

        return $obj;
    }

    /**
     * Name of person authorizing the porting order.
     */
    public function withAuthPersonName(?string $authPersonName): self
    {
        $obj = clone $this;
        $obj['auth_person_name'] = $authPersonName;

        return $obj;
    }

    /**
     * Billing phone number associated with these phone numbers.
     */
    public function withBillingPhoneNumber(?string $billingPhoneNumber): self
    {
        $obj = clone $this;
        $obj['billing_phone_number'] = $billingPhoneNumber;

        return $obj;
    }

    /**
     * European business identification number. Applicable only in the European Union.
     */
    public function withBusinessIdentifier(?string $businessIdentifier): self
    {
        $obj = clone $this;
        $obj['business_identifier'] = $businessIdentifier;

        return $obj;
    }

    /**
     * Person Name or Company name requesting the port.
     */
    public function withEntityName(?string $entityName): self
    {
        $obj = clone $this;
        $obj['entity_name'] = $entityName;

        return $obj;
    }

    /**
     * PIN/passcode possibly required by the old service provider for extra verification.
     */
    public function withPinPasscode(?string $pinPasscode): self
    {
        $obj = clone $this;
        $obj['pin_passcode'] = $pinPasscode;

        return $obj;
    }

    /**
     * European tax identification number. Applicable only in the European Union.
     */
    public function withTaxIdentifier(?string $taxIdentifier): self
    {
        $obj = clone $this;
        $obj['tax_identifier'] = $taxIdentifier;

        return $obj;
    }
}
