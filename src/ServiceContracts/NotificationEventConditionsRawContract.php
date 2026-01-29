<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NotificationEventConditionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NotificationEventConditionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<NotificationEventConditionListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventConditionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
