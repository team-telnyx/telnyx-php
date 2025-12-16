<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;
use Telnyx\RequestOptions;

interface NotificationEventConditionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NotificationEventConditionListParams $params
     *
     * @return BaseResponse<DefaultPagination<NotificationEventConditionListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventConditionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
