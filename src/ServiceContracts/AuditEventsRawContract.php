<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AuditEvents\AuditEventListParams;
use Telnyx\AuditEvents\AuditEventListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AuditEventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AuditEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<AuditEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AuditEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
