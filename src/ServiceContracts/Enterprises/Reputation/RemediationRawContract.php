<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Remediation\RemediationCreateParams;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListParams;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationRequestWrapped;
use Telnyx\Enterprises\Reputation\Remediation\RemediationRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RemediationRawContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|RemediationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RemediationRequestWrapped>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array|RemediationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $remediationID The remediation request id. Lowercase UUID.
     * @param array<string,mixed>|RemediationRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RemediationRequestWrapped>
     *
     * @throws APIException
     */
    public function retrieve(
        string $remediationID,
        array|RemediationRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|RemediationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RemediationListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        array|RemediationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
