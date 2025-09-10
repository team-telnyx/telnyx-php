<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\NotificationEvents\NotificationEventListParams;
use Telnyx\NotificationEvents\NotificationEventListParams\Page;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationEventsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationEventListResponse {
        [$parsed, $options] = NotificationEventListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'notification_events',
            query: $parsed,
            options: $options,
            convert: NotificationEventListResponse::class,
        );
    }
}
