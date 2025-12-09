<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\UserTags\UserTagListParams;
use Telnyx\UserTags\UserTagListResponse;

interface UserTagsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserTagListParams $params
     *
     * @return BaseResponse<UserTagListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|UserTagListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
