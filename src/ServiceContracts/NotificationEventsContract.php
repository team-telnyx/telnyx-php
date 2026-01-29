<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEvents\NotificationEventListParams\Page;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PageShape from \Telnyx\NotificationEvents\NotificationEventListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NotificationEventsContract
{
    /**
     * @api
     *
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<NotificationEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null
    ): DefaultPagination;
}
