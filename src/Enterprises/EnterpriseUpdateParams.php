<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\EnterpriseUpdateParams\Industry;

/**
 * Replace the enterprise's mutable fields. Only mutable fields may be sent. Server-assigned and immutable fields (`id`, `record_type`, `created_at`, `updated_at`, status fields, `organization_type`, `country_code`, `role_type`) cannot be changed: including any of them in the body is rejected with `400 Bad Request` (`Field 'X' is not allowed in this request`).
 *
 * @see Telnyx\Services\EnterprisesService::update()
 *
 * @phpstan-import-type BillingAddressShape from \Telnyx\Enterprises\BillingAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
 *
 * @phpstan-type EnterpriseUpdateParamsShape = array{
 *   billingAddress?: null|BillingAddress|BillingAddressShape,
 *   billingContact?: null|BillingContact|BillingContactShape,
 *   corporateRegistrationNumber?: string|null,
 *   customerReference?: string|null,
 *   doingBusinessAs?: string|null,
 *   dunBradstreetNumber?: string|null,
 *   fein?: string|null,
 *   industry?: null|Industry|value-of<Industry>,
 *   jurisdictionOfIncorporation?: string|null,
 *   legalName?: string|null,
 *   numberOfEmployees?: string|null,
 *   organizationContact?: null|OrganizationContact|OrganizationContactShape,
 *   organizationLegalType?: string|null,
 *   organizationPhysicalAddress?: null|PhysicalAddress|PhysicalAddressShape,
 *   primaryBusinessDomainSicCode?: string|null,
 *   professionalLicenseNumber?: string|null,
 *   website?: string|null,
 * }
 */
final class EnterpriseUpdateParams implements BaseModel
{
    /** @use SdkModel<EnterpriseUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional('billing_address')]
    public ?BillingAddress $billingAddress;

    #[Optional('billing_contact')]
    public ?BillingContact $billingContact;

    #[Optional('corporate_registration_number', nullable: true)]
    public ?string $corporateRegistrationNumber;

    #[Optional('customer_reference')]
    public ?string $customerReference;

    #[Optional('doing_business_as')]
    public ?string $doingBusinessAs;

    #[Optional('dun_bradstreet_number', nullable: true)]
    public ?string $dunBradstreetNumber;

    #[Optional]
    public ?string $fein;

    /** @var value-of<Industry>|null $industry */
    #[Optional(enum: Industry::class)]
    public ?string $industry;

    /**
     * Updated state/province/country of incorporation. Optional on update.
     */
    #[Optional('jurisdiction_of_incorporation')]
    public ?string $jurisdictionOfIncorporation;

    /**
     * Legal name of the enterprise.
     */
    #[Optional('legal_name')]
    public ?string $legalName;

    #[Optional('number_of_employees')]
    public ?string $numberOfEmployees;

    #[Optional('organization_contact')]
    public ?OrganizationContact $organizationContact;

    #[Optional('organization_legal_type')]
    public ?string $organizationLegalType;

    #[Optional('organization_physical_address')]
    public ?PhysicalAddress $organizationPhysicalAddress;

    #[Optional('primary_business_domain_sic_code', nullable: true)]
    public ?string $primaryBusinessDomainSicCode;

    #[Optional('professional_license_number', nullable: true)]
    public ?string $professionalLicenseNumber;

    #[Optional]
    public ?string $website;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BillingAddress|BillingAddressShape|null $billingAddress
     * @param BillingContact|BillingContactShape|null $billingContact
     * @param Industry|value-of<Industry>|null $industry
     * @param OrganizationContact|OrganizationContactShape|null $organizationContact
     * @param PhysicalAddress|PhysicalAddressShape|null $organizationPhysicalAddress
     */
    public static function with(
        BillingAddress|array|null $billingAddress = null,
        BillingContact|array|null $billingContact = null,
        ?string $corporateRegistrationNumber = null,
        ?string $customerReference = null,
        ?string $doingBusinessAs = null,
        ?string $dunBradstreetNumber = null,
        ?string $fein = null,
        Industry|string|null $industry = null,
        ?string $jurisdictionOfIncorporation = null,
        ?string $legalName = null,
        ?string $numberOfEmployees = null,
        OrganizationContact|array|null $organizationContact = null,
        ?string $organizationLegalType = null,
        PhysicalAddress|array|null $organizationPhysicalAddress = null,
        ?string $primaryBusinessDomainSicCode = null,
        ?string $professionalLicenseNumber = null,
        ?string $website = null,
    ): self {
        $self = new self;

        null !== $billingAddress && $self['billingAddress'] = $billingAddress;
        null !== $billingContact && $self['billingContact'] = $billingContact;
        null !== $corporateRegistrationNumber && $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $doingBusinessAs && $self['doingBusinessAs'] = $doingBusinessAs;
        null !== $dunBradstreetNumber && $self['dunBradstreetNumber'] = $dunBradstreetNumber;
        null !== $fein && $self['fein'] = $fein;
        null !== $industry && $self['industry'] = $industry;
        null !== $jurisdictionOfIncorporation && $self['jurisdictionOfIncorporation'] = $jurisdictionOfIncorporation;
        null !== $legalName && $self['legalName'] = $legalName;
        null !== $numberOfEmployees && $self['numberOfEmployees'] = $numberOfEmployees;
        null !== $organizationContact && $self['organizationContact'] = $organizationContact;
        null !== $organizationLegalType && $self['organizationLegalType'] = $organizationLegalType;
        null !== $organizationPhysicalAddress && $self['organizationPhysicalAddress'] = $organizationPhysicalAddress;
        null !== $primaryBusinessDomainSicCode && $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;
        null !== $professionalLicenseNumber && $self['professionalLicenseNumber'] = $professionalLicenseNumber;
        null !== $website && $self['website'] = $website;

        return $self;
    }

