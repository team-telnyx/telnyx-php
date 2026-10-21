<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface StreamsContract
{
    /**
     * @api
     *
     * @param string $streamingSid path param: Uniquely identifies the streaming by id
     * @param string $accountSid Path param: The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param Status|value-of<Status> $status body param: The status of the Stream you wish to update
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function streamingSidJson(
        string $streamingSid,
        string $accountSid,
        string $callSid,
        Status|string $status = 'stopped',
        RequestOptions|array|null $requestOptions = null,
    ): StreamStreamingSidJsonResponse;
}
