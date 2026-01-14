<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\NotificationEvents\NotificationEventListParams;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationEventsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   pageNumber?: int, pageSize?: int
     * }|NotificationEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NotificationEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NotificationEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'notification_events',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: NotificationEventListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
