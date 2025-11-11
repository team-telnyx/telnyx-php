<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Calls\CallInitiateParams;
use Telnyx\Texml\Calls\CallInitiateResponse;
use Telnyx\Texml\Calls\CallUpdateParams;
use Telnyx\Texml\Calls\CallUpdateResponse;

interface CallsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CallUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallInitiateParams $params
     *
     * @throws APIException
     */
    public function initiate(
        string $applicationID,
        array|CallInitiateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallInitiateResponse;
}
