<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortingOrderEndUserAdminShape = array{
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
    /** @use SdkModel<PortingOrderEndUserAdminShape> */
    use SdkModel;

    /**
     * The authorized person's account number with the current service provider.
     */
    #[Optional('account_number', nullable: true)]
    public ?string $accountNumber;

    /**
     * Name of person authorizing the porting order.
     */
    #[Optional('auth_person_name', nullable: true)]
    public ?string $authPersonName;

    /**
     * Billing phone number associated with these phone numbers.
     */
    #[Optional('billing_phone_number', nullable: true)]
    public ?string $billingPhoneNumber;

    /**
     * European business identification number. Applicable only in the European Union.
     */
    #[Optional('business_identifier', nullable: true)]
    public ?string $businessIdentifier;

    /**
     * Person Name or Company name requesting the port.
     */
    #[Optional('entity_name', nullable: true)]
    public ?string $entityName;

    /**
     * PIN/passcode possibly required by the old service provider for extra verification.
     */
    #[Optional('pin_passcode', nullable: true)]
    public ?string $pinPasscode;

    /**
     * European tax identification number. Applicable only in the European Union.
     */
    #[Optional('tax_identifier', nullable: true)]
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
        $self = new self;

        null !== $accountNumber && $self['accountNumber'] = $accountNumber;
        null !== $authPersonName && $self['authPersonName'] = $authPersonName;
        null !== $billingPhoneNumber && $self['billingPhoneNumber'] = $billingPhoneNumber;
        null !== $businessIdentifier && $self['businessIdentifier'] = $businessIdentifier;
        null !== $entityName && $self['entityName'] = $entityName;
        null !== $pinPasscode && $self['pinPasscode'] = $pinPasscode;
        null !== $taxIdentifier && $self['taxIdentifier'] = $taxIdentifier;

        return $self;
    }

    /**
     * The authorized person's account number with the current service provider.
     */
    public function withAccountNumber(?string $accountNumber): self
    {
        $self = clone $this;
        $self['accountNumber'] = $accountNumber;

        return $self;
    }

    /**
     * Name of person authorizing the porting order.
     */
    public function withAuthPersonName(?string $authPersonName): self
    {
        $self = clone $this;
        $self['authPersonName'] = $authPersonName;

        return $self;
    }

    /**
     * Billing phone number associated with these phone numbers.
     */
    public function withBillingPhoneNumber(?string $billingPhoneNumber): self
    {
        $self = clone $this;
        $self['billingPhoneNumber'] = $billingPhoneNumber;

        return $self;
    }

    /**
     * European business identification number. Applicable only in the European Union.
     */
    public function withBusinessIdentifier(?string $businessIdentifier): self
    {
        $self = clone $this;
        $self['businessIdentifier'] = $businessIdentifier;

        return $self;
    }

    /**
     * Person Name or Company name requesting the port.
     */
    public function withEntityName(?string $entityName): self
    {
        $self = clone $this;
        $self['entityName'] = $entityName;

        return $self;
    }

    /**
     * PIN/passcode possibly required by the old service provider for extra verification.
     */
    public function withPinPasscode(?string $pinPasscode): self
    {
        $self = clone $this;
        $self['pinPasscode'] = $pinPasscode;

        return $self;
    }

    /**
     * European tax identification number. Applicable only in the European Union.
     */
    public function withTaxIdentifier(?string $taxIdentifier): self
    {
        $self = clone $this;
        $self['taxIdentifier'] = $taxIdentifier;

        return $self;
    }
}
