<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Calls\CallInitiateParams;
use Telnyx\Texml\Calls\CallInitiateResponse;
use Telnyx\Texml\Calls\CallUpdateParams;
use Telnyx\Texml\Calls\CallUpdateResponse;

interface CallsRawContract
{
    /**
     * @api
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param array<mixed>|CallUpdateParams $params
     *
     * @return BaseResponse<CallUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $applicationID the ID of the TeXML application used for the call
     * @param array<mixed>|CallInitiateParams $params
     *
     * @return BaseResponse<CallInitiateResponse>
     *
     * @throws APIException
     */
    public function initiate(
        string $applicationID,
        array|CallInitiateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
