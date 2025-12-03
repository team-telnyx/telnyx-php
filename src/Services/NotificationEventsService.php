<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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
     * @return DefaultPagination<NotificationEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = NotificationEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'notification_events',
            query: $parsed,
            options: $options,
            convert: NotificationEventListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
