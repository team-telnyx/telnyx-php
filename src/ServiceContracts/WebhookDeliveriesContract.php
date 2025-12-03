<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

interface WebhookDeliveriesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookDeliveryGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|WebhookDeliveryListParams $params
     *
     * @return DefaultPagination<WebhookDeliveryListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WebhookDeliveryListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
