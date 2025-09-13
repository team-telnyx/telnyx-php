<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

use const Telnyx\Core\OMIT as omit;

interface SiprecContract
{
    /**
     * @api
     *
     * @param string $accountSid
     * @param string $callSid
     * @param Status|value-of<Status> $status The new status of the resource. Specifying `stopped` will end the siprec session.
     *
     * @return SiprecSiprecSidJsonResponse<HasRawResponse>
     */
    public function siprecSidJson(
        string $siprecSid,
        $accountSid,
        $callSid,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): SiprecSiprecSidJsonResponse;
}
