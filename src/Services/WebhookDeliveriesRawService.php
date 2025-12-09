<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WebhookDeliveriesRawContract;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Status\Eq;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

final class WebhookDeliveriesRawService implements WebhookDeliveriesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Provides webhook_delivery debug data, such as timestamps, delivery status and attempts.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *     eventType?: string,
     *     finishedAt?: array{gte?: string, lte?: string},
     *     startedAt?: array{gte?: string, lte?: string},
     *     status?: array{eq?: 'delivered'|'failed'|Eq},
     *     webhook?: array{contains?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     * }|WebhookDeliveryListParams $params
     *
     * @return BaseResponse<WebhookDeliveryListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WebhookDeliveryListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookDeliveryListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhook_deliveries',
            query: $parsed,
            options: $options,
            convert: WebhookDeliveryListResponse::class,
        );
    }
}
