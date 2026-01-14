<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WebhookDeliveriesContract
{
    /**
     * @api
     *
     * @param string $id uniquely identifies the webhook_delivery
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WebhookDeliveryGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[status][eq], filter[event_type], filter[webhook][contains], filter[attempts][contains], filter[started_at][gte], filter[started_at][lte], filter[finished_at][gte], filter[finished_at][lte]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<WebhookDeliveryListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
