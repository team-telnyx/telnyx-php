<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\StreamsContract;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse;

use const Telnyx\Core\OMIT as omit;

final class StreamsService implements StreamsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Updates streaming resource for particular call.
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
    ): StreamStreamingSidJsonResponse {
        $params = [
            'accountSid' => $accountSid, 'callSid' => $callSid, 'status' => $status,
        ];

        return $this->streamingSidJsonRaw($streamingSid, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): StreamStreamingSidJsonResponse {
        [$parsed, $options] = StreamStreamingSidJsonParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $callSid = $parsed['callSid'];
        unset($parsed['callSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Streams/%3$s.json',
                $accountSid,
                $callSid,
                $streamingSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['accountSid', 'callSid'])
            ),
            options: $options,
            convert: StreamStreamingSidJsonResponse::class,
        );
    }
}
