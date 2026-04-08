<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\EnterpriseUpdateParams\NumberOfEmployees;
use Telnyx\Enterprises\EnterpriseUpdateParams\OrganizationLegalType;

/**
 * Update enterprise information. All fields are optional — only the provided fields will be updated.
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
 *   industry?: string|null,
 *   legalName?: string|null,
 *   numberOfEmployees?: null|NumberOfEmployees|value-of<NumberOfEmployees>,
 *   organizationContact?: null|OrganizationContact|OrganizationContactShape,
 *   organizationLegalType?: null|OrganizationLegalType|value-of<OrganizationLegalType>,
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

    /**
     * Corporate registration number.
     */
    #[Optional('corporate_registration_number')]
    public ?string $corporateRegistrationNumber;

    /**
     * Customer reference identifier.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * DBA name.
     */
    #[Optional('doing_business_as')]
    public ?string $doingBusinessAs;

    /**
     * D-U-N-S Number.
     */
    #[Optional('dun_bradstreet_number')]
    public ?string $dunBradstreetNumber;

    /**
     * Federal Employer Identification Number. Format: XX-XXXXXXX or XXXXXXXXX.
     */
    #[Optional]
    public ?string $fein;

    /**
     * Industry classification.
     */
    #[Optional]
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
    #[Optional('number_of_employees', enum: NumberOfEmployees::class)]
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
    #[Optional('organization_legal_type', enum: OrganizationLegalType::class)]
    public ?string $organizationLegalType;

    #[Optional('organization_physical_address')]
    public ?PhysicalAddress $organizationPhysicalAddress;

    /**
     * SIC Code.
     */
    #[Optional('primary_business_domain_sic_code')]
    public ?string $primaryBusinessDomainSicCode;

    /**
     * Professional license number.
     */
    #[Optional('professional_license_number')]
    public ?string $professionalLicenseNumber;

    /**
     * Company website URL.
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
     * @param BillingAddress|BillingAddressShape|null $billingAddress
     * @param BillingContact|BillingContactShape|null $billingContact
     * @param NumberOfEmployees|value-of<NumberOfEmployees>|null $numberOfEmployees
     * @param OrganizationContact|OrganizationContactShape|null $organizationContact
     * @param OrganizationLegalType|value-of<OrganizationLegalType>|null $organizationLegalType
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
        ?string $industry = null,
        ?string $legalName = null,
        NumberOfEmployees|string|null $numberOfEmployees = null,
        OrganizationContact|array|null $organizationContact = null,
        OrganizationLegalType|string|null $organizationLegalType = null,
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

    /**
     * Corporate registration number.
     */
    public function withCorporateRegistrationNumber(
        string $corporateRegistrationNumber
    ): self {
        $self = clone $this;
        $self['corporateRegistrationNumber'] = $corporateRegistrationNumber;

        return $self;
    }

    /**
     * Customer reference identifier.
     */
    public function withCustomerReference(string $customerReference): self
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
    public function withDunBradstreetNumber(string $dunBradstreetNumber): self
    {
        $self = clone $this;
        $self['dunBradstreetNumber'] = $dunBradstreetNumber;

        return $self;
    }

    /**
     * Federal Employer Identification Number. Format: XX-XXXXXXX or XXXXXXXXX.
     */
    public function withFein(string $fein): self
    {
        $self = clone $this;
        $self['fein'] = $fein;

        return $self;
    }

    /**
     * Industry classification.
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
     * SIC Code.
     */
    public function withPrimaryBusinessDomainSicCode(
        string $primaryBusinessDomainSicCode
    ): self {
        $self = clone $this;
        $self['primaryBusinessDomainSicCode'] = $primaryBusinessDomainSicCode;

        return $self;
    }

    /**
     * Professional license number.
     */
    public function withProfessionalLicenseNumber(
        string $professionalLicenseNumber
    ): self {
        $self = clone $this;
        $self['professionalLicenseNumber'] = $professionalLicenseNumber;

        return $self;
    }

    /**
     * Company website URL.
     */
    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
