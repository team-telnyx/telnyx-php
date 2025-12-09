<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CallEvents\CallEventListParams;
use Telnyx\CallEvents\CallEventListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CallEventsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CallEventListParams $params
     *
     * @return BaseResponse<CallEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CallEventListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
