<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

interface SiprecContract
{
    /**
     * @api
     *
     * @param array<mixed>|SiprecSiprecSidJsonParams $params
     *
     * @throws APIException
     */
    public function siprecSidJson(
        string $siprecSid,
        array|SiprecSiprecSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): SiprecSiprecSidJsonResponse;
}
