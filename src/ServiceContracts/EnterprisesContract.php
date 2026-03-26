<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\BillingAddress;
use Telnyx\Enterprises\BillingContact;
use Telnyx\Enterprises\EnterpriseCreateParams\NumberOfEmployees;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationLegalType;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationType;
use Telnyx\Enterprises\EnterpriseCreateParams\RoleType;
use Telnyx\Enterprises\EnterpriseGetResponse;
use Telnyx\Enterprises\EnterpriseNewResponse;
use Telnyx\Enterprises\EnterprisePublic;
use Telnyx\Enterprises\EnterpriseUpdateResponse;
use Telnyx\Enterprises\OrganizationContact;
use Telnyx\Enterprises\PhysicalAddress;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type BillingAddressShape from \Telnyx\Enterprises\BillingAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EnterprisesContract
{
    /**
     * @api
     *
     * @param BillingAddress|BillingAddressShape $billingAddress
     * @param BillingContact|BillingContactShape $billingContact
     * @param string $countryCode Country code. Currently only 'US' is accepted.
     * @param string $doingBusinessAs Primary business name / DBA name
     * @param string $fein Federal Employer Identification Number. Format: XX-XXXXXXX or 9-digit number (minimum 9 digits).
     * @param string $industry Industry classification. Case-insensitive. Accepted values: accounting, finance, billing, collections, business, charity, nonprofit, communications, telecom, customer service, support, delivery, shipping, logistics, education, financial, banking, government, public, healthcare, health, pharmacy, medical, insurance, legal, law, notifications, scheduling, real estate, property, retail, ecommerce, sales, marketing, software, technology, tech, media, surveys, market research, travel, hospitality, hotel
     * @param string $legalName Legal name of the enterprise
     * @param NumberOfEmployees|value-of<NumberOfEmployees> $numberOfEmployees Employee count range
     * @param OrganizationContact|OrganizationContactShape $organizationContact Organization contact information. Note: the response returns this object with the phone field as 'phone' (not 'phone_number').
     * @param OrganizationLegalType|value-of<OrganizationLegalType> $organizationLegalType Legal structure type
     * @param PhysicalAddress|PhysicalAddressShape $organizationPhysicalAddress
     * @param OrganizationType|value-of<OrganizationType> $organizationType Type of organization
     * @param string $website Enterprise website URL. Accepts any string — no URL format validation enforced.
     * @param string $corporateRegistrationNumber Corporate registration number (optional)
     * @param string $customerReference Optional customer reference identifier for your own tracking
     * @param string $dunBradstreetNumber D-U-N-S Number (optional)
     * @param string $primaryBusinessDomainSicCode SIC Code (optional)
     * @param string $professionalLicenseNumber Professional license number (optional)
     * @param RoleType|value-of<RoleType> $roleType Role type in Branded Calling / Number Reputation services
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
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
        RoleType|string $roleType = 'enterprise',
        RequestOptions|array|null $requestOptions = null,
    ): EnterpriseNewResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): EnterpriseGetResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param BillingAddress|BillingAddressShape $billingAddress
     * @param BillingContact|BillingContactShape $billingContact
     * @param string $corporateRegistrationNumber Corporate registration number
     * @param string $customerReference Customer reference identifier
     * @param string $doingBusinessAs DBA name
     * @param string $dunBradstreetNumber D-U-N-S Number
     * @param string $fein Federal Employer Identification Number. Format: XX-XXXXXXX or XXXXXXXXX
     * @param string $industry Industry classification
     * @param string $legalName Legal name of the enterprise
     * @param \Telnyx\Enterprises\EnterpriseUpdateParams\NumberOfEmployees|value-of<\Telnyx\Enterprises\EnterpriseUpdateParams\NumberOfEmployees> $numberOfEmployees Employee count range
     * @param OrganizationContact|OrganizationContactShape $organizationContact Organization contact information. Note: the response returns this object with the phone field as 'phone' (not 'phone_number').
     * @param \Telnyx\Enterprises\EnterpriseUpdateParams\OrganizationLegalType|value-of<\Telnyx\Enterprises\EnterpriseUpdateParams\OrganizationLegalType> $organizationLegalType Legal structure type
     * @param PhysicalAddress|PhysicalAddressShape $organizationPhysicalAddress
     * @param string $primaryBusinessDomainSicCode SIC Code
     * @param string $professionalLicenseNumber Professional license number
     * @param string $website Company website URL
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $enterpriseID,
        BillingAddress|array|null $billingAddress = null,
        BillingContact|array|null $billingContact = null,
        ?string $corporateRegistrationNumber = null,
        ?string $customerReference = null,
        ?string $doingBusinessAs = null,
        ?string $dunBradstreetNumber = null,
        ?string $fein = null,
        ?string $industry = null,
        ?string $legalName = null,
        \Telnyx\Enterprises\EnterpriseUpdateParams\NumberOfEmployees|string|null $numberOfEmployees = null,
        OrganizationContact|array|null $organizationContact = null,
        \Telnyx\Enterprises\EnterpriseUpdateParams\OrganizationLegalType|string|null $organizationLegalType = null,
        PhysicalAddress|array|null $organizationPhysicalAddress = null,
        ?string $primaryBusinessDomainSicCode = null,
        ?string $professionalLicenseNumber = null,
        ?string $website = null,
        RequestOptions|array|null $requestOptions = null,
    ): EnterpriseUpdateResponse;

    /**
     * @api
     *
     * @param string $legalName Filter by legal name (partial match)
     * @param int $pageNumber Page number (1-indexed)
     * @param int $pageSize Number of items per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EnterprisePublic>
     *
     * @throws APIException
     */
    public function list(
        ?string $legalName = null,
        int $pageNumber = 1,
        int $pageSize = 10,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
