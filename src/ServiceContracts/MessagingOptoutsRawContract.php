<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingOptouts\MessagingOptoutListParams;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingOptoutsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessagingOptoutListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MessagingOptoutListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingOptoutListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
