<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\UserTags\UserTagListParams;
use Telnyx\UserTags\UserTagListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UserTagsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UserTagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserTagListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|UserTagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
