<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Enterprises\EnterpriseUpdateParams\Industry;

/**
 * Replace the enterprise's mutable fields. Only mutable fields may be sent. Server-assigned and immutable fields (`id`, `record_type`, `created_at`, `updated_at`, status fields, `organization_type`, `country_code`, `role_type`) cannot be changed: including any of them in the body is rejected with `400 Bad Request` (`Field 'X' is not allowed in this request`).
 *
 * For an approved BPO enterprise (`role_type` `bpo`), changing any identity field (legal name, DBA, website, FEIN, industry, number of employees, physical address, organization contact, D-U-N-S number, legal type, SIC code, corporate registration number, professional license number, or jurisdiction of incorporation) resets `bpo_verification_status` to `pending` for re-approval and sets every DIR authorization for that BPO to `rejected`. After re-approval, link it again with a newly signed LOA (a new `loa_document_id`); resending the old one keeps the authorization `rejected`. Re-sending an unchanged value does not reset anything.
 *
 * If Number Reputation is enabled on the enterprise, `legal_name`, `doing_business_as`, `website`, `fein`, `industry`, `number_of_employees`, `organization_physical_address`, `organization_contact`, and `dun_bradstreet_number` cannot be changed: the request is rejected with `400`.
 *
 * @see Telnyx\Services\EnterprisesService::update()
 *
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 *
 * @phpstan-type EnterpriseUpdateParamsShape = array{
 *   billingAddress?: null|PhysicalAddress|PhysicalAddressShape,
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
    public ?PhysicalAddress $billingAddress;

    #[Optional('billing_contact')]
    public ?BillingContact $billingContact;

    /**
     * The official number your company received when it was legally registered or incorporated (for example from your state or national business registry). It is on your certificate of incorporation.
     */
    #[Optional('corporate_registration_number', nullable: true)]
    public ?string $corporateRegistrationNumber;

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
     *
     * @var value-of<Industry>|null $industry
     */
    #[Optional(enum: Industry::class)]
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
     * @param PhysicalAddress|PhysicalAddressShape|null $billingAddress
     * @param BillingContact|BillingContactShape|null $billingContact
     * @param Industry|value-of<Industry>|null $industry
     * @param OrganizationContact|OrganizationContactShape|null $organizationContact
     * @param PhysicalAddress|PhysicalAddressShape|null $organizationPhysicalAddress
     */
    public static function with(
        string|Omitted|null $corporateRegistrationNumber = Omitted::VALUE,
        string|Omitted|null $dunBradstreetNumber = Omitted::VALUE,
        string|Omitted|null $primaryBusinessDomainSicCode = Omitted::VALUE,
        string|Omitted|null $professionalLicenseNumber = Omitted::VALUE,
        PhysicalAddress|array|null $billingAddress = null,
        BillingContact|array|null $billingContact = null,
        ?string $customerReference = null,
        ?string $doingBusinessAs = null,
        ?string $fein = null,
        Industry|string|null $industry = null,
        ?string $jurisdictionOfIncorporation = null,
        ?string $legalName = null,
        ?string $numberOfEmployees = null,
        OrganizationContact|array|null $organizationContact = null,
        ?string $organizationLegalType = null,
        PhysicalAddress|array|null $organizationPhysicalAddress = null,
        ?string $website = null,
    ): self {
        $self = new self;

        null !== $billingAddress && $self['billingAddress'] = $billingAddress;
        null !== $billingContact && $self['billingContact'] = $billingContact;
        Omitted::VALUE !== $corporateRegistrationNumber && $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $doingBusinessAs && $self['doingBusinessAs'] = $doingBusinessAs;
        Omitted::VALUE !== $dunBradstreetNumber && $self['dunBradstreetNumber'] = $dunBradstreetNumber;
        null !== $fein && $self['fein'] = $fein;
        null !== $industry && $self['industry'] = $industry;
        null !== $jurisdictionOfIncorporation && $self['jurisdictionOfIncorporation'] = $jurisdictionOfIncorporation;
        null !== $legalName && $self['legalName'] = $legalName;
        null !== $numberOfEmployees && $self['numberOfEmployees'] = $numberOfEmployees;
        null !== $organizationContact && $self['organizationContact'] = $organizationContact;
        null !== $organizationLegalType && $self['organizationLegalType'] = $organizationLegalType;
        null !== $organizationPhysicalAddress && $self['organizationPhysicalAddress'] = $organizationPhysicalAddress;
        Omitted::VALUE !== $primaryBusinessDomainSicCode && $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;
        Omitted::VALUE !== $professionalLicenseNumber && $self['professionalLicenseNumber'] = $professionalLicenseNumber;
        null !== $website && $self['website'] = $website;

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
     * The official number your company received when it was legally registered or incorporated (for example from your state or national business registry). It is on your certificate of incorporation.
     */
    public function withCorporateRegistrationNumber(
        ?string $corporateRegistrationNumber
    ): self {
        $self = clone $this;
        $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;

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
     *
     * @param Industry|value-of<Industry> $industry
     */
    public function withIndustry(Industry|string $industry): self
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
     * Your business's public website address, including https://. Leave blank if your business has no website.
     */
    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
