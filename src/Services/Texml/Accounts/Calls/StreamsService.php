<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\StreamsContract;
use Telnyx\Texml\Accounts\Calls\Streams\StreamStreamingSidJsonParams;
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
     *   account_sid: string, call_sid: string, Status?: 'stopped'
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);
        $callSid = $parsed['call_sid'];
        unset($parsed['call_sid']);

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
                array_flip(['account_sid', 'call_sid'])
            ),
            options: $options,
            convert: StreamStreamingSidJsonResponse::class,
        );
    }
}
