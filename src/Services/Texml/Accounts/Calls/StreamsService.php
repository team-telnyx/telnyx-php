<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\StreamsContract;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class StreamsService implements StreamsContract
{
    /**
     * @api
     */
    public StreamsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StreamsRawService($client);
    }

    /**
     * @api
     *
     * Updates streaming resource for particular call.
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
    ): StreamStreamingSidJsonResponse {
        $params = Util::removeNulls(
            ['accountSid' => $accountSid, 'callSid' => $callSid, 'status' => $status]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->streamingSidJson($streamingSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
