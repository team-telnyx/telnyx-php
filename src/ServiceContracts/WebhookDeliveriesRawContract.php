<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

interface WebhookDeliveriesRawContract
{
    /**
     * @api
     *
     * @param string $id uniquely identifies the webhook_delivery
     *
     * @return BaseResponse<WebhookDeliveryGetResponse>
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
     * @param array<string,mixed>|WebhookDeliveryListParams $params
     *
     * @return BaseResponse<DefaultPagination<WebhookDeliveryListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|WebhookDeliveryListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
