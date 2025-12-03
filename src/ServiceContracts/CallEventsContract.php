<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CallEvents\CallEventListParams;
use Telnyx\CallEvents\CallEventListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface CallEventsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CallEventListParams $params
     *
     * @return DefaultPagination<CallEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CallEventListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;
}
