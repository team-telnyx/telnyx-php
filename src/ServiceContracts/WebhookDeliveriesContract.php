<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     * @throws APIException
     */
    public function list(
        array|WebhookDeliveryListParams $params,
        ?RequestOptions $requestOptions = null,
    ): WebhookDeliveryListResponse;
}
