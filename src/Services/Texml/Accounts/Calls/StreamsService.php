<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\StreamsContract;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse;

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
     * @param 'stopped'|Status $status body param: The status of the Stream you wish to update
     *
     * @throws APIException
     */
    public function streamingSidJson(
        string $streamingSid,
        string $accountSid,
        string $callSid,
        string|Status $status = 'stopped',
        ?RequestOptions $requestOptions = null,
    ): StreamStreamingSidJsonResponse {
        $params = [
            'accountSid' => $accountSid, 'callSid' => $callSid, 'status' => $status,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->streamingSidJson($streamingSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
