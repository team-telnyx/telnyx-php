<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\StreamsContract;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonResponse;

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
     * @param array{
     *   accountSid: string, callSid: string, status?: 'stopped'|Status
     * }|StreamStreamingSidJsonParams $params
     *
     * @throws APIException
     */
    public function streamingSidJson(
        string $streamingSid,
        array|StreamStreamingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): StreamStreamingSidJsonResponse {
        [$parsed, $options] = StreamStreamingSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $callSid = $parsed['callSid'];
        unset($parsed['callSid']);

        /** @var BaseResponse<StreamStreamingSidJsonResponse> */
        $response = $this->client->request(
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

        return $response->parse();
    }
}
