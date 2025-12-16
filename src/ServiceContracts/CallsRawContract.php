<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Calls\CallDialParams;
use Telnyx\Calls\CallDialResponse;
use Telnyx\Calls\CallGetStatusResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CallsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CallDialParams $params
     *
     * @return BaseResponse<CallDialResponse>
     *
     * @throws APIException
     */
    public function dial(
        array|CallDialParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     *
     * @return BaseResponse<CallGetStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $callControlID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
