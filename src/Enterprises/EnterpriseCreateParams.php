<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\EnterpriseCreateParams\Industry;
use Telnyx\Enterprises\EnterpriseCreateParams\NumberOfEmployees;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationLegalType;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationType;
use Telnyx\Enterprises\EnterpriseCreateParams\RoleType;

/**
 * Create the legal entity (enterprise) that represents your business on the Telnyx platform.
 *
 * The response carries a server-assigned `id` you use for every subsequent call. An enterprise is created once and reused; the API collects all required fields up front.
 *
 * Common failure modes:
 * - `422` — a required field is missing or malformed (the response `errors[].source.pointer` names the field).
 * - `409` — an enterprise with the same identifying details already exists under your account.
 *
 * @see Telnyx\Services\EnterprisesService::create()
 *
 * @phpstan-import-type BillingAddressShape from \Telnyx\Enterprises\BillingAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
 *
 * @phpstan-type EnterpriseCreateParamsShape = array{
 *   billingAddress: BillingAddress|BillingAddressShape,
 *   billingContact: BillingContact|BillingContactShape,
 *   countryCode: string,
 *   doingBusinessAs: string,
 *   fein: string,
 *   industry: Industry|value-of<Industry>,
 *   jurisdictionOfIncorporation: string,
 *   legalName: string,
 *   numberOfEmployees: NumberOfEmployees|value-of<NumberOfEmployees>,
 *   organizationContact: OrganizationContact|OrganizationContactShape,
 *   organizationLegalType: OrganizationLegalType|value-of<OrganizationLegalType>,
 *   organizationPhysicalAddress: PhysicalAddress|PhysicalAddressShape,
 *   organizationType: OrganizationType|value-of<OrganizationType>,
 *   website: string,
 *   corporateRegistrationNumber?: string|null,
 *   customerReference?: string|null,
 *   dunBradstreetNumber?: string|null,
 *   primaryBusinessDomainSicCode?: string|null,
 *   professionalLicenseNumber?: string|null,
 *   roleType?: null|RoleType|value-of<RoleType>,
 * }
 */
final class EnterpriseCreateParams implements BaseModel
{
    /** @use SdkModel<EnterpriseCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('billing_address')]
    public BillingAddress $billingAddress;

    #[Required('billing_contact')]
    public BillingContact $billingContact;

    /**
     * ISO 3166-1 alpha-2 country code. Currently `US` and `CA` are supported.
     */
    #[Required('country_code')]
    public string $countryCode;

    #[Required('doing_business_as')]
    public string $doingBusinessAs;

    /**
     * US Federal Employer Identification Number (`NN-NNNNNNN`) or Canadian equivalent.
     */
    #[Required]
    public string $fein;

    /**
     * Industry classification.
     *
     * @var value-of<Industry> $industry
     */
    #[Required(enum: Industry::class)]
    public string $industry;

    #[Required('jurisdiction_of_incorporation')]
    public string $jurisdictionOfIncorporation;

    /**
     * Legal name of the enterprise.
     */
    #[Required('legal_name')]
    public string $legalName;

    /**
     * Approximate headcount range. Used for vetting heuristics; pick the bucket that contains your current employee count.
     *
     * @var value-of<NumberOfEmployees> $numberOfEmployees
     */
    #[Required('number_of_employees', enum: NumberOfEmployees::class)]
    public string $numberOfEmployees;

    #[Required('organization_contact')]
    public OrganizationContact $organizationContact;

    /**
     * Legal-entity form. Pick the form that matches your incorporation documents:
     * - `corporation` — C-corp or S-corp.
     * - `llc` — limited liability company.
     * - `partnership` — general/limited partnership.
     * - `nonprofit` — non-profit corporation, charitable trust, or 501(c)(3)/equivalent.
     * - `other` — anything else (sole proprietorships, government bodies, DBAs, etc.). You may be asked for additional documents during vetting.
     *
     * @var value-of<OrganizationLegalType> $organizationLegalType
     */
    #[Required('organization_legal_type', enum: OrganizationLegalType::class)]
    public string $organizationLegalType;

