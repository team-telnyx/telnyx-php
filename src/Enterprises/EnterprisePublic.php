<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BillingAddressShape from \Telnyx\Enterprises\BillingAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
 *
 * @phpstan-type EnterprisePublicShape = array{
 *   id?: string|null,
 *   billingAddress?: null|BillingAddress|BillingAddressShape,
 *   billingContact?: null|BillingContact|BillingContactShape,
 *   brandedCallingEnabled?: bool|null,
 *   corporateRegistrationNumber?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   doingBusinessAs?: string|null,
 *   dunBradstreetNumber?: string|null,
 *   fein?: string|null,
 *   industry?: string|null,
 *   jurisdictionOfIncorporation?: string|null,
 *   legalName?: string|null,
 *   numberOfEmployees?: string|null,
 *   numberReputationEnabled?: bool|null,
 *   organizationContact?: null|OrganizationContact|OrganizationContactShape,
 *   organizationLegalType?: string|null,
 *   organizationPhysicalAddress?: null|PhysicalAddress|PhysicalAddressShape,
 *   organizationType?: string|null,
 *   primaryBusinessDomainSicCode?: string|null,
 *   professionalLicenseNumber?: string|null,
 *   roleType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   website?: string|null,
 * }
 */
final class EnterprisePublic implements BaseModel
{
    /** @use SdkModel<EnterprisePublicShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('billing_address')]
    public ?BillingAddress $billingAddress;

    #[Optional('billing_contact')]
    public ?BillingContact $billingContact;

    /**
     * True once Branded Calling has been activated on this enterprise (see `POST /enterprises/{id}/branded_calling`).
     */
    #[Optional('branded_calling_enabled')]
    public ?bool $brandedCallingEnabled;

