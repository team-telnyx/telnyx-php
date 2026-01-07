<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WebhookDeliveriesContract;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Page;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WebhookDeliveriesService implements WebhookDeliveriesContract
{
    /**
     * @api
     */
    public WebhookDeliveriesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhookDeliveriesRawService($client);
    }

    /**
     * @api
     *
     * Provides webhook_delivery debug data, such as timestamps, delivery status and attempts.
     *
     * @param string $id uniquely identifies the webhook_delivery
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WebhookDeliveryGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists webhook_deliveries for the authenticated user
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[status][eq], filter[event_type], filter[webhook][contains], filter[attempts][contains], filter[started_at][gte], filter[started_at][lte], filter[finished_at][gte], filter[finished_at][lte]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<WebhookDeliveryListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
