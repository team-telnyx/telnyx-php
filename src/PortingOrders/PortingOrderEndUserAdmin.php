<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type porting_order_end_user_admin = array{
 *   accountNumber?: string|null,
 *   authPersonName?: string|null,
 *   billingPhoneNumber?: string|null,
 *   businessIdentifier?: string|null,
 *   entityName?: string|null,
 *   pinPasscode?: string|null,
 *   taxIdentifier?: string|null,
 * }
 */
final class PortingOrderEndUserAdmin implements BaseModel
{
    /** @use SdkModel<porting_order_end_user_admin> */
    use SdkModel;

    /**
     * The authorized person's account number with the current service provider.
     */
    #[Api('account_number', optional: true)]
    public ?string $accountNumber;

    /**
     * Name of person authorizing the porting order.
     */
    #[Api('auth_person_name', optional: true)]
    public ?string $authPersonName;

    /**
     * Billing phone number associated with these phone numbers.
     */
    #[Api('billing_phone_number', optional: true)]
    public ?string $billingPhoneNumber;

    /**
     * European business identification number. Applicable only in the European Union.
     */
    #[Api('business_identifier', optional: true)]
    public ?string $businessIdentifier;

    /**
     * Person Name or Company name requesting the port.
     */
    #[Api('entity_name', optional: true)]
    public ?string $entityName;

    /**
     * PIN/passcode possibly required by the old service provider for extra verification.
     */
    #[Api('pin_passcode', optional: true)]
    public ?string $pinPasscode;

    /**
     * European tax identification number. Applicable only in the European Union.
     */
    #[Api('tax_identifier', optional: true)]
    public ?string $taxIdentifier;

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
        ?string $accountNumber = null,
        ?string $authPersonName = null,
        ?string $billingPhoneNumber = null,
        ?string $businessIdentifier = null,
        ?string $entityName = null,
        ?string $pinPasscode = null,
        ?string $taxIdentifier = null,
    ): self {
        $obj = new self;

        null !== $accountNumber && $obj->accountNumber = $accountNumber;
        null !== $authPersonName && $obj->authPersonName = $authPersonName;
        null !== $billingPhoneNumber && $obj->billingPhoneNumber = $billingPhoneNumber;
        null !== $businessIdentifier && $obj->businessIdentifier = $businessIdentifier;
        null !== $entityName && $obj->entityName = $entityName;
        null !== $pinPasscode && $obj->pinPasscode = $pinPasscode;
        null !== $taxIdentifier && $obj->taxIdentifier = $taxIdentifier;

        return $obj;
    }

    /**
     * The authorized person's account number with the current service provider.
     */
    public function withAccountNumber(string $accountNumber): self
    {
        $obj = clone $this;
        $obj->accountNumber = $accountNumber;

        return $obj;
    }

    /**
     * Name of person authorizing the porting order.
     */
    public function withAuthPersonName(string $authPersonName): self
    {
        $obj = clone $this;
        $obj->authPersonName = $authPersonName;

        return $obj;
    }

    /**
     * Billing phone number associated with these phone numbers.
     */
    public function withBillingPhoneNumber(string $billingPhoneNumber): self
    {
        $obj = clone $this;
        $obj->billingPhoneNumber = $billingPhoneNumber;

        return $obj;
    }

    /**
     * European business identification number. Applicable only in the European Union.
     */
    public function withBusinessIdentifier(string $businessIdentifier): self
    {
        $obj = clone $this;
        $obj->businessIdentifier = $businessIdentifier;

        return $obj;
    }

    /**
     * Person Name or Company name requesting the port.
     */
    public function withEntityName(string $entityName): self
    {
        $obj = clone $this;
        $obj->entityName = $entityName;

        return $obj;
    }

    /**
     * PIN/passcode possibly required by the old service provider for extra verification.
     */
    public function withPinPasscode(string $pinPasscode): self
    {
        $obj = clone $this;
        $obj->pinPasscode = $pinPasscode;

        return $obj;
    }

    /**
     * European tax identification number. Applicable only in the European Union.
     */
    public function withTaxIdentifier(string $taxIdentifier): self
    {
        $obj = clone $this;
        $obj->taxIdentifier = $taxIdentifier;

        return $obj;
    }
}
