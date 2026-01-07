<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\CallsContract;
use Telnyx\Texml\Calls\CallInitiateParams\AsyncAmdStatusCallbackMethod;
use Telnyx\Texml\Calls\CallInitiateParams\DetectionMode;
use Telnyx\Texml\Calls\CallInitiateParams\MachineDetection;
use Telnyx\Texml\Calls\CallInitiateParams\RecordingChannels;
use Telnyx\Texml\Calls\CallInitiateParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Calls\CallInitiateParams\RecordingTrack;
use Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackEvent;
use Telnyx\Texml\Calls\CallInitiateParams\Trim;
use Telnyx\Texml\Calls\CallInitiateParams\URLMethod;
use Telnyx\Texml\Calls\CallInitiateResponse;
use Telnyx\Texml\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Calls\CallUpdateParams\StatusCallbackMethod;
use Telnyx\Texml\Calls\CallUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallsService implements CallsContract
{
    /**
     * @api
     */
    public CallsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallsRawService($client);
    }

    /**
     * @api
     *
     * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param FallbackMethod|value-of<FallbackMethod> $fallbackMethod HTTP request type used for `FallbackUrl`
     * @param string $fallbackURL a failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding
     * @param Method|value-of<Method> $method HTTP request type used for `Url`
     * @param string $status The value to set the call status to. Setting the status to completed ends the call.
     * @param string $statusCallback URL destination for Telnyx to send status callback events to for the call
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod HTTP request type used for `StatusCallback`
     * @param string $texml teXML to replace the current one with
     * @param string $url the URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        FallbackMethod|string|null $fallbackMethod = null,
        ?string $fallbackURL = null,
        Method|string|null $method = null,
        ?string $status = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        ?string $texml = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallUpdateResponse {
        $params = Util::removeNulls(
            [
                'fallbackMethod' => $fallbackMethod,
                'fallbackURL' => $fallbackURL,
                'method' => $method,
                'status' => $status,
                'statusCallback' => $statusCallback,
                'statusCallbackMethod' => $statusCallbackMethod,
                'texml' => $texml,
                'url' => $url,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($callSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Initiate an outbound TeXML call. Telnyx will request TeXML from the XML Request URL configured for the connection in the Mission Control Portal.
     *
     * @param string $applicationID the ID of the TeXML application used for the call
     * @param string $from The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     * @param string $to The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     * @param bool $asyncAmd Select whether to perform answering machine detection in the background. By default execution is blocked until Answering Machine Detection is completed.
     * @param string $asyncAmdStatusCallback URL destination for Telnyx to send AMD callback events to for the call
     * @param AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod> $asyncAmdStatusCallbackMethod HTTP request type used for `AsyncAmdStatusCallback`. The default value is inherited from TeXML Application setting.
     * @param string $callerID To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     * @param bool $cancelPlaybackOnDetectMessageEnd Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     * @param bool $cancelPlaybackOnMachineDetection Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     * @param DetectionMode|value-of<DetectionMode> $detectionMode allows you to chose between Premium and Standard detections
     * @param string $fallbackURL a failover URL for which Telnyx will retrieve the TeXML call instructions if the `Url` is not responding
     * @param MachineDetection|value-of<MachineDetection> $machineDetection enables Answering Machine Detection
     * @param int $machineDetectionSilenceTimeout If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     * @param int $machineDetectionSpeechEndThreshold Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     * @param int $machineDetectionSpeechThreshold Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     * @param int $machineDetectionTimeout maximum timeout threshold in milliseconds for overall detection
     * @param string $preferredCodecs the list of comma-separated codecs to be offered on a call
     * @param bool $record Whether to record the entire participant's call leg. Defaults to `false`.
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels The number of channels in the final recording. Defaults to `mono`.
     * @param string $recordingStatusCallback the URL the recording callbacks will be sent to
     * @param string $recordingStatusCallbackEvent The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     * @param int $recordingTimeout The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite)
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack The audio track to record for the call. The default is `both`.
     * @param string $sipAuthPassword the password to use for SIP authentication
     * @param string $sipAuthUsername the username to use for SIP authentication
     * @param string $statusCallback URL destination for Telnyx to send status callback events to for the call
     * @param StatusCallbackEvent|value-of<StatusCallbackEvent> $statusCallbackEvent The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space.
     * @param \Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackMethod> $statusCallbackMethod HTTP request type used for `StatusCallback`
     * @param Trim|value-of<Trim> $trim Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     * @param string $url the URL from which Telnyx will retrieve the TeXML call instructions
     * @param URLMethod|value-of<URLMethod> $urlMethod HTTP request type used for `Url`. The default value is inherited from TeXML Application setting.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function initiate(
        string $applicationID,
        string $from,
        string $to,
        bool $asyncAmd = false,
        ?string $asyncAmdStatusCallback = null,
        AsyncAmdStatusCallbackMethod|string $asyncAmdStatusCallbackMethod = 'POST',
        ?string $callerID = null,
        bool $cancelPlaybackOnDetectMessageEnd = true,
        bool $cancelPlaybackOnMachineDetection = true,
        DetectionMode|string $detectionMode = 'Regular',
        ?string $fallbackURL = null,
        MachineDetection|string $machineDetection = 'Disable',
        int $machineDetectionSilenceTimeout = 3500,
        int $machineDetectionSpeechEndThreshold = 800,
        int $machineDetectionSpeechThreshold = 3500,
        int $machineDetectionTimeout = 30000,
        ?string $preferredCodecs = null,
        ?bool $record = null,
        RecordingChannels|string|null $recordingChannels = null,
        ?string $recordingStatusCallback = null,
        ?string $recordingStatusCallbackEvent = null,
        RecordingStatusCallbackMethod|string|null $recordingStatusCallbackMethod = null,
        int $recordingTimeout = 0,
        RecordingTrack|string|null $recordingTrack = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?string $statusCallback = null,
        StatusCallbackEvent|string $statusCallbackEvent = 'completed',
        \Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackMethod|string $statusCallbackMethod = 'POST',
        Trim|string|null $trim = null,
        ?string $url = null,
        URLMethod|string $urlMethod = 'POST',
        RequestOptions|array|null $requestOptions = null,
    ): CallInitiateResponse {
        $params = Util::removeNulls(
            [
                'from' => $from,
                'to' => $to,
                'asyncAmd' => $asyncAmd,
                'asyncAmdStatusCallback' => $asyncAmdStatusCallback,
                'asyncAmdStatusCallbackMethod' => $asyncAmdStatusCallbackMethod,
                'callerID' => $callerID,
                'cancelPlaybackOnDetectMessageEnd' => $cancelPlaybackOnDetectMessageEnd,
                'cancelPlaybackOnMachineDetection' => $cancelPlaybackOnMachineDetection,
                'detectionMode' => $detectionMode,
                'fallbackURL' => $fallbackURL,
                'machineDetection' => $machineDetection,
                'machineDetectionSilenceTimeout' => $machineDetectionSilenceTimeout,
                'machineDetectionSpeechEndThreshold' => $machineDetectionSpeechEndThreshold,
                'machineDetectionSpeechThreshold' => $machineDetectionSpeechThreshold,
                'machineDetectionTimeout' => $machineDetectionTimeout,
                'preferredCodecs' => $preferredCodecs,
                'record' => $record,
                'recordingChannels' => $recordingChannels,
                'recordingStatusCallback' => $recordingStatusCallback,
                'recordingStatusCallbackEvent' => $recordingStatusCallbackEvent,
                'recordingStatusCallbackMethod' => $recordingStatusCallbackMethod,
                'recordingTimeout' => $recordingTimeout,
                'recordingTrack' => $recordingTrack,
                'sipAuthPassword' => $sipAuthPassword,
                'sipAuthUsername' => $sipAuthUsername,
                'statusCallback' => $statusCallback,
                'statusCallbackEvent' => $statusCallbackEvent,
                'statusCallbackMethod' => $statusCallbackMethod,
                'trim' => $trim,
                'url' => $url,
                'urlMethod' => $urlMethod,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->initiate($applicationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
