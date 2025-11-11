<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateCreateParams;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse;
use Telnyx\RequestOptions;

interface MessagingNumbersBulkUpdatesContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingNumbersBulkUpdateCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MessagingNumbersBulkUpdateCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingNumbersBulkUpdateNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateGetResponse;
}
