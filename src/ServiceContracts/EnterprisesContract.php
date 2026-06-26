<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\BillingAddress;
use Telnyx\Enterprises\BillingContact;
use Telnyx\Enterprises\EnterpriseCreateParams\Industry;
use Telnyx\Enterprises\EnterpriseCreateParams\NumberOfEmployees;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationLegalType;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationType;
use Telnyx\Enterprises\EnterpriseCreateParams\RoleType;
use Telnyx\Enterprises\EnterprisePublic;
use Telnyx\Enterprises\EnterprisePublicWrapped;
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
     * @param string $countryCode ISO 3166-1 alpha-2 country code. Currently `US` and `CA` are supported.
     * @param string $fein US Federal Employer Identification Number (`NN-NNNNNNN`) or Canadian equivalent
     * @param Industry|value-of<Industry> $industry industry classification
     * @param string $legalName legal name of the enterprise
     * @param NumberOfEmployees|value-of<NumberOfEmployees> $numberOfEmployees Approximate headcount range. Used for vetting heuristics; pick the bucket that contains your current employee count.
     * @param OrganizationContact|OrganizationContactShape $organizationContact
     * @param OrganizationLegalType|value-of<OrganizationLegalType> $organizationLegalType Legal-entity form. Pick the form that matches your incorporation documents:
     * - `corporation` - C-corp or S-corp.
     * - `llc` - limited liability company.
     * - `partnership` - general/limited partnership.
     * - `nonprofit` - non-profit corporation, charitable trust, or 501(c)(3)/equivalent.
     * - `other` - anything else (sole proprietorships, government bodies, DBAs, etc.). You may be asked for additional documents during vetting.
     * @param PhysicalAddress|PhysicalAddressShape $organizationPhysicalAddress
     * @param OrganizationType|value-of<OrganizationType> $organizationType Organization category for vetting purposes:
     * - `commercial` - for-profit business entities (LLC, corp, partnership, sole proprietorship). Most callers fall here.
     * - `government` - federal/state/local government bodies.
     * - `non_profit` - registered 501(c)(3)/equivalent (incl. educational institutions, charities, religious organisations).
     * @param string|null $corporateRegistrationNumber optional corporate-registration / company-number identifier
     * @param string $customerReference Optional free-form string the caller can attach for their own bookkeeping. Telnyx does not interpret it.
     * @param string|null $dunBradstreetNumber optional D-U-N-S Number
     * @param string|null $primaryBusinessDomainSicCode optional SIC code for the primary line of business
     * @param string|null $professionalLicenseNumber optional professional-license number for regulated industries
     * @param RoleType|value-of<RoleType> $roleType `enterprise` for an organization registering its own DIRs; `bpo` for a Business Process Outsourcer placing calls on behalf of one or more enterprises
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
        RoleType|string $roleType = 'enterprise',
        RequestOptions|array|null $requestOptions = null,
    ): EnterprisePublicWrapped;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): EnterprisePublicWrapped;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param BillingAddress|BillingAddressShape $billingAddress
     * @param BillingContact|BillingContactShape $billingContact
     * @param \Telnyx\Enterprises\EnterpriseUpdateParams\Industry|value-of<\Telnyx\Enterprises\EnterpriseUpdateParams\Industry> $industry
     * @param string $jurisdictionOfIncorporation Updated state/province/country of incorporation. Optional on update.
     * @param string $legalName legal name of the enterprise
     * @param OrganizationContact|OrganizationContactShape $organizationContact
     * @param PhysicalAddress|PhysicalAddressShape $organizationPhysicalAddress
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
        \Telnyx\Enterprises\EnterpriseUpdateParams\Industry|string|null $industry = null,
        ?string $jurisdictionOfIncorporation = null,
        ?string $legalName = null,
        ?string $numberOfEmployees = null,
        OrganizationContact|array|null $organizationContact = null,
        ?string $organizationLegalType = null,
        PhysicalAddress|array|null $organizationPhysicalAddress = null,
        ?string $primaryBusinessDomainSicCode = null,
        ?string $professionalLicenseNumber = null,
        ?string $website = null,
        RequestOptions|array|null $requestOptions = null,
    ): EnterprisePublicWrapped;

    /**
     * @api
     *
     * @param string $filterLegalNameContains case-insensitive partial match on legal name
     * @param string $legalName filter by legal name (partial match)
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Default 10. Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EnterprisePublic>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterLegalNameContains = null,
        ?string $legalName = null,
        int $pageNumber = 1,
        int $pageSize = 10,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function brandedCalling(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): EnterprisePublicWrapped;
}
