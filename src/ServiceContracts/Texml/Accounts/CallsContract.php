<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\AsyncAmdStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\DetectionMode;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\MachineDetection;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackEvent;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackMethod as StatusCallbackMethod1;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Trim;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\URLMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetResponse;
use Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams\Status;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\SipTransport;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod as StatusCallbackMethod2;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\Track;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalCodec;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalMode;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod as StatusCallbackMethod3;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track as Track1;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface CallsContract
{
    /**
     * @api
     *
     * @param string $accountSid
     *
     * @return CallGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSid,
        $accountSid,
        ?RequestOptions $requestOptions = null
    ): CallGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $callSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallGetResponse;

    /**
     * @api
     *
     * @param string $accountSid
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
        $accountSid,
        $fallbackMethod = omit,
        $fallbackURL = omit,
        $method = omit,
        $status = omit,
        $statusCallback = omit,
        $statusCallbackMethod = omit,
        $texml = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): CallUpdateResponse;

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
    ): CallUpdateResponse;

    /**
     * @api
     *
     * @param string $applicationSid the ID of the TeXML Application
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
     * @param bool $sendRecordingURL whether to send RecordingUrl in webhooks
     * @param string $sipAuthPassword the password to use for SIP authentication
     * @param string $sipAuthUsername the username to use for SIP authentication
     * @param string $statusCallback URL destination for Telnyx to send status callback events to for the call
     * @param StatusCallbackEvent|value-of<StatusCallbackEvent> $statusCallbackEvent The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space.
     * @param StatusCallbackMethod1|value-of<StatusCallbackMethod1> $statusCallbackMethod HTTP request type used for `StatusCallback`
     * @param Trim|value-of<Trim> $trim Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     * @param string $url the URL from which Telnyx will retrieve the TeXML call instructions
     * @param URLMethod|value-of<URLMethod> $urlMethod HTTP request type used for `Url`. The default value is inherited from TeXML Application setting.
     *
     * @return CallCallsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function calls(
        string $accountSid,
        $applicationSid,
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
        $sendRecordingURL = omit,
        $sipAuthPassword = omit,
        $sipAuthUsername = omit,
        $statusCallback = omit,
        $statusCallbackEvent = omit,
        $statusCallbackMethod = omit,
        $trim = omit,
        $url = omit,
        $urlMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): CallCallsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallCallsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function callsRaw(
        string $accountSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CallCallsResponse;

    /**
     * @api
     *
     * @param string $endTime Filters calls by their end date. Expected format is YYYY-MM-DD
     * @param string $endTimeGt Filters calls by their end date (after). Expected format is YYYY-MM-DD
     * @param string $endTimeLt Filters calls by their end date (before). Expected format is YYYY-MM-DD
     * @param string $from filters calls by the from number
     * @param int $page the number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken
     * @param int $pageSize The number of records to be displayed on a page
     * @param string $pageToken used to request the next page of results
     * @param string $startTime Filters calls by their start date. Expected format is YYYY-MM-DD.
     * @param string $startTimeGt Filters calls by their start date (after). Expected format is YYYY-MM-DD
     * @param string $startTimeLt Filters calls by their start date (before). Expected format is YYYY-MM-DD
     * @param Status|value-of<Status> $status filters calls by status
     * @param string $to filters calls by the to number
     *
     * @return CallGetCallsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveCalls(
        string $accountSid,
        $endTime = omit,
        $endTimeGt = omit,
        $endTimeLt = omit,
        $from = omit,
        $page = omit,
        $pageSize = omit,
        $pageToken = omit,
        $startTime = omit,
        $startTimeGt = omit,
        $startTimeLt = omit,
        $status = omit,
        $to = omit,
        ?RequestOptions $requestOptions = null,
    ): CallGetCallsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallGetCallsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveCallsRaw(
        string $accountSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): CallGetCallsResponse;

    /**
     * @api
     *
     * @param string $accountSid
     * @param string $connectorName the name of the connector to use for the SIPREC session
     * @param bool $includeMetadataCustomHeaders When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     * @param string $name Name of the SIPREC session. May be used to stop the SIPREC session from TeXML instruction.
     * @param bool $secure Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     * @param int $sessionTimeoutSecs Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     * @param SipTransport|value-of<SipTransport> $sipTransport specifies SIP transport protocol
     * @param string $statusCallback URL destination for Telnyx to send status callback events to for the siprec session
     * @param StatusCallbackMethod2|value-of<StatusCallbackMethod2> $statusCallbackMethod HTTP request type used for `StatusCallback`
     * @param Track|value-of<Track> $track The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
     *
     * @return CallSiprecJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function siprecJson(
        string $callSid,
        $accountSid,
        $connectorName = omit,
        $includeMetadataCustomHeaders = omit,
        $name = omit,
        $secure = omit,
        $sessionTimeoutSecs = omit,
        $sipTransport = omit,
        $statusCallback = omit,
        $statusCallbackMethod = omit,
        $track = omit,
        ?RequestOptions $requestOptions = null,
    ): CallSiprecJsonResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallSiprecJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function siprecJsonRaw(
        string $callSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallSiprecJsonResponse;

    /**
     * @api
     *
     * @param string $accountSid
     * @param BidirectionalCodec|value-of<BidirectionalCodec> $bidirectionalCodec Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param BidirectionalMode|value-of<BidirectionalMode> $bidirectionalMode configures method of bidirectional streaming (mp3, rtp)
     * @param string $name the user specified name of Stream
     * @param string $statusCallback url where status callbacks will be sent
     * @param StatusCallbackMethod3|value-of<StatusCallbackMethod3> $statusCallbackMethod HTTP method used to send status callbacks
     * @param Track1|value-of<Track1> $track Tracks to be included in the stream
     * @param string $url the destination WebSocket address where the stream is going to be delivered
     *
     * @return CallStreamsJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function streamsJson(
        string $callSid,
        $accountSid,
        $bidirectionalCodec = omit,
        $bidirectionalMode = omit,
        $name = omit,
        $statusCallback = omit,
        $statusCallbackMethod = omit,
        $track = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): CallStreamsJsonResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CallStreamsJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function streamsJsonRaw(
        string $callSid,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallStreamsJsonResponse;
}
