<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AuditEvents\AuditEventListParams;
use Telnyx\AuditEvents\AuditEventListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AuditEventsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AuditEventListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AuditEventListParams $params,
        ?RequestOptions $requestOptions = null
    ): AuditEventListResponse;
}
