<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messsages\MesssageRcsParams;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\RequestOptions;

interface MesssagesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|MesssageRcsParams $params
     *
     * @return BaseResponse<MesssageRcsResponse>
     *
     * @throws APIException
     */
    public function rcs(
        array|MesssageRcsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
