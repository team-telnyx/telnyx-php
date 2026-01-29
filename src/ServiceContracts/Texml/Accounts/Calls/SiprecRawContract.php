<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SiprecRawContract
{
    /**
     * @api
     *
     * @param string $siprecSid path param: The SiprecSid that uniquely identifies the Sip Recording
     * @param array<string,mixed>|SiprecSiprecSidJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SiprecSiprecSidJsonResponse>
     *
     * @throws APIException
     */
    public function siprecSidJson(
        string $siprecSid,
        array|SiprecSiprecSidJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