    #[Required('organization_physical_address')]
    public PhysicalAddress $organizationPhysicalAddress;

    /**
     * Organization category for vetting purposes:
     * - `commercial` — for-profit business entities (LLC, corp, partnership, sole proprietorship). Most callers fall here.
     * - `government` — federal/state/local government bodies.
     * - `non_profit` — registered 501(c)(3)/equivalent (incl. educational institutions, charities, religious organisations).
     *
     * @var value-of<OrganizationType> $organizationType
     */
    #[Required('organization_type', enum: OrganizationType::class)]
    public string $organizationType;

    #[Required]
    public string $website;

    /**
     * Optional corporate-registration / company-number identifier.
     */
    #[Optional('corporate_registration_number', nullable: true)]
    public ?string $corporateRegistrationNumber;

    /**
     * Optional free-form string the caller can attach for their own bookkeeping. Telnyx does not interpret it.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Optional D-U-N-S Number.
     */
    #[Optional('dun_bradstreet_number', nullable: true)]
    public ?string $dunBradstreetNumber;

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

    /**
     * `enterprise` for an organization registering its own DIRs; `bpo` for a Business Process Outsourcer placing calls on behalf of one or more enterprises.
     *
     * @var value-of<RoleType>|null $roleType
     */
    #[Optional('role_type', enum: RoleType::class)]
    public ?string $roleType;

