<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\CallsContract;
use Telnyx\Texml\Calls\CallInitiateParams;
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
use Telnyx\Texml\Calls\CallUpdateParams;
use Telnyx\Texml\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Calls\CallUpdateParams\StatusCallbackMethod;
use Telnyx\Texml\Calls\CallUpdateResponse;

use const Telnyx\Core\OMIT as omit;

final class CallsService implements CallsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update TeXML call. Please note that the keys present in the payload MUST BE formatted in CamelCase as specified in the example.
     *
     * @param FallbackMethod|value-of<FallbackMethod> $fallbackMethod HTTP request type used for `FallbackUrl`
     * @param string $fallbackURL a failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding
     * @param Method|value-of<Method> $method HTTP request type used for `Url`
     * @param string $status The value to set the call status to. Setting the status to completed ends the call.
     * @param string $statusCallback URL destination for Telnyx to send status callback events to for the call
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod HTTP request type used for `StatusCallback`
     * @param string $texml teXML to replace the current one with
     * @param string $url the URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow
     *
     * @return CallUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        $fallbackMethod = omit,
        $fallbackURL = omit,
        $method = omit,
        $status = omit,
        $statusCallback = omit,
        $statusCallbackMethod = omit,
        $texml = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): CallUpdateResponse {
        $params = [
            'fallbackMethod' => $fallbackMethod,
            'fallbackURL' => $fallbackURL,
            'method' => $method,
            'status' => $status,
            'statusCallback' => $statusCallback,
            'statusCallbackMethod' => $statusCallbackMethod,
            'texml' => $texml,
            'url' => $url,
        ];

        return $this->updateRaw($callSid, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $callSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallUpdateResponse {
        [$parsed, $options] = CallUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['texml/calls/%1$s/update', $callSid],
            body: (object) $parsed,
            options: $options,
            convert: CallUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Initiate an outbound TeXML call. Telnyx will request TeXML from the XML Request URL configured for the connection in the Mission Control Portal.
     *
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
     * @param telnyx\Texml\Calls\CallInitiateParams\StatusCallbackMethod|value-of<Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackMethod> $statusCallbackMethod HTTP request type used for `StatusCallback`
     * @param Trim|value-of<Trim> $trim Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     * @param string $url the URL from which Telnyx will retrieve the TeXML call instructions
     * @param URLMethod|value-of<URLMethod> $urlMethod HTTP request type used for `Url`. The default value is inherited from TeXML Application setting.
     *
     * @return CallInitiateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function initiate(
        string $applicationID,
        $from,
        $to,
        $asyncAmd = omit,
        $asyncAmdStatusCallback = omit,
        $asyncAmdStatusCallbackMethod = omit,
        $callerID = omit,
        $cancelPlaybackOnDetectMessageEnd = omit,
        $cancelPlaybackOnMachineDetection = omit,
        $detectionMode = omit,
        $fallbackURL = omit,
        $machineDetection = omit,
        $machineDetectionSilenceTimeout = omit,
        $machineDetectionSpeechEndThreshold = omit,
        $machineDetectionSpeechThreshold = omit,
        $machineDetectionTimeout = omit,
        $preferredCodecs = omit,
        $record = omit,
        $recordingChannels = omit,
        $recordingStatusCallback = omit,
        $recordingStatusCallbackEvent = omit,
        $recordingStatusCallbackMethod = omit,
        $recordingTimeout = omit,
        $recordingTrack = omit,
        $sipAuthPassword = omit,
        $sipAuthUsername = omit,
        $statusCallback = omit,
        $statusCallbackEvent = omit,
        $statusCallbackMethod = omit,
        $trim = omit,
        $url = omit,
        $urlMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): CallInitiateResponse {
        $params = [
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
        ];

        return $this->initiateRaw($applicationID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallInitiateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function initiateRaw(
        string $applicationID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallInitiateResponse {
        [$parsed, $options] = CallInitiateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['texml/calls/%1$s', $applicationID],
            body: (object) $parsed,
            options: $options,
            convert: CallInitiateResponse::class,
        );
    }
}