    /**
     * Optional corporate-registration / company-number identifier.
     */
    #[Optional('corporate_registration_number', nullable: true)]
    public ?string $corporateRegistrationNumber;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('customer_reference')]
    public ?string $customerReference;

    #[Optional('doing_business_as')]
    public ?string $doingBusinessAs;

    /**
     * Optional D-U-N-S Number issued by Dun & Bradstreet.
     */
    #[Optional('dun_bradstreet_number', nullable: true)]
    public ?string $dunBradstreetNumber;

    #[Optional]
    public ?string $fein;

    #[Optional]
    public ?string $industry;

    #[Optional('jurisdiction_of_incorporation')]
    public ?string $jurisdictionOfIncorporation;

    #[Optional('legal_name')]
    public ?string $legalName;

    #[Optional('number_of_employees')]
    public ?string $numberOfEmployees;

    /**
     * True once Phone Number Reputation has been enabled on this enterprise (see `POST /enterprises/{id}/reputation`).
     */
    #[Optional('number_reputation_enabled')]
    public ?bool $numberReputationEnabled;

    #[Optional('organization_contact')]
    public ?OrganizationContact $organizationContact;

    #[Optional('organization_legal_type')]
    public ?string $organizationLegalType;

    #[Optional('organization_physical_address')]
    public ?PhysicalAddress $organizationPhysicalAddress;

    #[Optional('organization_type')]
    public ?string $organizationType;

    /**
     * Optional SIC code for the primary line of business.
     */
    #[Optional('primary_business_domain_sic_code', nullable: true)]
    public ?string $primaryBusinessDomainSicCode;

    /**
     * Optional professional-license number for regulated industries.
     */
    #[Optional('professional_license_number', nullable: true)]
    public ?string $professionalLicenseNumber;

    #[Optional('role_type')]
    public ?string $roleType;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
     * @param OrganizationContact|OrganizationContactShape|null $organizationContact
     * @param PhysicalAddress|PhysicalAddressShape|null $organizationPhysicalAddress
     */
    public static function with(
        ?string $id = null,
        BillingAddress|array|null $billingAddress = null,
        BillingContact|array|null $billingContact = null,
        ?bool $brandedCallingEnabled = null,
        ?string $corporateRegistrationNumber = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?string $doingBusinessAs = null,
        ?string $dunBradstreetNumber = null,
        ?string $fein = null,
        ?string $industry = null,
        ?string $jurisdictionOfIncorporation = null,
        ?string $legalName = null,
        ?string $numberOfEmployees = null,
        ?bool $numberReputationEnabled = null,
        OrganizationContact|array|null $organizationContact = null,
        ?string $organizationLegalType = null,
        PhysicalAddress|array|null $organizationPhysicalAddress = null,
        ?string $organizationType = null,
        ?string $primaryBusinessDomainSicCode = null,
        ?string $professionalLicenseNumber = null,
        ?string $roleType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $website = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $billingAddress && $self['billingAddress'] = $billingAddress;
        null !== $billingContact && $self['billingContact'] = $billingContact;
        null !== $brandedCallingEnabled && $self['brandedCallingEnabled'] = $brandedCallingEnabled;
        null !== $corporateRegistrationNumber && $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $doingBusinessAs && $self['doingBusinessAs'] = $doingBusinessAs;
        null !== $dunBradstreetNumber && $self['dunBradstreetNumber'] = $dunBradstreetNumber;
        null !== $fein && $self['fein'] = $fein;
        null !== $industry && $self['industry'] = $industry;
        null !== $jurisdictionOfIncorporation && $self['jurisdictionOfIncorporation'] = $jurisdictionOfIncorporation;
        null !== $legalName && $self['legalName'] = $legalName;
        null !== $numberOfEmployees && $self['numberOfEmployees'] = $numberOfEmployees;
        null !== $numberReputationEnabled && $self['numberReputationEnabled'] = $numberReputationEnabled;
        null !== $organizationContact && $self['organizationContact'] = $organizationContact;
        null !== $organizationLegalType && $self['organizationLegalType'] = $organizationLegalType;
        null !== $organizationPhysicalAddress && $self['organizationPhysicalAddress'] = $organizationPhysicalAddress;
        null !== $organizationType && $self['organizationType'] = $organizationType;
        null !== $primaryBusinessDomainSicCode && $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;
        null !== $professionalLicenseNumber && $self['professionalLicenseNumber'] = $professionalLicenseNumber;
        null !== $roleType && $self['roleType'] = $roleType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $website && $self['website'] = $website;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    /**
     * True once Branded Calling has been activated on this enterprise (see `POST /enterprises/{id}/branded_calling`).
     */
    public function withBrandedCallingEnabled(bool $brandedCallingEnabled): self
    {
        $self = clone $this;
        $self['brandedCallingEnabled'] = $brandedCallingEnabled;

        return $self;
    }

    /**
     * Optional corporate-registration / company-number identifier.
     */
    public function withCorporateRegistrationNumber(
        ?string $corporateRegistrationNumber
    ): self {
        $self = clone $this;
        $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    /**
     * Optional D-U-N-S Number issued by Dun & Bradstreet.
     */
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

    public function withIndustry(string $industry): self
    {
        $self = clone $this;
        $self['industry'] = $industry;

        return $self;
    }

    public function withJurisdictionOfIncorporation(
        string $jurisdictionOfIncorporation
    ): self {
        $self = clone $this;
        $self['jurisdictionOfIncorporation'] = $jurisdictionOfIncorporation;

        return $self;
    }

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
     * True once Phone Number Reputation has been enabled on this enterprise (see `POST /enterprises/{id}/reputation`).
     */
    public function withNumberReputationEnabled(
        bool $numberReputationEnabled
    ): self {
        $self = clone $this;
        $self['numberReputationEnabled'] = $numberReputationEnabled;

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

    public function withOrganizationType(string $organizationType): self
    {
        $self = clone $this;
        $self['organizationType'] = $organizationType;

        return $self;
    }

    /**
     * Optional SIC code for the primary line of business.
     */
    public function withPrimaryBusinessDomainSicCode(
        ?string $primaryBusinessDomainSicCode
    ): self {
        $self = clone $this;
        $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;

        return $self;
    }

    /**
     * Optional professional-license number for regulated industries.
     */
    public function withProfessionalLicenseNumber(
        ?string $professionalLicenseNumber
    ): self {
        $self = clone $this;
        $self['professionalLicenseNumber'] = $professionalLicenseNumber;

        return $self;
    }

    public function withRoleType(string $roleType): self
    {
        $self = clone $this;
        $self['roleType'] = $roleType;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
