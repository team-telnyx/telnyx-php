<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationEventConditions\NotificationEventConditionListParams;
use Telnyx\NotificationEventConditions\NotificationEventConditionListResponse;
use Telnyx\RequestOptions;

interface NotificationEventConditionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|NotificationEventConditionListParams $params
     *
     * @return DefaultPagination<NotificationEventConditionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationEventConditionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
