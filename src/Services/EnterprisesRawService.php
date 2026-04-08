<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\EnterpriseCreateParams;
use Telnyx\Enterprises\EnterpriseCreateParams\BillingAddress;
use Telnyx\Enterprises\EnterpriseCreateParams\BillingContact;
use Telnyx\Enterprises\EnterpriseCreateParams\NumberOfEmployees;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationContact;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationLegalType;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationPhysicalAddress;
use Telnyx\Enterprises\EnterpriseCreateParams\OrganizationType;
use Telnyx\Enterprises\EnterpriseCreateParams\RoleType;
use Telnyx\Enterprises\EnterpriseGetResponse;
use Telnyx\Enterprises\EnterpriseListParams;
use Telnyx\Enterprises\EnterpriseListResponse;
use Telnyx\Enterprises\EnterpriseNewResponse;
use Telnyx\Enterprises\EnterpriseUpdateParams;
use Telnyx\Enterprises\EnterpriseUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EnterprisesRawContract;

/**
 * Enterprise management for Branded Calling and Number Reputation services.
 *
 * @phpstan-import-type BillingAddressShape from \Telnyx\Enterprises\EnterpriseCreateParams\BillingAddress
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\EnterpriseCreateParams\BillingContact
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\EnterpriseCreateParams\OrganizationContact
 * @phpstan-import-type OrganizationPhysicalAddressShape from \Telnyx\Enterprises\EnterpriseCreateParams\OrganizationPhysicalAddress
 * @phpstan-import-type BillingAddressShape from \Telnyx\Enterprises\EnterpriseUpdateParams\BillingAddress as BillingAddressShape1
 * @phpstan-import-type BillingContactShape from \Telnyx\Enterprises\EnterpriseUpdateParams\BillingContact as BillingContactShape1
 * @phpstan-import-type OrganizationContactShape from \Telnyx\Enterprises\EnterpriseUpdateParams\OrganizationContact as OrganizationContactShape1
 * @phpstan-import-type OrganizationPhysicalAddressShape from \Telnyx\Enterprises\EnterpriseUpdateParams\OrganizationPhysicalAddress as OrganizationPhysicalAddressShape1
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
     * Create a new enterprise for Branded Calling / Number Reputation services.
     *
     * Registers the enterprise in the Branded Calling / Number Reputation services, enabling it to create Display Identity Records (DIRs) or enroll in Number Reputation monitoring.
     *
     * **Required Fields:** `legal_name`, `doing_business_as`, `organization_type`, `country_code`, `website`, `fein`, `industry`, `number_of_employees`, `organization_legal_type`, `organization_contact`, `billing_contact`, `organization_physical_address`, `billing_address`
     *
     * @param array{
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
     *   organizationPhysicalAddress: OrganizationPhysicalAddress|OrganizationPhysicalAddressShape,
     *   organizationType: OrganizationType|value-of<OrganizationType>,
     *   website: string,
     *   corporateRegistrationNumber?: string,
     *   customerReference?: string,
     *   dunBradstreetNumber?: string,
     *   primaryBusinessDomainSicCode?: string,
     *   professionalLicenseNumber?: string,
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
     * Retrieve details of a specific enterprise by ID.
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
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
     * Update enterprise information. All fields are optional — only the provided fields will be updated.
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param array{
     *   billingAddress?: EnterpriseUpdateParams\BillingAddress|BillingAddressShape1,
     *   billingContact?: EnterpriseUpdateParams\BillingContact|BillingContactShape1,
     *   corporateRegistrationNumber?: string,
     *   customerReference?: string,
     *   doingBusinessAs?: string,
     *   dunBradstreetNumber?: string,
     *   fein?: string,
     *   industry?: string,
     *   legalName?: string,
     *   numberOfEmployees?: EnterpriseUpdateParams\NumberOfEmployees|value-of<EnterpriseUpdateParams\NumberOfEmployees>,
     *   organizationContact?: EnterpriseUpdateParams\OrganizationContact|OrganizationContactShape1,
     *   organizationLegalType?: EnterpriseUpdateParams\OrganizationLegalType|value-of<EnterpriseUpdateParams\OrganizationLegalType>,
     *   organizationPhysicalAddress?: EnterpriseUpdateParams\OrganizationPhysicalAddress|OrganizationPhysicalAddressShape1,
     *   primaryBusinessDomainSicCode?: string,
     *   professionalLicenseNumber?: string,
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
     * Retrieve a paginated list of enterprises associated with your account.
     *
     * @param array{
     *   legalName?: string, pageNumber?: int, pageSize?: int
     * }|EnterpriseListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EnterpriseListResponse>>
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
            convert: EnterpriseListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete an enterprise and all associated resources. This action is irreversible.
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
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
}
