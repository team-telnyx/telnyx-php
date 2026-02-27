<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NotificationEventsContract;

/**
 * Notification settings operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NotificationEventsService implements NotificationEventsContract
{
    /**
     * @api
     */
    public NotificationEventsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NotificationEventsRawService($client);
    }

    /**
     * @api
     *
     * Returns a list of your notifications events.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NotificationEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
