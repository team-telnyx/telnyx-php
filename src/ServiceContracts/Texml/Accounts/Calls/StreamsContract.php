<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse;

use const Telnyx\Core\OMIT as omit;

interface StreamsContract
{
    /**
     * @api
     *
     * @param string $accountSid
     * @param string $callSid
     * @param Status|value-of<Status> $status the status of the Stream you wish to update
     *
     * @return StreamStreamingSidJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function streamingSidJson(
        string $streamingSid,
        $accountSid,
        $callSid,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): StreamStreamingSidJsonResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return StreamStreamingSidJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function streamingSidJsonRaw(
        string $streamingSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): StreamStreamingSidJsonResponse;
}
