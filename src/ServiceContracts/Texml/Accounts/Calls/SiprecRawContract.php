<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

interface SiprecRawContract
{
    /**
     * @api
     *
     * @param string $siprecSid path param: The SiprecSid that uniquely identifies the Sip Recording
     * @param array<mixed>|SiprecSiprecSidJsonParams $params
     *
     * @return BaseResponse<SiprecSiprecSidJsonResponse>
     *
     * @throws APIException
     */
    public function siprecSidJson(
        string $siprecSid,
        array|SiprecSiprecSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
