<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;

use const Telnyx\Core\OMIT as omit;

interface RecordingsJsonContract
{
    /**
     * @api
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
    ): RecordingsJsonRecordingsJsonResponse;

    /**
     * @api
     *
     * @param string $accountSid
     *
     * @return RecordingsJsonGetRecordingsJsonResponse<HasRawResponse>
     */
    public function retrieveRecordingsJson(
        string $callSid,
        $accountSid,
        ?RequestOptions $requestOptions = null
    ): RecordingsJsonGetRecordingsJsonResponse;
}
