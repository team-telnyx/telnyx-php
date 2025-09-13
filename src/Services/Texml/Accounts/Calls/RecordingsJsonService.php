<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsJsonContract;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRetrieveRecordingsJsonParams;

use const Telnyx\Core\OMIT as omit;

final class RecordingsJsonService implements RecordingsJsonContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Starts recording with specified parameters for call idientified by call_sid.
     *
     * @param string $accountSid
     * @param bool $playBeep whether to play a beep when recording is started
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
     * @param string $recordingStatusCallback url where status callbacks will be sent
     * @param string $recordingStatusCallbackEvent The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod HTTP method used to send status callbacks
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack The audio track to record for the call. The default is `both`.
     * @param bool $sendRecordingURL whether to send RecordingUrl in webhooks
     *
     * @return RecordingsJsonRecordingsJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function recordingsJson(
        string $callSid,
        $accountSid,
        $playBeep = omit,
        $recordingChannels = omit,
        $recordingStatusCallback = omit,
        $recordingStatusCallbackEvent = omit,
        $recordingStatusCallbackMethod = omit,
        $recordingTrack = omit,
        $sendRecordingURL = omit,
        ?RequestOptions $requestOptions = null,
    ): RecordingsJsonRecordingsJsonResponse {
        $params = [
            'accountSid' => $accountSid,
            'playBeep' => $playBeep,
            'recordingChannels' => $recordingChannels,
            'recordingStatusCallback' => $recordingStatusCallback,
            'recordingStatusCallbackEvent' => $recordingStatusCallbackEvent,
            'recordingStatusCallbackMethod' => $recordingStatusCallbackMethod,
            'recordingTrack' => $recordingTrack,
            'sendRecordingURL' => $sendRecordingURL,
        ];

        return $this->recordingsJsonRaw($callSid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RecordingsJsonRecordingsJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function recordingsJsonRaw(
        string $callSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingsJsonRecordingsJsonResponse {
        [$parsed, $options] = RecordingsJsonRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Recordings.json', $accountSid, $callSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, array_flip(['accountSid'])),
            options: $options,
            convert: RecordingsJsonRecordingsJsonResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns recordings for a call identified by call_sid.
     *
     * @param string $accountSid
     *
     * @return RecordingsJsonGetRecordingsJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $callSid,
        $accountSid,
        ?RequestOptions $requestOptions = null
    ): RecordingsJsonGetRecordingsJsonResponse {
        $params = ['accountSid' => $accountSid];

        return $this->retrieveRecordingsJsonRaw($callSid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RecordingsJsonGetRecordingsJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJsonRaw(
        string $callSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingsJsonGetRecordingsJsonResponse {
        [
            $parsed, $options,
        ] = RecordingsJsonRetrieveRecordingsJsonParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Calls/%2$s/Recordings.json', $accountSid, $callSid,
            ],
            options: $options,
            convert: RecordingsJsonGetRecordingsJsonResponse::class,
        );
    }
}
