<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CallEvents\CallEventListParams;
use Telnyx\CallEvents\CallEventListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallEventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CallEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<CallEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|CallEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
