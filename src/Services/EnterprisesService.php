<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\BillingAddress;
use Telnyx\Enterprises\BillingContact;
use Telnyx\Enterprises\EnterpriseActivateBrandedCallingResponse;
use Telnyx\Enterprises\EnterpriseCreateParams\Industry;
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
use Telnyx\ServiceContracts\EnterprisesContract;
use Telnyx\Services\Enterprises\DirService;
use Telnyx\Services\Enterprises\ReputationService;

/**
 * Manage the legal-entity record that owns your DIRs and phone numbers.
 *
 * @phpstan-import-type BillingAddressShape from \Telnyx\Enterprises\BillingAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
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
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EnterprisesRawService($client);
        $this->reputation = new ReputationService($client);
        $this->dir = new DirService($client);
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
    ): EnterpriseNewResponse {
        $params = Util::removeNulls(
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
                'customerReference' => $customerReference,
                'dunBradstreetNumber' => $dunBradstreetNumber,
                'primaryBusinessDomainSicCode' => $primaryBusinessDomainSicCode,
                'professionalLicenseNumber' => $professionalLicenseNumber,
                'roleType' => $roleType,
            ],
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
    ): EnterpriseGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replace the enterprise's mutable fields. Only mutable fields may be sent. Server-assigned and immutable fields (`id`, `record_type`, `created_at`, `updated_at`, status fields, `organization_type`, `country_code`, `role_type`) cannot be changed: including any of them in the body is rejected with `400 Bad Request` (`Field 'X' is not allowed in this request`).
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
    ): EnterpriseUpdateResponse {
        $params = Util::removeNulls(
            [
                'billingAddress' => $billingAddress,
                'billingContact' => $billingContact,
                'corporateRegistrationNumber' => $corporateRegistrationNumber,
                'customerReference' => $customerReference,
                'doingBusinessAs' => $doingBusinessAs,
                'dunBradstreetNumber' => $dunBradstreetNumber,
                'fein' => $fein,
                'industry' => $industry,
                'jurisdictionOfIncorporation' => $jurisdictionOfIncorporation,
                'legalName' => $legalName,
                'numberOfEmployees' => $numberOfEmployees,
                'organizationContact' => $organizationContact,
                'organizationLegalType' => $organizationLegalType,
                'organizationPhysicalAddress' => $organizationPhysicalAddress,
                'primaryBusinessDomainSicCode' => $primaryBusinessDomainSicCode,
                'professionalLicenseNumber' => $professionalLicenseNumber,
                'website' => $website,
            ],
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterLegalNameContains' => $filterLegalNameContains,
                'legalName' => $legalName,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
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
    public function activateBrandedCalling(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): EnterpriseActivateBrandedCallingResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->activateBrandedCalling($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
