<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsContract;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;

final class RecordingsService implements RecordingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Updates recording resource for particular call.
     *
     * @param array{
     *   account_sid: string,
     *   call_sid: string,
     *   Status?: 'in-progress'|'paused'|'stopped',
     * }|RecordingRecordingSidJsonParams $params
     *
     * @throws APIException
     */
    public function recordingSidJson(
        string $recordingSid,
        array|RecordingRecordingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingRecordingSidJsonResponse {
        [$parsed, $options] = RecordingRecordingSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);
        $callSid = $parsed['call_sid'];
        unset($parsed['call_sid']);

        /** @var BaseResponse<RecordingRecordingSidJsonResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Recordings/%3$s.json',
                $accountSid,
                $callSid,
                $recordingSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['account_sid', 'call_sid'])
            ),
            options: $options,
            convert: RecordingRecordingSidJsonResponse::class,
        );

        return $response->parse();
    }
}
