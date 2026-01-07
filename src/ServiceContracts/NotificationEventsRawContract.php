<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEvents\NotificationEventListParams;
use Telnyx\NotificationEvents\NotificationEventListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NotificationEventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NotificationEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<NotificationEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
