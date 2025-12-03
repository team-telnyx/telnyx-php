<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WebhookDeliveriesContract;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

final class WebhookDeliveriesService implements WebhookDeliveriesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Provides webhook_delivery debug data, such as timestamps, delivery status and attempts.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WebhookDeliveryGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['webhook_deliveries/%1$s', $id],
            options: $requestOptions,
            convert: WebhookDeliveryGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists webhook_deliveries for the authenticated user
     *
     * @param array{
     *   filter?: array{
     *     attempts?: array{contains?: string},
     *     event_type?: string,
     *     finished_at?: array{gte?: string, lte?: string},
     *     started_at?: array{gte?: string, lte?: string},
     *     status?: array{eq?: 'delivered'|'failed'},
     *     webhook?: array{contains?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     * }|WebhookDeliveryListParams $params
     *
     * @return DefaultPagination<WebhookDeliveryListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WebhookDeliveryListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = WebhookDeliveryListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'webhook_deliveries',
            query: $parsed,
            options: $options,
            convert: WebhookDeliveryListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
