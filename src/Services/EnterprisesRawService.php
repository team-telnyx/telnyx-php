<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\BillingAddress;
use Telnyx\Enterprises\BillingContact;
use Telnyx\Enterprises\EnterpriseActivateBrandedCallingResponse;
use Telnyx\Enterprises\EnterpriseCreateParams;
use Telnyx\Enterprises\EnterpriseCreateParams\Industry;
use Telnyx\Enterprises\EnterpriseCreateParams\NumberOfEmployees;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationLegalType;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationType;
use Telnyx\Enterprises\EnterpriseCreateParams\RoleType;
use Telnyx\Enterprises\EnterpriseGetResponse;
use Telnyx\Enterprises\EnterpriseListParams;
use Telnyx\Enterprises\EnterpriseNewResponse;
use Telnyx\Enterprises\EnterprisePublic;
use Telnyx\Enterprises\EnterpriseUpdateParams;
use Telnyx\Enterprises\EnterpriseUpdateResponse;
use Telnyx\Enterprises\OrganizationContact;
use Telnyx\Enterprises\PhysicalAddress;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EnterprisesRawContract;

/**
 * Manage the legal-entity record that owns your DIRs and phone numbers.
 *
 * @phpstan-import-type BillingAddressShape from \Telnyx\Enterprises\BillingAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\OrganizationContact
 * @phpstan-import-type PhysicalAddressShape from \Telnyx\Enterprises\PhysicalAddress
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EnterprisesRawService implements EnterprisesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create the legal entity (enterprise) that represents your business on the Telnyx platform.
     *
     * The response carries a server-assigned `id` you use for every subsequent call. An enterprise is created once and reused; the API collects all required fields up front.
     *
     * Common failure modes:
     * - `422` — a required field is missing or malformed (the response `errors[].source.pointer` names the field).
     * - `409` — an enterprise with the same identifying details already exists under your account.
     *
     * @param array{
     *   billingAddress: BillingAddress|BillingAddressShape,
     *   billingContact: BillingContact|BillingContactShape,
     *   countryCode: string,
     *   doingBusinessAs: string,
     *   fein: string,
     *   industry: value-of<Industry>,
     *   jurisdictionOfIncorporation: string,
     *   legalName: string,
     *   numberOfEmployees: NumberOfEmployees|value-of<NumberOfEmployees>,
     *   organizationContact: OrganizationContact|OrganizationContactShape,
     *   organizationLegalType: OrganizationLegalType|value-of<OrganizationLegalType>,
     *   organizationPhysicalAddress: PhysicalAddress|PhysicalAddressShape,
     *   organizationType: OrganizationType|value-of<OrganizationType>,
     *   website: string,
     *   corporateRegistrationNumber?: string|null,
     *   customerReference?: string,
     *   dunBradstreetNumber?: string|null,
     *   primaryBusinessDomainSicCode?: string|null,
     *   professionalLicenseNumber?: string|null,
     *   roleType?: RoleType|value-of<RoleType>,
     * }|EnterpriseCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EnterpriseCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EnterpriseCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'enterprises',
            body: (object) $parsed,
            options: $options,
            convert: EnterpriseNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a single enterprise by id. Returns `404` if the id does not exist or does not belong to your account.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['enterprises/%1$s', $enterpriseID],
            options: $requestOptions,
            convert: EnterpriseGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Replace the enterprise's mutable fields. Only mutable fields may be sent. Server-assigned and immutable fields (`id`, `record_type`, `created_at`, `updated_at`, status fields, `organization_type`, `country_code`, `role_type`) cannot be changed: including any of them in the body is rejected with `400 Bad Request` (`Field 'X' is not allowed in this request`).
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   billingAddress?: BillingAddress|BillingAddressShape,
     *   billingContact?: BillingContact|BillingContactShape,
     *   corporateRegistrationNumber?: string|null,
     *   customerReference?: string,
     *   doingBusinessAs?: string,
     *   dunBradstreetNumber?: string|null,
     *   fein?: string,
     *   industry?: value-of<EnterpriseUpdateParams\Industry>,
     *   jurisdictionOfIncorporation?: string,
     *   legalName?: string,
     *   numberOfEmployees?: string,
     *   organizationContact?: OrganizationContact|OrganizationContactShape,
     *   organizationLegalType?: string,
     *   organizationPhysicalAddress?: PhysicalAddress|PhysicalAddressShape,
     *   primaryBusinessDomainSicCode?: string|null,
     *   professionalLicenseNumber?: string|null,
     *   website?: string,
     * }|EnterpriseUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $enterpriseID,
        array|EnterpriseUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EnterpriseUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['enterprises/%1$s', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: EnterpriseUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the enterprises you own, paginated. The default page size is 20; the maximum is 250.
     *
     * @param array{
     *   legalName?: string, pageNumber?: int, pageSize?: int
     * }|EnterpriseListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EnterprisePublic>>
     *
     * @throws APIException
     */
    public function list(
        array|EnterpriseListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EnterpriseListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'enterprises',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'legalName' => 'legal_name',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: EnterprisePublic::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Soft-delete an enterprise.
     *
     * Failure modes:
     * - `400` — the enterprise still has dependent resources in a non-deletable state. Remove those first; the response `detail` identifies what is blocking the delete.
     * - `409` — the enterprise has a dependent resource with an unresolved claim. Resolve it before deleting.
     * - `404` — the enterprise does not exist or does not belong to your account.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['enterprises/%1$s', $enterpriseID],
            options: $requestOptions,
            convert: null,
        );
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
     * - `403` — Branded Calling Terms of Service not accepted.
     * - `404` — enterprise does not exist or does not belong to your account.
     *
     * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseActivateBrandedCallingResponse>
     *
     * @throws APIException
     */
    public function activateBrandedCalling(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['enterprises/%1$s/branded_calling', $enterpriseID],
            options: $requestOptions,
            convert: EnterpriseActivateBrandedCallingResponse::class,
        );
    }
}
