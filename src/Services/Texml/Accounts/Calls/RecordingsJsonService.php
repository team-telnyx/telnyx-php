<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
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
        [$parsed, $options] = RecordingsJsonRecordingsJsonParams::parseRequest(
            [
                'accountSid' => $accountSid,
                'playBeep' => $playBeep,
                'recordingChannels' => $recordingChannels,
                'recordingStatusCallback' => $recordingStatusCallback,
                'recordingStatusCallbackEvent' => $recordingStatusCallbackEvent,
                'recordingStatusCallbackMethod' => $recordingStatusCallbackMethod,
                'recordingTrack' => $recordingTrack,
                'sendRecordingURL' => $sendRecordingURL,
            ],
            $requestOptions,
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
     */
    public function retrieveRecordingsJson(
        string $callSid,
        $accountSid,
        ?RequestOptions $requestOptions = null
    ): RecordingsJsonGetRecordingsJsonResponse {
        [
            $parsed, $options,
        ] = RecordingsJsonRetrieveRecordingsJsonParams::parseRequest(
            ['accountSid' => $accountSid],
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
