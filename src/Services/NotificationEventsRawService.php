<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEvents\NotificationEventListParams;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationEventsRawContract;

final class NotificationEventsRawService implements NotificationEventsRawContract
{
    // @phpstan-ignore-next-line
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
     * @return BaseResponse<DefaultPagination<NotificationEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
