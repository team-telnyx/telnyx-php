<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Siprec\SiprecSiprecSidJsonResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SiprecContract
{
    /**
     * @api
     *
     * @param string $siprecSid path param: The SiprecSid that uniquely identifies the Sip Recording
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param Status|value-of<Status> $status Body param: The new status of the resource. Specifying `stopped` will end the siprec session.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function siprecSidJson(
        string $siprecSid,
        string $accountSid,
        string $callSid,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): SiprecSiprecSidJsonResponse;
}
