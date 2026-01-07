<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateCreateParams;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingNumbersBulkUpdatesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessagingNumbersBulkUpdateCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingNumbersBulkUpdateNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingNumbersBulkUpdateCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $orderID order ID to verify bulk update status
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingNumbersBulkUpdateGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
