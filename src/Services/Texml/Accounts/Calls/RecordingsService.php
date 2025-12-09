<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsContract;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams\Status;
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
     *   accountSid: string,
     *   callSid: string,
     *   status?: 'in-progress'|'paused'|'stopped'|Status,
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
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $callSid = $parsed['callSid'];
        unset($parsed['callSid']);

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
                array_flip(['accountSid', 'callSid'])
            ),
            options: $options,
            convert: RecordingRecordingSidJsonResponse::class,
        );

        return $response->parse();
    }
}
