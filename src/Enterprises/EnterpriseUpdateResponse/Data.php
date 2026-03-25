<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseUpdateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\EnterpriseUpdateResponse\Data\BillingAddress;
use Telnyx\Enterprises\EnterpriseUpdateResponse\Data\BillingContact;
use Telnyx\Enterprises\EnterpriseUpdateResponse\Data\NumberOfEmployees;
use Telnyx\Enterprises\EnterpriseUpdateResponse\Data\OrganizationContact;
use Telnyx\Enterprises\EnterpriseUpdateResponse\Data\OrganizationLegalType;
use Telnyx\Enterprises\EnterpriseUpdateResponse\Data\OrganizationPhysicalAddress;
use Telnyx\Enterprises\EnterpriseUpdateResponse\Data\OrganizationType;
use Telnyx\Enterprises\EnterpriseUpdateResponse\Data\RoleType;

/**
 * @phpstan-import-type BillingAddressShape from \Telnyx\Enterprises\EnterpriseUpdateResponse\Data\BillingAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\EnterpriseUpdateResponse\Data\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\EnterpriseUpdateResponse\Data\OrganizationContact
 * @phpstan-import-type OrganizationPhysicalAddressShape from \Telnyx\Enterprises\EnterpriseUpdateResponse\Data\OrganizationPhysicalAddress
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   billingAddress?: null|BillingAddress|BillingAddressShape,
 *   billingContact?: null|BillingContact|BillingContactShape,
 *   corporateRegistrationNumber?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   doingBusinessAs?: string|null,
 *   dunBradstreetNumber?: string|null,
 *   fein?: string|null,
 *   industry?: string|null,
 *   legalName?: string|null,
 *   numberOfEmployees?: null|NumberOfEmployees|value-of<NumberOfEmployees>,
 *   organizationContact?: null|OrganizationContact|OrganizationContactShape,
 *   organizationLegalType?: null|OrganizationLegalType|value-of<OrganizationLegalType>,
 *   organizationPhysicalAddress?: null|OrganizationPhysicalAddress|OrganizationPhysicalAddressShape,
 *   organizationType?: null|OrganizationType|value-of<OrganizationType>,
 *   primaryBusinessDomainSicCode?: string|null,
 *   professionalLicenseNumber?: string|null,
 *   roleType?: null|RoleType|value-of<RoleType>,
 *   updatedAt?: \DateTimeInterface|null,
 *   website?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier of the enterprise.
     */
    #[Optional]
    public ?string $id;

    #[Optional('billing_address')]
    public ?BillingAddress $billingAddress;

    #[Optional('billing_contact')]
    public ?BillingContact $billingContact;

    /**
     * Corporate registration number.
     */
    #[Optional('corporate_registration_number', nullable: true)]
    public ?string $corporateRegistrationNumber;

    /**
     * ISO 3166-1 alpha-2 country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * When the enterprise was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Customer reference identifier.
     */
    #[Optional('customer_reference', nullable: true)]
    public ?string $customerReference;

    /**
     * DBA name.
     */
    #[Optional('doing_business_as')]
    public ?string $doingBusinessAs;

    /**
     * D-U-N-S Number.
     */
    #[Optional('dun_bradstreet_number', nullable: true)]
    public ?string $dunBradstreetNumber;

    /**
     * Federal Employer Identification Number.
     */
    #[Optional(nullable: true)]
    public ?string $fein;

    /**
     * Industry classification.
     */
    #[Optional(nullable: true)]
    public ?string $industry;

    /**
     * Legal name of the enterprise.
     */
    #[Optional('legal_name')]
    public ?string $legalName;

    /**
     * Employee count range.
     *
     * @var value-of<NumberOfEmployees>|null $numberOfEmployees
     */
    #[Optional(
        'number_of_employees',
        enum: NumberOfEmployees::class,
        nullable: true
    )]
    public ?string $numberOfEmployees;

    /**
     * Organization contact information. Note: the response returns this object with the phone field as 'phone' (not 'phone_number').
     */
    #[Optional('organization_contact')]
    public ?OrganizationContact $organizationContact;

    /**
     * Legal structure type.
     *
     * @var value-of<OrganizationLegalType>|null $organizationLegalType
     */
    #[Optional(
        'organization_legal_type',
        enum: OrganizationLegalType::class,
        nullable: true,
    )]
    public ?string $organizationLegalType;

    #[Optional('organization_physical_address')]
    public ?OrganizationPhysicalAddress $organizationPhysicalAddress;

    /**
     * Type of organization.
     *
     * @var value-of<OrganizationType>|null $organizationType
     */
    #[Optional('organization_type', enum: OrganizationType::class)]
    public ?string $organizationType;

    /**
     * SIC Code.
     */
    #[Optional('primary_business_domain_sic_code', nullable: true)]
    public ?string $primaryBusinessDomainSicCode;

    /**
     * Professional license number.
     */
    #[Optional('professional_license_number', nullable: true)]
    public ?string $professionalLicenseNumber;

    /**
     * Role type in Branded Calling / Number Reputation services.
     *
     * @var value-of<RoleType>|null $roleType
     */
    #[Optional('role_type', enum: RoleType::class)]
    public ?string $roleType;

    /**
     * When the enterprise was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Company website URL.
     */
    #[Optional(nullable: true)]
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
     * @param NumberOfEmployees|value-of<NumberOfEmployees>|null $numberOfEmployees
     * @param OrganizationContact|OrganizationContactShape|null $organizationContact
     * @param OrganizationLegalType|value-of<OrganizationLegalType>|null $organizationLegalType
     * @param OrganizationPhysicalAddress|OrganizationPhysicalAddressShape|null $organizationPhysicalAddress
     * @param OrganizationType|value-of<OrganizationType>|null $organizationType
     * @param RoleType|value-of<RoleType>|null $roleType
     */
    public static function with(
        ?string $id = null,
        BillingAddress|array|null $billingAddress = null,
        BillingContact|array|null $billingContact = null,
        ?string $corporateRegistrationNumber = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?string $doingBusinessAs = null,
        ?string $dunBradstreetNumber = null,
        ?string $fein = null,
        ?string $industry = null,
        ?string $legalName = null,
        NumberOfEmployees|string|null $numberOfEmployees = null,
        OrganizationContact|array|null $organizationContact = null,
        OrganizationLegalType|string|null $organizationLegalType = null,
        OrganizationPhysicalAddress|array|null $organizationPhysicalAddress = null,
        OrganizationType|string|null $organizationType = null,
        ?string $primaryBusinessDomainSicCode = null,
        ?string $professionalLicenseNumber = null,
        RoleType|string|null $roleType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $website = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $billingAddress && $self['billingAddress'] = $billingAddress;
        null !== $billingContact && $self['billingContact'] = $billingContact;
        null !== $corporateRegistrationNumber && $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $doingBusinessAs && $self['doingBusinessAs'] = $doingBusinessAs;
        null !== $dunBradstreetNumber && $self['dunBradstreetNumber'] = $dunBradstreetNumber;
        null !== $fein && $self['fein'] = $fein;
        null !== $industry && $self['industry'] = $industry;
        null !== $legalName && $self['legalName'] = $legalName;
        null !== $numberOfEmployees && $self['numberOfEmployees'] = $numberOfEmployees;
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

    /**
     * Unique identifier of the enterprise.
     */
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
     * Corporate registration number.
     */
    public function withCorporateRegistrationNumber(
        ?string $corporateRegistrationNumber
    ): self {
        $self = clone $this;
        $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;

        return $self;
    }

    /**
     * ISO 3166-1 alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * When the enterprise was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Customer reference identifier.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * DBA name.
     */
    public function withDoingBusinessAs(string $doingBusinessAs): self
    {
        $self = clone $this;
        $self['doingBusinessAs'] = $doingBusinessAs;

        return $self;
    }

    /**
     * D-U-N-S Number.
     */
    public function withDunBradstreetNumber(?string $dunBradstreetNumber): self
    {
        $self = clone $this;
        $self['dunBradstreetNumber'] = $dunBradstreetNumber;

        return $self;
    }

    /**
     * Federal Employer Identification Number.
     */
    public function withFein(?string $fein): self
    {
        $self = clone $this;
        $self['fein'] = $fein;

        return $self;
    }

    /**
     * Industry classification.
     */
    public function withIndustry(?string $industry): self
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
     * @param NumberOfEmployees|value-of<NumberOfEmployees>|null $numberOfEmployees
     */
    public function withNumberOfEmployees(
        NumberOfEmployees|string|null $numberOfEmployees
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
     * @param OrganizationLegalType|value-of<OrganizationLegalType>|null $organizationLegalType
     */
    public function withOrganizationLegalType(
        OrganizationLegalType|string|null $organizationLegalType
    ): self {
        $self = clone $this;
        $self['organizationLegalType'] = $organizationLegalType;

        return $self;
    }

    /**
     * @param OrganizationPhysicalAddress|OrganizationPhysicalAddressShape $organizationPhysicalAddress
     */
    public function withOrganizationPhysicalAddress(
        OrganizationPhysicalAddress|array $organizationPhysicalAddress
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
     * SIC Code.
     */
    public function withPrimaryBusinessDomainSicCode(
        ?string $primaryBusinessDomainSicCode
    ): self {
        $self = clone $this;
        $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;

        return $self;
    }

    /**
     * Professional license number.
     */
    public function withProfessionalLicenseNumber(
        ?string $professionalLicenseNumber
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

    /**
     * When the enterprise was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Company website URL.
     */
    public function withWebsite(?string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
