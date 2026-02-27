<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Calls;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Calls\RecordingsJsonContract;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonGetRecordingsJsonResponse;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RecordingsJsonService implements RecordingsJsonContract
{
    /**
     * @api
     */
    public RecordingsJsonRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RecordingsJsonRawService($client);
    }

    /**
     * @api
     *
     * Starts recording with specified parameters for call idientified by call_sid.
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param bool $playBeep body param: Whether to play a beep when recording is started
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels Body param: When `dual`, final audio file has the first leg on channel A, and the rest on channel B. `single` mixes both tracks into a single channel.
     * @param string $recordingStatusCallback body param: Url where status callbacks will be sent
     * @param string $recordingStatusCallbackEvent Body param: The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod body param: HTTP method used to send status callbacks
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack Body param: The audio track to record for the call. The default is `both`.
     * @param bool $sendRecordingURL body param: Whether to send RecordingUrl in webhooks
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recordingsJson(
        string $callSid,
        string $accountSid,
        bool $playBeep = true,
        RecordingChannels|string $recordingChannels = 'dual',
        ?string $recordingStatusCallback = null,
        ?string $recordingStatusCallbackEvent = null,
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod = 'POST',
        RecordingTrack|string|null $recordingTrack = null,
        bool $sendRecordingURL = true,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingsJsonRecordingsJsonResponse {
        $params = Util::removeNulls(
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
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recordingsJson($callSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns recordings for a call identified by call_sid.
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $callSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingsJsonGetRecordingsJsonResponse {
        $params = Util::removeNulls(['accountSid' => $accountSid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRecordingsJson($callSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
