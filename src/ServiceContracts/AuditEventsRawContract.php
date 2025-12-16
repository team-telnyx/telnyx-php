<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AuditEvents\AuditEventListParams;
use Telnyx\AuditEvents\AuditEventListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface AuditEventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AuditEventListParams $params
     *
     * @return BaseResponse<DefaultPagination<AuditEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AuditEventListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
