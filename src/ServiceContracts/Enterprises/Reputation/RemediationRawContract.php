<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Remediation\RemediationGetResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListParams;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationRetrieveParams;
use Telnyx\Enterprises\Reputation\Remediation\RemediationSubmitParams;
use Telnyx\Enterprises\Reputation\Remediation\RemediationSubmitResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RemediationRawContract
{
    /**
     * @api
     *
     * @param string $remediationID The remediation request id. Lowercase UUID.
     * @param array<string,mixed>|RemediationRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RemediationGetResponse>
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

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|RemediationSubmitParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RemediationSubmitResponse>
     *
     * @throws APIException
     */
    public function submit(
        string $enterpriseID,
        array|RemediationSubmitParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