    /**
     * `new EnterpriseCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EnterpriseCreateParams::with(
     *   billingAddress: ...,
     *   billingContact: ...,
     *   countryCode: ...,
     *   doingBusinessAs: ...,
     *   fein: ...,
     *   industry: ...,
     *   jurisdictionOfIncorporation: ...,
     *   legalName: ...,
     *   numberOfEmployees: ...,
     *   organizationContact: ...,
     *   organizationLegalType: ...,
     *   organizationPhysicalAddress: ...,
     *   organizationType: ...,
     *   website: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EnterpriseCreateParams)
     *   ->withBillingAddress(...)
     *   ->withBillingContact(...)
     *   ->withCountryCode(...)
     *   ->withDoingBusinessAs(...)
     *   ->withFein(...)
     *   ->withIndustry(...)
     *   ->withJurisdictionOfIncorporation(...)
     *   ->withLegalName(...)
     *   ->withNumberOfEmployees(...)
     *   ->withOrganizationContact(...)
     *   ->withOrganizationLegalType(...)
     *   ->withOrganizationPhysicalAddress(...)
     *   ->withOrganizationType(...)
     *   ->withWebsite(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BillingAddress|BillingAddressShape $billingAddress
     * @param BillingContact|BillingContactShape $billingContact
     * @param Industry|value-of<Industry> $industry
     * @param NumberOfEmployees|value-of<NumberOfEmployees> $numberOfEmployees
     * @param OrganizationContact|OrganizationContactShape $organizationContact
     * @param OrganizationLegalType|value-of<OrganizationLegalType> $organizationLegalType
     * @param PhysicalAddress|PhysicalAddressShape $organizationPhysicalAddress
     * @param OrganizationType|value-of<OrganizationType> $organizationType
     * @param RoleType|value-of<RoleType>|null $roleType
     */
    public static function with(
        BillingAddress|array $billingAddress,
        BillingContact|array $billingContact,
        string $countryCode,
        string $doingBusinessAs,
        string $fein,
        Industry|string $industry,
        string $jurisdictionOfIncorporation,
        string $legalName,
        NumberOfEmployees|string $numberOfEmployees,
        OrganizationContact|array $organizationContact,
        OrganizationLegalType|string $organizationLegalType,
        PhysicalAddress|array $organizationPhysicalAddress,
        OrganizationType|string $organizationType,
        string $website,
        ?string $corporateRegistrationNumber = null,
        ?string $customerReference = null,
        ?string $dunBradstreetNumber = null,
        ?string $primaryBusinessDomainSicCode = null,
        ?string $professionalLicenseNumber = null,
        RoleType|string|null $roleType = null,
    ): self {
        $self = new self;

        $self['billingAddress'] = $billingAddress;
        $self['billingContact'] = $billingContact;
        $self['countryCode'] = $countryCode;
        $self['doingBusinessAs'] = $doingBusinessAs;
        $self['fein'] = $fein;
        $self['industry'] = $industry;
        $self['jurisdictionOfIncorporation'] = $jurisdictionOfIncorporation;
        $self['legalName'] = $legalName;
        $self['numberOfEmployees'] = $numberOfEmployees;
        $self['organizationContact'] = $organizationContact;
        $self['organizationLegalType'] = $organizationLegalType;
        $self['organizationPhysicalAddress'] = $organizationPhysicalAddress;
        $self['organizationType'] = $organizationType;
        $self['website'] = $website;

        null !== $corporateRegistrationNumber && $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $dunBradstreetNumber && $self['dunBradstreetNumber'] = $dunBradstreetNumber;
        null !== $primaryBusinessDomainSicCode && $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;
        null !== $professionalLicenseNumber && $self['professionalLicenseNumber'] = $professionalLicenseNumber;
        null !== $roleType && $self['roleType'] = $roleType;

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
     * ISO 3166-1 alpha-2 country code. Currently `US` and `CA` are supported.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withDoingBusinessAs(string $doingBusinessAs): self
    {
        $self = clone $this;
        $self['doingBusinessAs'] = $doingBusinessAs;

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
     * Industry classification.
     *
     * @param Industry|value-of<Industry> $industry
     */
    public function withIndustry(Industry|string $industry): self
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

    /**
     * Legal name of the enterprise.
     */
    public function withLegalName(string $legalName): self
    {
        $self = clone $this;
        $self['legalName'] = $legalName;

        return $self;
    }

    /**
     * Approximate headcount range. Used for vetting heuristics; pick the bucket that contains your current employee count.
     *
     * @param NumberOfEmployees|value-of<NumberOfEmployees> $numberOfEmployees
     */
    public function withNumberOfEmployees(
        NumberOfEmployees|string $numberOfEmployees
    ): self {
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
     * - `corporation` — C-corp or S-corp.
     * - `llc` — limited liability company.
     * - `partnership` — general/limited partnership.
     * - `nonprofit` — non-profit corporation, charitable trust, or 501(c)(3)/equivalent.
     * - `other` — anything else (sole proprietorships, government bodies, DBAs, etc.). You may be asked for additional documents during vetting.
     *
     * @param OrganizationLegalType|value-of<OrganizationLegalType> $organizationLegalType
     */
    public function withOrganizationLegalType(
        OrganizationLegalType|string $organizationLegalType
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
     * Organization category for vetting purposes:
     * - `commercial` — for-profit business entities (LLC, corp, partnership, sole proprietorship). Most callers fall here.
     * - `government` — federal/state/local government bodies.
     * - `non_profit` — registered 501(c)(3)/equivalent (incl. educational institutions, charities, religious organisations).
     *
     * @param OrganizationType|value-of<OrganizationType> $organizationType
     */
    public function withOrganizationType(
        OrganizationType|string $organizationType
    ): self {
        $self = clone $this;
        $self['organizationType'] = $organizationType;

        return $self;
    }

    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

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

    /**
     * Optional free-form string the caller can attach for their own bookkeeping. Telnyx does not interpret it.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Optional D-U-N-S Number.
     */
    public function withDunBradstreetNumber(?string $dunBradstreetNumber): self
    {
        $self = clone $this;
        $self['dunBradstreetNumber'] = $dunBradstreetNumber;

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

    /**
     * `enterprise` for an organization registering its own DIRs; `bpo` for a Business Process Outsourcer placing calls on behalf of one or more enterprises.
     *
     * @param RoleType|value-of<RoleType> $roleType
     */
    public function withRoleType(RoleType|string $roleType): self
    {
        $self = clone $this;
        $self['roleType'] = $roleType;

        return $self;
    }
}
