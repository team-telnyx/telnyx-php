<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\BillingContact;
use Telnyx\Enterprises\EnterpriseCreateParams\Industry;
use Telnyx\Enterprises\EnterpriseCreateParams\NumberOfEmployees;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationLegalType;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationType;
use Telnyx\Enterprises\EnterpriseCreateParams\RoleType;
use Telnyx\Enterprises\EnterpriseListParams\FilterRoleType;
use Telnyx\Enterprises\EnterprisePublic;
use Telnyx\Enterprises\EnterprisePublicWrapped;
use Telnyx\Enterprises\OrganizationContact;
use Telnyx\Enterprises\PhysicalAddress;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EnterprisesContract
{
    /**
     * @api
     *
     * @param PhysicalAddress|PhysicalAddressShape $billingAddress
     * @param BillingContact|BillingContactShape $billingContact
     * @param string $countryCode ISO 3166-1 alpha-2 country code. Currently `US` and `CA` are supported.
     * @param string $doingBusinessAs The trade name your business operates under if it is different from your legal name, also called a Doing Business As (DBA) name. Leave blank if you only use your legal name.
     * @param string $fein US Federal Employer Identification Number (`NN-NNNNNNN`) or Canadian equivalent
     * @param Industry|value-of<Industry> $industry The industry your business operates in. Choose the closest match from the list; if your value is not accepted, pick the nearest category.
     * @param string $jurisdictionOfIncorporation the state, province, or country where your business was legally incorporated, for example Delaware
     * @param string $legalName your business's full registered legal name, exactly as it appears on your incorporation or tax documents, 3 to 64 characters
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
     * @param string $website Your business's public website address, including https://. Leave blank if your business has no website.
     * @param string|Omitted|null $corporateRegistrationNumber The official number your company received when it was legally registered or incorporated (for example from your state or national business registry). It is on your certificate of incorporation.
     * @param string $customerReference Your own label for this account. Enter any reference that helps you find it in your records. Telnyx does not use it during vetting.
     * @param string|Omitted|null $dunBradstreetNumber Your optional 9-digit D-U-N-S Number issued by Dun & Bradstreet, a unique identifier for your business. Leave blank if you do not have one.
     * @param string|Omitted|null $primaryBusinessDomainSicCode The 4-digit Standard Industrial Classification code for your main line of business, which tells us what industry you operate in. Look it up in the SIC code directory if you are unsure.
     * @param string|Omitted|null $professionalLicenseNumber If your business operates under a professional license (for example legal, medical, or financial services), enter the license number issued by the licensing authority. Leave blank if it does not apply.
     * @param RoleType|value-of<RoleType> $roleType `enterprise` for an organization registering its own DIRs (the default, and the right choice when the calls display your own brand). `bpo` for a Business Process Outsourcer: a call center that places calls on behalf of other enterprises and displays their brand. A `bpo` enterprise describes the call center itself and cannot own a DIR. Each client the call center calls for gets its own `enterprise` in the same account, with the client's DIR under it; that DIR is then linked to the `bpo` enterprise through `bpo_authorizations`. Fixed at creation.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        PhysicalAddress|array $billingAddress,
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
        string|Omitted|null $corporateRegistrationNumber = Omitted::VALUE,
        ?string $customerReference = null,
        string|Omitted|null $dunBradstreetNumber = Omitted::VALUE,
        string|Omitted|null $primaryBusinessDomainSicCode = Omitted::VALUE,
        string|Omitted|null $professionalLicenseNumber = Omitted::VALUE,
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
     * @param PhysicalAddress|PhysicalAddressShape $billingAddress
     * @param BillingContact|BillingContactShape $billingContact
     * @param string|Omitted|null $corporateRegistrationNumber The official number your company received when it was legally registered or incorporated (for example from your state or national business registry). It is on your certificate of incorporation.
     * @param string $customerReference Your own label for this account. Enter any reference that helps you find it in your records. Telnyx does not use it during vetting.
     * @param string $doingBusinessAs The trade name your business operates under if it is different from your legal name, also called a Doing Business As (DBA) name. Leave blank if you only use your legal name.
     * @param string|Omitted|null $dunBradstreetNumber Your optional 9-digit D-U-N-S Number issued by Dun & Bradstreet, a unique identifier for your business. Leave blank if you do not have one.
     * @param string $fein US Federal Employer Identification Number (`NN-NNNNNNN`) or Canadian equivalent
     * @param \Telnyx\Enterprises\EnterpriseUpdateParams\Industry|value-of<\Telnyx\Enterprises\EnterpriseUpdateParams\Industry> $industry The industry your business operates in. Choose the closest match from the list; if your value is not accepted, pick the nearest category.
     * @param string $jurisdictionOfIncorporation the state, province, or country where your business was legally incorporated, for example Delaware
     * @param string $legalName your business's full registered legal name, exactly as it appears on your incorporation or tax documents, 3 to 64 characters
     * @param string $numberOfEmployees Approximate headcount range. Used for vetting heuristics; pick the bucket that contains your current employee count.
     * @param OrganizationContact|OrganizationContactShape $organizationContact
     * @param string $organizationLegalType Legal-entity form. Pick the form that matches your incorporation documents:
     * - `corporation` - C-corp or S-corp.
     * - `llc` - limited liability company.
     * - `partnership` - general/limited partnership.
     * - `nonprofit` - non-profit corporation, charitable trust, or 501(c)(3)/equivalent.
     * - `other` - anything else (sole proprietorships, government bodies, DBAs, etc.). You may be asked for additional documents during vetting.
     * @param PhysicalAddress|PhysicalAddressShape $organizationPhysicalAddress
     * @param string|Omitted|null $primaryBusinessDomainSicCode The 4-digit Standard Industrial Classification code for your main line of business, which tells us what industry you operate in. Look it up in the SIC code directory if you are unsure.
     * @param string|Omitted|null $professionalLicenseNumber If your business operates under a professional license (for example legal, medical, or financial services), enter the license number issued by the licensing authority. Leave blank if it does not apply.
     * @param string $website Your business's public website address, including https://. Leave blank if your business has no website.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $enterpriseID,
        PhysicalAddress|array|null $billingAddress = null,
        BillingContact|array|null $billingContact = null,
        string|Omitted|null $corporateRegistrationNumber = Omitted::VALUE,
        ?string $customerReference = null,
        ?string $doingBusinessAs = null,
        string|Omitted|null $dunBradstreetNumber = Omitted::VALUE,
        ?string $fein = null,
        \Telnyx\Enterprises\EnterpriseUpdateParams\Industry|string|null $industry = null,
        ?string $jurisdictionOfIncorporation = null,
        ?string $legalName = null,
        ?string $numberOfEmployees = null,
        OrganizationContact|array|null $organizationContact = null,
        ?string $organizationLegalType = null,
        PhysicalAddress|array|null $organizationPhysicalAddress = null,
        string|Omitted|null $primaryBusinessDomainSicCode = Omitted::VALUE,
        string|Omitted|null $professionalLicenseNumber = Omitted::VALUE,
        ?string $website = null,
        RequestOptions|array|null $requestOptions = null,
    ): EnterprisePublicWrapped;

    /**
     * @api
     *
     * @param string $filterLegalNameContains case-insensitive partial match on legal name
     * @param FilterRoleType|value-of<FilterRoleType> $filterRoleType Only return enterprises of this type: `bpo` for call-center (BPO) enterprises, `enterprise` for normal enterprises. Omit to return both.
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
        FilterRoleType|string|null $filterRoleType = null,
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
