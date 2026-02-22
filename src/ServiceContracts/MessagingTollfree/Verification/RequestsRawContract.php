<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingTollfree\Verification;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPaginationForMessagingTollfree;
use Telnyx\MessagingTollfree\Verification\Requests\RequestCreateParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestGetStatusHistoryResponse;
use Telnyx\MessagingTollfree\Verification\Requests\RequestListParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestRetrieveStatusHistoryParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestUpdateParams;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestEgress;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestStatus;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RequestsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RequestCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationRequestEgress>
     *
     * @throws APIException
     */
    public function create(
        array|RequestCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationRequestStatus>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RequestUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationRequestEgress>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|RequestUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RequestListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPaginationForMessagingTollfree<VerificationRequestStatus,>,>
     *
     * @throws APIException
     */
    public function list(
        array|RequestListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RequestRetrieveStatusHistoryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequestGetStatusHistoryResponse>
     *
     * @throws APIException
     */
    public function retrieveStatusHistory(
        string $id,
        array|RequestRetrieveStatusHistoryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
