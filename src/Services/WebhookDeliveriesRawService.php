<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WebhookDeliveriesRawContract;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Page;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookDeliveryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|WebhookDeliveryListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<WebhookDeliveryListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|WebhookDeliveryListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            page: DefaultPagination::class,
        );
    }
}
