<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\LogMessages\LogMessageDismissResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageGetResponse;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams;
use Telnyx\ExternalConnections\LogMessages\LogMessageListResponse;
use Telnyx\RequestOptions;

interface LogMessagesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LogMessageGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|LogMessageListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|LogMessageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): LogMessageListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function dismiss(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LogMessageDismissResponse;
}
