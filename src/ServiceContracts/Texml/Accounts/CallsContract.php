<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\AsyncAmdStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\CustomHeader;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\DetectionMode;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\MachineDetection;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\SipRegion;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackEvent;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\SupervisingRole;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Trim;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\URLMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse;
use Telnyx\Texml\Accounts\Calls\CallGetResponse;
use Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams\Status;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\SipTransport;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\Track;
use Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalCodec;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalMode;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonResponse;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\FallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\Method;
use Telnyx\Texml\Accounts\Calls\CallUpdateParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse;

/**
 * @phpstan-import-type CustomHeaderShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\CustomHeader
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallsContract
{
    /**
     * @api
     *
     * @param string $callSid the CallSid that identifies the call to update
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): CallGetResponse;

    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param FallbackMethod|value-of<FallbackMethod> $fallbackMethod body param: HTTP request type used for `FallbackUrl`
     * @param string $fallbackURL body param: A failover URL for which Telnyx will retrieve the TeXML call instructions if the Url is not responding
     * @param Method|value-of<Method> $method body param: HTTP request type used for `Url`
     * @param string $status Body param: The value to set the call status to. Setting the status to completed ends the call.
     * @param string $statusCallback body param: URL destination for Telnyx to send status callback events to for the call
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod body param: HTTP request type used for `StatusCallback`
     * @param string $texml body param: TeXML to replace the current one with
     * @param string $url body param: The URL where TeXML will make a request to retrieve a new set of TeXML instructions to continue the call flow
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $callSid,
        string $accountSid,
        FallbackMethod|string|null $fallbackMethod = null,
        ?string $fallbackURL = null,
        Method|string|null $method = null,
        ?string $status = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        ?string $texml = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallUpdateResponse;

    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
     * @param string $applicationSid the ID of the TeXML Application
     * @param string $from The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     * @param string $to The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     * @param bool $asyncAmd Select whether to perform answering machine detection in the background. By default execution is blocked until Answering Machine Detection is completed.
     * @param string $asyncAmdStatusCallback URL destination for Telnyx to send AMD callback events to for the call
     * @param AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod> $asyncAmdStatusCallbackMethod HTTP request type used for `AsyncAmdStatusCallback`. The default value is inherited from TeXML Application setting.
     * @param string $callerID To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     * @param bool $cancelPlaybackOnDetectMessageEnd Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     * @param bool $cancelPlaybackOnMachineDetection Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     * @param list<CustomHeader|CustomHeaderShape> $customHeaders Custom HTTP headers to be sent with the call. Each header should be an object with 'name' and 'value' properties.
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
     * @param SipRegion|value-of<SipRegion> $sipRegion defines the SIP region to be used for the call
     * @param string $statusCallback URL destination for Telnyx to send status callback events to for the call
     * @param StatusCallbackEvent|value-of<StatusCallbackEvent> $statusCallbackEvent The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space.
     * @param \Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackMethod> $statusCallbackMethod HTTP request type used for `StatusCallback`
     * @param string $superviseCallSid The call control ID of the existing call to supervise. When provided, the created leg will be added to the specified call in supervising mode. Status callbacks and action callbacks will NOT be sent for the supervising leg.
     * @param SupervisingRole|value-of<SupervisingRole> $supervisingRole The supervising role for the new leg. Determines the audio behavior: barge (hear both sides), whisper (only hear supervisor), monitor (hear both sides but supervisor muted). Default: barge
     * @param string $texml TeXML to be used as instructions for the call. If provided, the call will execute these instructions instead of fetching from the Url.
     * @param int $timeLimit The maximum duration of the call in seconds. The minimum value is 30 and the maximum value is 14400 (4 hours). Default is 14400 seconds.
     * @param int $timeout The number of seconds to wait for the called party to answer the call before the call is canceled. The minimum value is 5 and the maximum value is 120. Default is 30 seconds.
     * @param Trim|value-of<Trim> $trim Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     * @param string $url the URL from which Telnyx will retrieve the TeXML call instructions
     * @param URLMethod|value-of<URLMethod> $urlMethod HTTP request type used for `Url`. The default value is inherited from TeXML Application setting.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function calls(
        string $accountSid,
        string $applicationSid,
        string $from,
        string $to,
        bool $asyncAmd = false,
        ?string $asyncAmdStatusCallback = null,
        AsyncAmdStatusCallbackMethod|string $asyncAmdStatusCallbackMethod = 'POST',
        ?string $callerID = null,
        bool $cancelPlaybackOnDetectMessageEnd = true,
        bool $cancelPlaybackOnMachineDetection = true,
        ?array $customHeaders = null,
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
        bool $sendRecordingURL = true,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        SipRegion|string $sipRegion = 'US',
        ?string $statusCallback = null,
        StatusCallbackEvent|string $statusCallbackEvent = 'completed',
        \Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackMethod|string $statusCallbackMethod = 'POST',
        ?string $superviseCallSid = null,
        SupervisingRole|string $supervisingRole = 'barge',
        ?string $texml = null,
        int $timeLimit = 14400,
        int $timeout = 30,
        Trim|string|null $trim = null,
        ?string $url = null,
        URLMethod|string $urlMethod = 'POST',
        RequestOptions|array|null $requestOptions = null,
    ): CallCallsResponse;

    /**
     * @api
     *
     * @param string $accountSid the id of the account the resource belongs to
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveCalls(
        string $accountSid,
        ?string $endTime = null,
        ?string $endTimeGt = null,
        ?string $endTimeLt = null,
        ?string $from = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $startTime = null,
        ?string $startTimeGt = null,
        ?string $startTimeLt = null,
        Status|string|null $status = null,
        ?string $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallGetCallsResponse;

    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param string $connectorName body param: The name of the connector to use for the SIPREC session
     * @param bool $includeMetadataCustomHeaders Body param: When set, custom parameters will be added as metadata (recording.session.ExtensionParameters). Otherwise, they’ll be added to sip headers.
     * @param string $name Body param: Name of the SIPREC session. May be used to stop the SIPREC session from TeXML instruction.
     * @param bool $secure Body param: Controls whether to encrypt media sent to your SRS using SRTP and TLS. When set you need to configure SRS port in your connector to 5061.
     * @param int $sessionTimeoutSecs Body param: Sets `Session-Expires` header to the INVITE. A reinvite is sent every half the value set. Usefull for session keep alive. Minimum value is 90, set to 0 to disable.
     * @param SipTransport|value-of<SipTransport> $sipTransport body param: Specifies SIP transport protocol
     * @param string $statusCallback body param: URL destination for Telnyx to send status callback events to for the siprec session
     * @param \Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod> $statusCallbackMethod body param: HTTP request type used for `StatusCallback`
     * @param Track|value-of<Track> $track Body param: The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function siprecJson(
        string $callSid,
        string $accountSid,
        ?string $connectorName = null,
        ?bool $includeMetadataCustomHeaders = null,
        ?string $name = null,
        ?bool $secure = null,
        int $sessionTimeoutSecs = 1800,
        SipTransport|string $sipTransport = 'udp',
        ?string $statusCallback = null,
        \Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams\StatusCallbackMethod|string|null $statusCallbackMethod = null,
        Track|string|null $track = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallSiprecJsonResponse;

    /**
     * @api
     *
     * @param string $callSid path param: The CallSid that identifies the call to update
     * @param string $accountSid path param: The id of the account the resource belongs to
     * @param BidirectionalCodec|value-of<BidirectionalCodec> $bidirectionalCodec Body param: Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     * @param BidirectionalMode|value-of<BidirectionalMode> $bidirectionalMode body param: Configures method of bidirectional streaming (mp3, rtp)
     * @param string $name body param: The user specified name of Stream
     * @param string $statusCallback body param: Url where status callbacks will be sent
     * @param \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod> $statusCallbackMethod body param: HTTP method used to send status callbacks
     * @param \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track|value-of<\Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track> $track Body param: Tracks to be included in the stream
     * @param string $url body param: The destination WebSocket address where the stream is going to be delivered
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function streamsJson(
        string $callSid,
        string $accountSid,
        BidirectionalCodec|string $bidirectionalCodec = 'PCMU',
        BidirectionalMode|string $bidirectionalMode = 'mp3',
        ?string $name = null,
        ?string $statusCallback = null,
        \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod|string $statusCallbackMethod = 'POST',
        \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track|string $track = 'inbound_track',
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): CallStreamsJsonResponse;
}
