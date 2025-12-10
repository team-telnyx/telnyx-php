<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;

interface NotificationEventsContract
{
    /**
     * @api
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<NotificationEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;
}
