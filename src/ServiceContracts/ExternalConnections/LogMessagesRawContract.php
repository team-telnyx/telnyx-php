<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPaginationForLogMessages;
use Telnyx\ExternalConnections\LogMessages\LogMessageDismissResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;
use Telnyx\RequestOptions;

interface LogMessagesRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<LogMessageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|LogMessageListParams $params
     *
     * @return BaseResponse<DefaultPaginationForLogMessages<LogMessageListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|LogMessageListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<LogMessageDismissResponse>
     *
     * @throws APIException
     */
    public function dismiss(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
