<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\NotificationEvents\NotificationEventListParams\Page;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NotificationEventsContract
{
    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationEventListResponse;
}
