<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEvents\NotificationEventListParams;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;

interface NotificationEventsContract
{
    /**
     * @api
     *
     * @param array<mixed>|NotificationEventListParams $params
     *
     * @return DefaultPagination<NotificationEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
