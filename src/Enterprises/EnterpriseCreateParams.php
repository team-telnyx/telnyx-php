<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\EnterpriseCreateParams\NumberOfEmployees;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationLegalType;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationType;
use Telnyx\Enterprises\EnterpriseCreateParams\RoleType;

/**
 * Create a new enterprise for Branded Calling / Number Reputation services.
 *
 * Registers the enterprise in the Branded Calling / Number Reputation services, enabling it to create Display Identity Records (DIRs) or enroll in Number Reputation monitoring.
 *
 * **Required Fields:** `legal_name`, `doing_business_as`, `organization_type`, `country_code`, `website`, `fein`, `industry`, `number_of_employees`, `organization_legal_type`, `organization_contact`, `billing_contact`, `organization_physical_address`, `billing_address`
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
 *   industry: string,
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
     * Country code. Currently only 'US' is accepted.
     */
    #[Required('country_code')]
    public string $countryCode;

    /**
     * Primary business name / DBA name.
     */
    #[Required('doing_business_as')]
    public string $doingBusinessAs;

    /**
     * Federal Employer Identification Number. Format: XX-XXXXXXX or 9-digit number (minimum 9 digits).
     */
    #[Required]
    public string $fein;

    /**
     * Industry classification. Case-insensitive. Accepted values: accounting, finance, billing, collections, business, charity, nonprofit, communications, telecom, customer service, support, delivery, shipping, logistics, education, financial, banking, government, public, healthcare, health, pharmacy, medical, insurance, legal, law, notifications, scheduling, real estate, property, retail, ecommerce, sales, marketing, software, technology, tech, media, surveys, market research, travel, hospitality, hotel.
     */
    #[Required]
    public string $industry;

    /**
     * Legal name of the enterprise.
     */
    #[Required('legal_name')]
    public string $legalName;

    /**
     * Employee count range.
     *
     * @var value-of<NumberOfEmployees> $numberOfEmployees
     */
    #[Required('number_of_employees', enum: NumberOfEmployees::class)]
    public string $numberOfEmployees;

    /**
     * Organization contact information. Note: the response returns this object with the phone field as 'phone' (not 'phone_number').
     */
    #[Required('organization_contact')]
    public OrganizationContact $organizationContact;

    /**
     * Legal structure type.
     *
     * @var value-of<OrganizationLegalType> $organizationLegalType
     */
    #[Required('organization_legal_type', enum: OrganizationLegalType::class)]
    public string $organizationLegalType;

    #[Required('organization_physical_address')]
    public PhysicalAddress $organizationPhysicalAddress;

    /**
     * Type of organization.
     *
     * @var value-of<OrganizationType> $organizationType
     */
    #[Required('organization_type', enum: OrganizationType::class)]
    public string $organizationType;

    /**
     * Enterprise website URL. Accepts any string — no URL format validation enforced.
     */
    #[Required]
    public string $website;

    /**
     * Corporate registration number (optional).
     */
    #[Optional('corporate_registration_number')]
    public ?string $corporateRegistrationNumber;

    /**
     * Optional customer reference identifier for your own tracking.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * D-U-N-S Number (optional).
     */
    #[Optional('dun_bradstreet_number')]
    public ?string $dunBradstreetNumber;

    /**
     * SIC Code (optional).
     */
    #[Optional('primary_business_domain_sic_code')]
    public ?string $primaryBusinessDomainSicCode;

    /**
     * Professional license number (optional).
     */
    #[Optional('professional_license_number')]
    public ?string $professionalLicenseNumber;

    /**
     * Role type in Branded Calling / Number Reputation services.
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
        string $industry,
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
     * Country code. Currently only 'US' is accepted.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Primary business name / DBA name.
     */
    public function withDoingBusinessAs(string $doingBusinessAs): self
    {
        $self = clone $this;
        $self['doingBusinessAs'] = $doingBusinessAs;

        return $self;
    }

    /**
     * Federal Employer Identification Number. Format: XX-XXXXXXX or 9-digit number (minimum 9 digits).
     */
    public function withFein(string $fein): self
    {
        $self = clone $this;
        $self['fein'] = $fein;

        return $self;
    }

    /**
     * Industry classification. Case-insensitive. Accepted values: accounting, finance, billing, collections, business, charity, nonprofit, communications, telecom, customer service, support, delivery, shipping, logistics, education, financial, banking, government, public, healthcare, health, pharmacy, medical, insurance, legal, law, notifications, scheduling, real estate, property, retail, ecommerce, sales, marketing, software, technology, tech, media, surveys, market research, travel, hospitality, hotel.
     */
    public function withIndustry(string $industry): self
    {
        $self = clone $this;
        $self['industry'] = $industry;

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
     * Employee count range.
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
     * Organization contact information. Note: the response returns this object with the phone field as 'phone' (not 'phone_number').
     *
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
     * Legal structure type.
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
     * Type of organization.
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

    /**
     * Enterprise website URL. Accepts any string — no URL format validation enforced.
     */
    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }

    /**
     * Corporate registration number (optional).
     */
    public function withCorporateRegistrationNumber(
        string $corporateRegistrationNumber
    ): self {
        $self = clone $this;
        $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;

        return $self;
    }

    /**
     * Optional customer reference identifier for your own tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * D-U-N-S Number (optional).
     */
    public function withDunBradstreetNumber(string $dunBradstreetNumber): self
    {
        $self = clone $this;
        $self['dunBradstreetNumber'] = $dunBradstreetNumber;

        return $self;
    }

    /**
     * SIC Code (optional).
     */
    public function withPrimaryBusinessDomainSicCode(
        string $primaryBusinessDomainSicCode
    ): self {
        $self = clone $this;
        $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;

        return $self;
    }

    /**
     * Professional license number (optional).
     */
    public function withProfessionalLicenseNumber(
        string $professionalLicenseNumber
    ): self {
        $self = clone $this;
        $self['professionalLicenseNumber'] = $professionalLicenseNumber;

        return $self;
    }

    /**
     * Role type in Branded Calling / Number Reputation services.
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
