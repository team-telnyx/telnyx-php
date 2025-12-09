<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Calls;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;

interface RecordingsJsonContract
{
    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param bool $playBeep body param: Whether to play a beep when recording is started
     * @param 'single'|'dual'|RecordingChannels $recordingChannels Body param: When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
     * @param string $recordingStatusCallback body param: Url where status callbacks will be sent
     * @param string $recordingStatusCallbackEvent Body param: The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     * @param 'GET'|'POST'|RecordingStatusCallbackMethod $recordingStatusCallbackMethod body param: HTTP method used to send status callbacks
     * @param 'inbound'|'outbound'|'both'|RecordingTrack $recordingTrack Body param: The audio track to record for the call. The default is `both`.
     * @param bool $sendRecordingURL body param: Whether to send RecordingUrl in webhooks
     *
     * @throws APIException
     */
    public function recordingsJson(
        string $callSid,
        string $accountSid,
        bool $playBeep = true,
        string|RecordingChannels $recordingChannels = 'dual',
        ?string $recordingStatusCallback = null,
        ?string $recordingStatusCallbackEvent = null,
        string|RecordingStatusCallbackMethod $recordingStatusCallbackMethod = 'POST',
        string|RecordingTrack|null $recordingTrack = null,
        bool $sendRecordingURL = true,
        ?RequestOptions $requestOptions = null,
    ): RecordingsJsonRecordingsJsonResponse;

    /**
     * @api
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param string $accountSid the id of the account the resource belongs to
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $callSid,
        string $accountSid,
        ?RequestOptions $requestOptions = null,
    ): RecordingsJsonGetRecordingsJsonResponse;
}
