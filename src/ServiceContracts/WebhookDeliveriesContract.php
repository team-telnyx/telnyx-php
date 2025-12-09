<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Status\Eq;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

interface WebhookDeliveriesContract
{
    /**
     * @api
     *
     * @param string $id uniquely identifies the webhook_delivery
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
     * @param array{
     *   attempts?: array{contains?: string},
     *   eventType?: string,
     *   finishedAt?: array{gte?: string, lte?: string},
     *   startedAt?: array{gte?: string, lte?: string},
     *   status?: array{eq?: 'delivered'|'failed'|Eq},
     *   webhook?: array{contains?: string},
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[status][eq], filter[event_type], filter[webhook][contains], filter[attempts][contains], filter[started_at][gte], filter[started_at][lte], filter[finished_at][gte], filter[finished_at][lte]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): WebhookDeliveryListResponse;
}
