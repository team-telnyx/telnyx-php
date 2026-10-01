<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Enterprises\EnterprisePublic\BpoVerificationStatus;
use Telnyx\Enterprises\EnterprisePublic\RoleType;

/**
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 *
 * @phpstan-type EnterprisePublicShape = array{
 *   id?: string|null,
 *   billingAddress?: null|PhysicalAddress|PhysicalAddressShape,
 *   billingContact?: null|BillingContact|BillingContactShape,
 *   bpoVerificationRejectionReason?: string|null,
 *   bpoVerificationStatus?: null|BpoVerificationStatus|value-of<BpoVerificationStatus>,
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
 *   roleType?: null|RoleType|value-of<RoleType>,
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
    public ?PhysicalAddress $billingAddress;

    #[Optional('billing_contact')]
    public ?BillingContact $billingContact;

    /**
     * Reason Telnyx rejected the BPO (Business Process Outsourcer) verification, when `bpo_verification_status` is `rejected`; `null` otherwise.
     */
    #[Optional('bpo_verification_rejection_reason', nullable: true)]
    public ?string $bpoVerificationRejectionReason;

    /**
     * Whether Telnyx has approved this BPO (Business Process Outsourcer) account. Only set for accounts created with `role_type` `bpo`; `null` for normal enterprises. A BPO enterprise must be `approved` before a DIR can be linked to it through `bpo_authorizations`.
     *
     * @var value-of<BpoVerificationStatus>|null $bpoVerificationStatus
     */
    #[Optional(
        'bpo_verification_status',
        enum: BpoVerificationStatus::class,
        nullable: true,
    )]
    public ?string $bpoVerificationStatus;

    /**
     * True once Branded Calling has been activated on this enterprise (see `POST /enterprises/{id}/branded_calling`).
     */
    #[Optional('branded_calling_enabled')]
    public ?bool $brandedCallingEnabled;

    /**
     * The official number your company received when it was legally registered or incorporated (for example from your state or national business registry). It is on your certificate of incorporation.
     */
    #[Optional('corporate_registration_number', nullable: true)]
    public ?string $corporateRegistrationNumber;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Your own label for this account. Enter any reference that helps you find it in your records. Telnyx does not use it during vetting.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * The trade name your business operates under if it is different from your legal name, also called a Doing Business As (DBA) name. Leave blank if you only use your legal name.
     */
    #[Optional('doing_business_as')]
    public ?string $doingBusinessAs;

    /**
     * Your optional 9-digit D-U-N-S Number issued by Dun & Bradstreet, a unique identifier for your business. Leave blank if you do not have one.
     */
    #[Optional('dun_bradstreet_number', nullable: true)]
    public ?string $dunBradstreetNumber;

    /**
     * US Federal Employer Identification Number (`NN-NNNNNNN`) or Canadian equivalent.
     */
    #[Optional]
    public ?string $fein;

    /**
     * The industry your business operates in. Choose the closest match from the list; if your value is not accepted, pick the nearest category.
     */
    #[Optional]
    public ?string $industry;

    /**
     * The state, province, or country where your business was legally incorporated, for example Delaware.
     */
    #[Optional('jurisdiction_of_incorporation')]
    public ?string $jurisdictionOfIncorporation;

    /**
     * Your business's full registered legal name, exactly as it appears on your incorporation or tax documents, 3 to 64 characters.
     */
    #[Optional('legal_name')]
    public ?string $legalName;

    /**
     * Approximate headcount range. Used for vetting heuristics; pick the bucket that contains your current employee count.
     */
    #[Optional('number_of_employees')]
    public ?string $numberOfEmployees;

    /**
     * True once Phone Number Reputation has been enabled on this enterprise (see `POST /enterprises/{id}/reputation`).
     */
    #[Optional('number_reputation_enabled')]
    public ?bool $numberReputationEnabled;

    #[Optional('organization_contact')]
    public ?OrganizationContact $organizationContact;

    /**
     * Legal-entity form. Pick the form that matches your incorporation documents:
     * - `corporation` - C-corp or S-corp.
     * - `llc` - limited liability company.
     * - `partnership` - general/limited partnership.
     * - `nonprofit` - non-profit corporation, charitable trust, or 501(c)(3)/equivalent.
     * - `other` - anything else (sole proprietorships, government bodies, DBAs, etc.). You may be asked for additional documents during vetting.
     */
    #[Optional('organization_legal_type')]
    public ?string $organizationLegalType;

    #[Optional('organization_physical_address')]
    public ?PhysicalAddress $organizationPhysicalAddress;

    #[Optional('organization_type')]
    public ?string $organizationType;

    /**
     * The 4-digit Standard Industrial Classification code for your main line of business, which tells us what industry you operate in. Look it up in the SIC code directory if you are unsure.
     */
    #[Optional('primary_business_domain_sic_code', nullable: true)]
    public ?string $primaryBusinessDomainSicCode;

    /**
     * If your business operates under a professional license (for example legal, medical, or financial services), enter the license number issued by the licensing authority. Leave blank if it does not apply.
     */
    #[Optional('professional_license_number', nullable: true)]
    public ?string $professionalLicenseNumber;

    /** @var value-of<RoleType>|null $roleType */
    #[Optional('role_type', enum: RoleType::class)]
    public ?string $roleType;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Your business's public website address, including https://. Leave blank if your business has no website.
     */
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
     * @param Omitted|BpoVerificationStatus|value-of<BpoVerificationStatus>|null $bpoVerificationStatus
     * @param PhysicalAddress|PhysicalAddressShape|null $billingAddress
     * @param BillingContact|BillingContactShape|null $billingContact
     * @param OrganizationContact|OrganizationContactShape|null $organizationContact
     * @param PhysicalAddress|PhysicalAddressShape|null $organizationPhysicalAddress
     * @param RoleType|value-of<RoleType>|null $roleType
     */
    public static function with(
        string|Omitted|null $bpoVerificationRejectionReason = Omitted::VALUE,
        Omitted|BpoVerificationStatus|string|null $bpoVerificationStatus = Omitted::VALUE,
        string|Omitted|null $corporateRegistrationNumber = Omitted::VALUE,
        string|Omitted|null $dunBradstreetNumber = Omitted::VALUE,
        string|Omitted|null $primaryBusinessDomainSicCode = Omitted::VALUE,
        string|Omitted|null $professionalLicenseNumber = Omitted::VALUE,
        ?string $id = null,
        PhysicalAddress|array|null $billingAddress = null,
        BillingContact|array|null $billingContact = null,
        ?bool $brandedCallingEnabled = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?string $doingBusinessAs = null,
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
        RoleType|string|null $roleType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $website = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $billingAddress && $self['billingAddress'] = $billingAddress;
        null !== $billingContact && $self['billingContact'] = $billingContact;
        Omitted::VALUE !== $bpoVerificationRejectionReason && $self['bpoVerificationRejectionReason'] = $bpoVerificationRejectionReason;
        Omitted::VALUE !== $bpoVerificationStatus && $self['bpoVerificationStatus'] = $bpoVerificationStatus;
        null !== $brandedCallingEnabled && $self['brandedCallingEnabled'] = $brandedCallingEnabled;
        Omitted::VALUE !== $corporateRegistrationNumber && $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $doingBusinessAs && $self['doingBusinessAs'] = $doingBusinessAs;
        Omitted::VALUE !== $dunBradstreetNumber && $self['dunBradstreetNumber'] = $dunBradstreetNumber;
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
        Omitted::VALUE !== $primaryBusinessDomainSicCode && $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;
        Omitted::VALUE !== $professionalLicenseNumber && $self['professionalLicenseNumber'] = $professionalLicenseNumber;
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
     * @param PhysicalAddress|PhysicalAddressShape $billingAddress
     */
    public function withBillingAddress(
        PhysicalAddress|array $billingAddress
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
     * Reason Telnyx rejected the BPO (Business Process Outsourcer) verification, when `bpo_verification_status` is `rejected`; `null` otherwise.
     */
    public function withBpoVerificationRejectionReason(
        ?string $bpoVerificationRejectionReason
    ): self {
        $self = clone $this;
        $self['bpoVerificationRejectionReason'] = $bpoVerificationRejectionReason;

        return $self;
    }

    /**
     * Whether Telnyx has approved this BPO (Business Process Outsourcer) account. Only set for accounts created with `role_type` `bpo`; `null` for normal enterprises. A BPO enterprise must be `approved` before a DIR can be linked to it through `bpo_authorizations`.
     *
     * @param BpoVerificationStatus|value-of<BpoVerificationStatus>|null $bpoVerificationStatus
     */
    public function withBpoVerificationStatus(
        BpoVerificationStatus|string|null $bpoVerificationStatus
    ): self {
        $self = clone $this;
        $self['bpoVerificationStatus'] = $bpoVerificationStatus;

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
     * The official number your company received when it was legally registered or incorporated (for example from your state or national business registry). It is on your certificate of incorporation.
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

    /**
     * Your own label for this account. Enter any reference that helps you find it in your records. Telnyx does not use it during vetting.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * The trade name your business operates under if it is different from your legal name, also called a Doing Business As (DBA) name. Leave blank if you only use your legal name.
     */
    public function withDoingBusinessAs(string $doingBusinessAs): self
    {
        $self = clone $this;
        $self['doingBusinessAs'] = $doingBusinessAs;

        return $self;
    }

    /**
     * Your optional 9-digit D-U-N-S Number issued by Dun & Bradstreet, a unique identifier for your business. Leave blank if you do not have one.
     */
    public function withDunBradstreetNumber(?string $dunBradstreetNumber): self
    {
        $self = clone $this;
        $self['dunBradstreetNumber'] = $dunBradstreetNumber;

        return $self;
    }

    /**
     * US Federal Employer Identification Number (`NN-NNNNNNN`) or Canadian equivalent.
     */
    public function withFein(string $fein): self
    {
        $self = clone $this;
        $self['fein'] = $fein;

        return $self;
    }

    /**
     * The industry your business operates in. Choose the closest match from the list; if your value is not accepted, pick the nearest category.
     */
    public function withIndustry(string $industry): self
    {
        $self = clone $this;
        $self['industry'] = $industry;

        return $self;
    }

    /**
     * The state, province, or country where your business was legally incorporated, for example Delaware.
     */
    public function withJurisdictionOfIncorporation(
        string $jurisdictionOfIncorporation
    ): self {
        $self = clone $this;
        $self['jurisdictionOfIncorporation'] = $jurisdictionOfIncorporation;

        return $self;
    }

    /**
     * Your business's full registered legal name, exactly as it appears on your incorporation or tax documents, 3 to 64 characters.
     */
    public function withLegalName(string $legalName): self
    {
        $self = clone $this;
        $self['legalName'] = $legalName;

        return $self;
    }

    /**
     * Approximate headcount range. Used for vetting heuristics; pick the bucket that contains your current employee count.
     */
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

    /**
     * Legal-entity form. Pick the form that matches your incorporation documents:
     * - `corporation` - C-corp or S-corp.
     * - `llc` - limited liability company.
     * - `partnership` - general/limited partnership.
     * - `nonprofit` - non-profit corporation, charitable trust, or 501(c)(3)/equivalent.
     * - `other` - anything else (sole proprietorships, government bodies, DBAs, etc.). You may be asked for additional documents during vetting.
     */
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
     * The 4-digit Standard Industrial Classification code for your main line of business, which tells us what industry you operate in. Look it up in the SIC code directory if you are unsure.
     */
    public function withPrimaryBusinessDomainSicCode(
        ?string $primaryBusinessDomainSicCode
    ): self {
        $self = clone $this;
        $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;

        return $self;
    }

    /**
     * If your business operates under a professional license (for example legal, medical, or financial services), enter the license number issued by the licensing authority. Leave blank if it does not apply.
     */
    public function withProfessionalLicenseNumber(
        ?string $professionalLicenseNumber
    ): self {
        $self = clone $this;
        $self['professionalLicenseNumber'] = $professionalLicenseNumber;

        return $self;
    }

    /**
     * @param RoleType|value-of<RoleType> $roleType
     */
    public function withRoleType(RoleType|string $roleType): self
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

    /**
     * Your business's public website address, including https://. Leave blank if your business has no website.
     */
    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
