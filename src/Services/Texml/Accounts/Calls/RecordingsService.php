<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsContract;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonParams\Status;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $accountSid
     * @param string $callSid
     * @param Status|value-of<Status> $status
     *
     * @return RecordingRecordingSidJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function recordingSidJson(
        string $recordingSid,
        $accountSid,
        $callSid,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): RecordingRecordingSidJsonResponse {
        $params = [
            'accountSid' => $accountSid, 'callSid' => $callSid, 'status' => $status,
        ];

        return $this->recordingSidJsonRaw($recordingSid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RecordingRecordingSidJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function recordingSidJsonRaw(
        string $recordingSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingRecordingSidJsonResponse {
        [$parsed, $options] = RecordingRecordingSidJsonParams::parseRequest(
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
    }
}
