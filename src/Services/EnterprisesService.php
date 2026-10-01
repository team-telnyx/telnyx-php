<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
use Telnyx\ServiceContracts\EnterprisesContract;
use Telnyx\Services\Enterprises\DirService;
use Telnyx\Services\Enterprises\ReputationService;
use Telnyx\Services\Enterprises\VerifyEmailService;

/**
 * Manage the legal-entity record that owns your DIRs and phone numbers.
 *
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EnterprisesService implements EnterprisesContract
{
    /**
     * @api
     */
    public EnterprisesRawService $raw;

    /**
     * @api
     */
    public ReputationService $reputation;

    /**
     * @api
     */
    public DirService $dir;

    /**
     * @api
     */
    public VerifyEmailService $verifyEmail;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EnterprisesRawService($client);
        $this->reputation = new ReputationService($client);
        $this->dir = new DirService($client);
        $this->verifyEmail = new VerifyEmailService($client);
    }

    /**
     * @api
     *
     * Create the legal entity (enterprise) that represents your business on the Telnyx platform.
     *
     * The response carries a server-assigned `id` you use for every subsequent call. An enterprise is created once and reused; the API collects all required fields up front.
     *
     * Common failure modes:
     * - `422` - a required field is missing or malformed (the response `errors[].source.pointer` names the field).
     * - `409` - an enterprise with the same identifying details already exists under your account.
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
    ): EnterprisePublicWrapped {
        $params = array_filter(
            [
                'billingAddress' => $billingAddress,
                'billingContact' => $billingContact,
                'countryCode' => $countryCode,
                'doingBusinessAs' => $doingBusinessAs,
                'fein' => $fein,
                'industry' => $industry,
                'jurisdictionOfIncorporation' => $jurisdictionOfIncorporation,
                'legalName' => $legalName,
                'numberOfEmployees' => $numberOfEmployees,
                'organizationContact' => $organizationContact,
                'organizationLegalType' => $organizationLegalType,
                'organizationPhysicalAddress' => $organizationPhysicalAddress,
                'organizationType' => $organizationType,
                'website' => $website,
                'corporateRegistrationNumber' => $corporateRegistrationNumber,
                'customerReference' => $customerReference ?? Omitted::VALUE,
                'dunBradstreetNumber' => $dunBradstreetNumber,
                'primaryBusinessDomainSicCode' => $primaryBusinessDomainSicCode,
                'professionalLicenseNumber' => $professionalLicenseNumber,
                'roleType' => $roleType,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a single enterprise by id. Returns `404` if the id does not exist or does not belong to your account.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): EnterprisePublicWrapped {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replace the enterprise's mutable fields. Only mutable fields may be sent. Server-assigned and immutable fields (`id`, `record_type`, `created_at`, `updated_at`, status fields, `organization_type`, `country_code`, `role_type`) cannot be changed: including any of them in the body is rejected with `400 Bad Request` (`Field 'X' is not allowed in this request`).
     *
     * For an approved BPO enterprise (`role_type` `bpo`), changing any identity field (legal name, DBA, website, FEIN, industry, number of employees, physical address, organization contact, D-U-N-S number, legal type, SIC code, corporate registration number, professional license number, or jurisdiction of incorporation) resets `bpo_verification_status` to `pending` for re-approval and sets every DIR authorization for that BPO to `rejected`. After re-approval, link it again with a newly signed LOA (a new `loa_document_id`); resending the old one keeps the authorization `rejected`. Re-sending an unchanged value does not reset anything.
     *
     * If Number Reputation is enabled on the enterprise, `legal_name`, `doing_business_as`, `website`, `fein`, `industry`, `number_of_employees`, `organization_physical_address`, `organization_contact`, and `dun_bradstreet_number` cannot be changed: the request is rejected with `400`.
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
    ): EnterprisePublicWrapped {
        $params = array_filter(
            [
                'billingAddress' => $billingAddress ?? Omitted::VALUE,
                'billingContact' => $billingContact ?? Omitted::VALUE,
                'corporateRegistrationNumber' => $corporateRegistrationNumber,
                'customerReference' => $customerReference ?? Omitted::VALUE,
                'doingBusinessAs' => $doingBusinessAs ?? Omitted::VALUE,
                'dunBradstreetNumber' => $dunBradstreetNumber,
                'fein' => $fein ?? Omitted::VALUE,
                'industry' => $industry ?? Omitted::VALUE,
                'jurisdictionOfIncorporation' => $jurisdictionOfIncorporation ?? Omitted::VALUE,
                'legalName' => $legalName ?? Omitted::VALUE,
                'numberOfEmployees' => $numberOfEmployees ?? Omitted::VALUE,
                'organizationContact' => $organizationContact ?? Omitted::VALUE,
                'organizationLegalType' => $organizationLegalType ?? Omitted::VALUE,
                'organizationPhysicalAddress' => $organizationPhysicalAddress ?? Omitted::VALUE,
                'primaryBusinessDomainSicCode' => $primaryBusinessDomainSicCode,
                'professionalLicenseNumber' => $professionalLicenseNumber,
                'website' => $website ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the enterprises you own, paginated. The default page size is 20; the maximum is 250.
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
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'filterLegalNameContains' => $filterLegalNameContains ?? Omitted::VALUE,
                'filterRoleType' => $filterRoleType ?? Omitted::VALUE,
                'legalName' => $legalName ?? Omitted::VALUE,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Soft-delete an enterprise.
     *
     * Failure modes:
     * - `400` - the enterprise still has dependent resources in a non-deletable state. Remove those first; the response `detail` identifies what is blocking the delete.
     * - `409` - the enterprise has a dependent resource with an unresolved claim. Resolve it before deleting.
     * - `404` - the enterprise does not exist or does not belong to your account.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Branded Calling is a paid product that must be activated on each enterprise. Activation is idempotent:
     * - First call: marks the enterprise as activated and begins onboarding it with the Branded Calling platform asynchronously. Returns `200` with `branded_calling_enabled: true`.
     * - Re-call after success: no-op, returns the same enterprise body.
     * - Re-call after a prior failure: re-queues onboarding, returns `200`.
     *
     * Prerequisite: the calling user must have agreed to the Branded Calling Terms of Service (`POST /terms_of_service/branded_calling/agree`). Without that, this endpoint returns `403 terms_of_service_not_accepted`.
     *
     * Failure modes:
     * - `403` - Branded Calling Terms of Service not accepted.
     * - `404` - enterprise does not exist or does not belong to your account.
     *
     * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function brandedCalling(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): EnterprisePublicWrapped {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->brandedCalling($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
