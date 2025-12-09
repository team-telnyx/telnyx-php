<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

interface SiprecContract
{
    /**
     * @api
     *
     * @param string $siprecSid path param: The SiprecSid that uniquely identifies the Sip Recording
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param 'stopped'|Status $status Body param: The new status of the resource. Specifying `stopped` will end the siprec session.
     *
     * @throws APIException
     */
    public function siprecSidJson(
        string $siprecSid,
        string $accountSid,
        string $callSid,
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): SiprecSiprecSidJsonResponse;
}
