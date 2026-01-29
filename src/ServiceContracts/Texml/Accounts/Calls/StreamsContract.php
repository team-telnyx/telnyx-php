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
     * @param string $accountSid path param: The id of the account the resource belongs to
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
