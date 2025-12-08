<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NotificationEvents\NotificationEventListParams;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationEventsContract;

final class NotificationEventsService implements NotificationEventsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of your notifications events.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|NotificationEventListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationEventListResponse {
        [$parsed, $options] = NotificationEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NotificationEventListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'notification_events',
            query: $parsed,
            options: $options,
            convert: NotificationEventListResponse::class,
        );

        return $response->parse();
    }
}
