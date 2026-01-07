<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Calls\CallDialParams;
use Telnyx\Calls\CallDialResponse;
use Telnyx\Calls\CallGetStatusResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CallDialParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallDialResponse>
     *
     * @throws APIException
     */
    public function dial(
        array|CallDialParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallGetStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $callControlID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
