<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateCreateParams;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse;
use Telnyx\RequestOptions;

interface MessagingNumbersBulkUpdatesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingNumbersBulkUpdateCreateParams $params
     *
     * @return BaseResponse<MessagingNumbersBulkUpdateNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingNumbersBulkUpdateCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $orderID order ID to verify bulk update status
     *
     * @return BaseResponse<MessagingNumbersBulkUpdateGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