    /**
     * @param BillingAddress|BillingAddressShape $billingAddress
     */
    public function withBillingAddress(
        BillingAddress|array $billingAddress
    ): self {
        $self = clone $this;
        $self['billingAddress'] = $billingAddress;

        return $self;
    }

    /**
     * @param BillingContact|BillingContactShape $billingContact
     */
    public function withBillingContact(
        BillingContact|array $billingContact
    ): self {
        $self = clone $this;
        $self['billingContact'] = $billingContact;

        return $self;
    }

    public function withCorporateRegistrationNumber(
        ?string $corporateRegistrationNumber
    ): self {
        $self = clone $this;
        $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;

        return $self;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    public function withDoingBusinessAs(string $doingBusinessAs): self
    {
        $self = clone $this;
        $self['doingBusinessAs'] = $doingBusinessAs;

        return $self;
    }

    public function withDunBradstreetNumber(?string $dunBradstreetNumber): self
    {
        $self = clone $this;
        $self['dunBradstreetNumber'] = $dunBradstreetNumber;

        return $self;
    }

    public function withFein(string $fein): self
    {
        $self = clone $this;
        $self['fein'] = $fein;

        return $self;
    }

    /**
     * @param Industry|value-of<Industry> $industry
     */
    public function withIndustry(Industry|string $industry): self
    {
        $self = clone $this;
        $self['industry'] = $industry;

        return $self;
    }

    /**
     * Updated state/province/country of incorporation. Optional on update.
     */
    public function withJurisdictionOfIncorporation(
        string $jurisdictionOfIncorporation
    ): self {
        $self = clone $this;
        $self['jurisdictionOfIncorporation'] = $jurisdictionOfIncorporation;

        return $self;
    }

    /**
     * Legal name of the enterprise.
     */
    public function withLegalName(string $legalName): self
    {
        $self = clone $this;
        $self['legalName'] = $legalName;

        return $self;
    }

    public function withNumberOfEmployees(string $numberOfEmployees): self
    {
        $self = clone $this;
        $self['numberOfEmployees'] = $numberOfEmployees;

        return $self;
    }

    /**
     * @param OrganizationContact|OrganizationContactShape $organizationContact
     */
    public function withOrganizationContact(
        OrganizationContact|array $organizationContact
    ): self {
        $self = clone $this;
        $self['organizationContact'] = $organizationContact;

        return $self;
    }

    public function withOrganizationLegalType(
        string $organizationLegalType
    ): self {
        $self = clone $this;
        $self['organizationLegalType'] = $organizationLegalType;

        return $self;
    }

    /**
     * @param PhysicalAddress|PhysicalAddressShape $organizationPhysicalAddress
     */
    public function withOrganizationPhysicalAddress(
        PhysicalAddress|array $organizationPhysicalAddress
    ): self {
        $self = clone $this;
        $self['organizationPhysicalAddress'] = $organizationPhysicalAddress;

        return $self;
    }

    public function withPrimaryBusinessDomainSicCode(
        ?string $primaryBusinessDomainSicCode
    ): self {
        $self = clone $this;
        $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;

        return $self;
    }

    public function withProfessionalLicenseNumber(
        ?string $professionalLicenseNumber
    ): self {
        $self = clone $this;
        $self['professionalLicenseNumber'] = $professionalLicenseNumber;

        return $self;
    }

    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
