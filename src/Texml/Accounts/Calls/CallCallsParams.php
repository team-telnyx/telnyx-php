<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\AsyncAmdStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\CustomHeader;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\DetectionMode;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\MachineDetection;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingChannels;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\RecordingTrack;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\SipRegion;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackEvent;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\SupervisingRole;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\Trim;
use Telnyx\Texml\Accounts\Calls\CallCallsParams\URLMethod;

/**
 * Initiate an outbound TeXML call. Telnyx will request TeXML from the XML Request URL configured for the connection in the Mission Control Portal.
 *
 * @see Telnyx\Services\Texml\Accounts\CallsService::calls()
 *
 * @phpstan-import-type CustomHeaderShape from \Telnyx\Texml\Accounts\Calls\CallCallsParams\CustomHeader
 *
 * @phpstan-type CallCallsParamsShape = array{
 *   applicationSid: string,
 *   from: string,
 *   to: string,
 *   asyncAmd?: bool|null,
 *   asyncAmdStatusCallback?: string|null,
 *   asyncAmdStatusCallbackMethod?: null|AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod>,
 *   callerID?: string|null,
 *   cancelPlaybackOnDetectMessageEnd?: bool|null,
 *   cancelPlaybackOnMachineDetection?: bool|null,
 *   customHeaders?: list<CustomHeader|CustomHeaderShape>|null,
 *   detectionMode?: null|DetectionMode|value-of<DetectionMode>,
 *   fallbackURL?: string|null,
 *   machineDetection?: null|MachineDetection|value-of<MachineDetection>,
 *   machineDetectionSilenceTimeout?: int|null,
 *   machineDetectionSpeechEndThreshold?: int|null,
 *   machineDetectionSpeechThreshold?: int|null,
 *   machineDetectionTimeout?: int|null,
 *   preferredCodecs?: string|null,
 *   record?: bool|null,
 *   recordingChannels?: null|RecordingChannels|value-of<RecordingChannels>,
 *   recordingStatusCallback?: string|null,
 *   recordingStatusCallbackEvent?: string|null,
 *   recordingStatusCallbackMethod?: null|RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
 *   recordingTimeout?: int|null,
 *   recordingTrack?: null|RecordingTrack|value-of<RecordingTrack>,
 *   sendRecordingURL?: bool|null,
 *   sipAuthPassword?: string|null,
 *   sipAuthUsername?: string|null,
 *   sipRegion?: null|SipRegion|value-of<SipRegion>,
 *   statusCallback?: string|null,
 *   statusCallbackEvent?: null|StatusCallbackEvent|value-of<StatusCallbackEvent>,
 *   statusCallbackMethod?: null|StatusCallbackMethod|value-of<StatusCallbackMethod>,
 *   superviseCallSid?: string|null,
 *   supervisingRole?: null|SupervisingRole|value-of<SupervisingRole>,
 *   texml?: string|null,
 *   timeLimit?: int|null,
 *   timeout?: int|null,
 *   trim?: null|Trim|value-of<Trim>,
 *   url?: string|null,
 *   urlMethod?: null|URLMethod|value-of<URLMethod>,
 * }
 */
final class CallCallsParams implements BaseModel
{
    /** @use SdkModel<CallCallsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the TeXML Application.
     */
    #[Required('ApplicationSid')]
    public string $applicationSid;

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    #[Required('From')]
    public string $from;

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    #[Required('To')]
    public string $to;

    /**
     * Select whether to perform answering machine detection in the background. By default execution is blocked until Answering Machine Detection is completed.
     */
    #[Optional('AsyncAmd')]
    public ?bool $asyncAmd;

    /**
     * URL destination for Telnyx to send AMD callback events to for the call.
     */
    #[Optional('AsyncAmdStatusCallback')]
    public ?string $asyncAmdStatusCallback;

    /**
     * HTTP request type used for `AsyncAmdStatusCallback`. The default value is inherited from TeXML Application setting.
     *
     * @var value-of<AsyncAmdStatusCallbackMethod>|null $asyncAmdStatusCallbackMethod
     */
    #[Optional(
        'AsyncAmdStatusCallbackMethod',
        enum: AsyncAmdStatusCallbackMethod::class
    )]
    public ?string $asyncAmdStatusCallbackMethod;

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    #[Optional('CallerId')]
    public ?string $callerID;

    /**
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    #[Optional('CancelPlaybackOnDetectMessageEnd')]
    public ?bool $cancelPlaybackOnDetectMessageEnd;

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    #[Optional('CancelPlaybackOnMachineDetection')]
    public ?bool $cancelPlaybackOnMachineDetection;

    /**
     * Custom HTTP headers to be sent with the call. Each header should be an object with 'name' and 'value' properties.
     *
     * @var list<CustomHeader>|null $customHeaders
     */
    #[Optional('CustomHeaders', list: CustomHeader::class)]
    public ?array $customHeaders;

    /**
     * Allows you to chose between Premium and Standard detections.
     *
     * @var value-of<DetectionMode>|null $detectionMode
     */
    #[Optional('DetectionMode', enum: DetectionMode::class)]
    public ?string $detectionMode;

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the `Url` is not responding.
     */
    #[Optional('FallbackUrl')]
    public ?string $fallbackURL;

    /**
     * Enables Answering Machine Detection.
     *
     * @var value-of<MachineDetection>|null $machineDetection
     */
    #[Optional('MachineDetection', enum: MachineDetection::class)]
    public ?string $machineDetection;

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    #[Optional('MachineDetectionSilenceTimeout')]
    public ?int $machineDetectionSilenceTimeout;

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    #[Optional('MachineDetectionSpeechEndThreshold')]
    public ?int $machineDetectionSpeechEndThreshold;

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    #[Optional('MachineDetectionSpeechThreshold')]
    public ?int $machineDetectionSpeechThreshold;

    /**
     * Maximum timeout threshold in milliseconds for overall detection.
     */
    #[Optional('MachineDetectionTimeout')]
    public ?int $machineDetectionTimeout;

    /**
     * The list of comma-separated codecs to be offered on a call.
     */
    #[Optional('PreferredCodecs')]
    public ?string $preferredCodecs;

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    #[Optional('Record')]
    public ?bool $record;

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @var value-of<RecordingChannels>|null $recordingChannels
     */
    #[Optional('RecordingChannels', enum: RecordingChannels::class)]
    public ?string $recordingChannels;

    /**
     * The URL the recording callbacks will be sent to.
     */
    #[Optional('RecordingStatusCallback')]
    public ?string $recordingStatusCallback;

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    #[Optional('RecordingStatusCallbackEvent')]
    public ?string $recordingStatusCallbackEvent;

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<RecordingStatusCallbackMethod>|null $recordingStatusCallbackMethod
     */
    #[Optional(
        'RecordingStatusCallbackMethod',
        enum: RecordingStatusCallbackMethod::class
    )]
    public ?string $recordingStatusCallbackMethod;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Optional('RecordingTimeout')]
    public ?int $recordingTimeout;

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @var value-of<RecordingTrack>|null $recordingTrack
     */
    #[Optional('RecordingTrack', enum: RecordingTrack::class)]
    public ?string $recordingTrack;

    /**
     * Whether to send RecordingUrl in webhooks.
     */
    #[Optional('SendRecordingUrl')]
    public ?bool $sendRecordingURL;

    /**
     * The password to use for SIP authentication.
     */
    #[Optional('SipAuthPassword')]
    public ?string $sipAuthPassword;

    /**
     * The username to use for SIP authentication.
     */
    #[Optional('SipAuthUsername')]
    public ?string $sipAuthUsername;

    /**
     * Defines the SIP region to be used for the call.
     *
     * @var value-of<SipRegion>|null $sipRegion
     */
    #[Optional('SipRegion', enum: SipRegion::class)]
    public ?string $sipRegion;

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    #[Optional('StatusCallback')]
    public ?string $statusCallback;

    /**
     * The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space.
     *
     * @var value-of<StatusCallbackEvent>|null $statusCallbackEvent
     */
    #[Optional('StatusCallbackEvent', enum: StatusCallbackEvent::class)]
    public ?string $statusCallbackEvent;

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @var value-of<StatusCallbackMethod>|null $statusCallbackMethod
     */
    #[Optional('StatusCallbackMethod', enum: StatusCallbackMethod::class)]
    public ?string $statusCallbackMethod;

    /**
     * The call control ID of the existing call to supervise. When provided, the created leg will be added to the specified call in supervising mode. Status callbacks and action callbacks will NOT be sent for the supervising leg.
     */
    #[Optional('SuperviseCallSid')]
    public ?string $superviseCallSid;

    /**
     * The supervising role for the new leg. Determines the audio behavior: barge (hear both sides), whisper (only hear supervisor), monitor (hear both sides but supervisor muted). Default: barge.
     *
     * @var value-of<SupervisingRole>|null $supervisingRole
     */
    #[Optional('SupervisingRole', enum: SupervisingRole::class)]
    public ?string $supervisingRole;

    /**
     * TeXML to be used as instructions for the call. If provided, the call will execute these instructions instead of fetching from the Url.
     */
    #[Optional('Texml')]
    public ?string $texml;

    /**
     * The maximum duration of the call in seconds. The minimum value is 30 and the maximum value is 14400 (4 hours). Default is 14400 seconds.
     */
    #[Optional('TimeLimit')]
    public ?int $timeLimit;

    /**
     * The number of seconds to wait for the called party to answer the call before the call is canceled. The minimum value is 5 and the maximum value is 120. Default is 30 seconds.
     */
    #[Optional('Timeout')]
    public ?int $timeout;

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @var value-of<Trim>|null $trim
     */
    #[Optional('Trim', enum: Trim::class)]
    public ?string $trim;

    /**
     * The URL from which Telnyx will retrieve the TeXML call instructions.
     */
    #[Optional('Url')]
    public ?string $url;

    /**
     * HTTP request type used for `Url`. The default value is inherited from TeXML Application setting.
     *
     * @var value-of<URLMethod>|null $urlMethod
     */
    #[Optional('UrlMethod', enum: URLMethod::class)]
    public ?string $urlMethod;

    /**
     * `new CallCallsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallCallsParams::with(applicationSid: ..., from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallCallsParams)->withApplicationSid(...)->withFrom(...)->withTo(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod>|null $asyncAmdStatusCallbackMethod
     * @param list<CustomHeader|CustomHeaderShape>|null $customHeaders
     * @param DetectionMode|value-of<DetectionMode>|null $detectionMode
     * @param MachineDetection|value-of<MachineDetection>|null $machineDetection
     * @param RecordingChannels|value-of<RecordingChannels>|null $recordingChannels
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>|null $recordingStatusCallbackMethod
     * @param RecordingTrack|value-of<RecordingTrack>|null $recordingTrack
     * @param SipRegion|value-of<SipRegion>|null $sipRegion
     * @param StatusCallbackEvent|value-of<StatusCallbackEvent>|null $statusCallbackEvent
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod>|null $statusCallbackMethod
     * @param SupervisingRole|value-of<SupervisingRole>|null $supervisingRole
     * @param Trim|value-of<Trim>|null $trim
     * @param URLMethod|value-of<URLMethod>|null $urlMethod
     */
    public static function with(
        string $applicationSid,
        string $from,
        string $to,
        ?bool $asyncAmd = null,
        ?string $asyncAmdStatusCallback = null,
        AsyncAmdStatusCallbackMethod|string|null $asyncAmdStatusCallbackMethod = null,
        ?string $callerID = null,
        ?bool $cancelPlaybackOnDetectMessageEnd = null,
        ?bool $cancelPlaybackOnMachineDetection = null,
        ?array $customHeaders = null,
        DetectionMode|string|null $detectionMode = null,
        ?string $fallbackURL = null,
        MachineDetection|string|null $machineDetection = null,
        ?int $machineDetectionSilenceTimeout = null,
        ?int $machineDetectionSpeechEndThreshold = null,
        ?int $machineDetectionSpeechThreshold = null,
        ?int $machineDetectionTimeout = null,
        ?string $preferredCodecs = null,
        ?bool $record = null,
        RecordingChannels|string|null $recordingChannels = null,
        ?string $recordingStatusCallback = null,
        ?string $recordingStatusCallbackEvent = null,
        RecordingStatusCallbackMethod|string|null $recordingStatusCallbackMethod = null,
        ?int $recordingTimeout = null,
        RecordingTrack|string|null $recordingTrack = null,
        ?bool $sendRecordingURL = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        SipRegion|string|null $sipRegion = null,
        ?string $statusCallback = null,
        StatusCallbackEvent|string|null $statusCallbackEvent = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        ?string $superviseCallSid = null,
        SupervisingRole|string|null $supervisingRole = null,
        ?string $texml = null,
        ?int $timeLimit = null,
        ?int $timeout = null,
        Trim|string|null $trim = null,
        ?string $url = null,
        URLMethod|string|null $urlMethod = null,
    ): self {
        $self = new self;

        $self['applicationSid'] = $applicationSid;
        $self['from'] = $from;
        $self['to'] = $to;

        null !== $asyncAmd && $self['asyncAmd'] = $asyncAmd;
        null !== $asyncAmdStatusCallback && $self['asyncAmdStatusCallback'] = $asyncAmdStatusCallback;
        null !== $asyncAmdStatusCallbackMethod && $self['asyncAmdStatusCallbackMethod'] = $asyncAmdStatusCallbackMethod;
        null !== $callerID && $self['callerID'] = $callerID;
        null !== $cancelPlaybackOnDetectMessageEnd && $self['cancelPlaybackOnDetectMessageEnd'] = $cancelPlaybackOnDetectMessageEnd;
        null !== $cancelPlaybackOnMachineDetection && $self['cancelPlaybackOnMachineDetection'] = $cancelPlaybackOnMachineDetection;
        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $detectionMode && $self['detectionMode'] = $detectionMode;
        null !== $fallbackURL && $self['fallbackURL'] = $fallbackURL;
        null !== $machineDetection && $self['machineDetection'] = $machineDetection;
        null !== $machineDetectionSilenceTimeout && $self['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;
        null !== $machineDetectionSpeechEndThreshold && $self['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;
        null !== $machineDetectionSpeechThreshold && $self['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;
        null !== $machineDetectionTimeout && $self['machineDetectionTimeout'] = $machineDetectionTimeout;
        null !== $preferredCodecs && $self['preferredCodecs'] = $preferredCodecs;
        null !== $record && $self['record'] = $record;
        null !== $recordingChannels && $self['recordingChannels'] = $recordingChannels;
        null !== $recordingStatusCallback && $self['recordingStatusCallback'] = $recordingStatusCallback;
        null !== $recordingStatusCallbackEvent && $self['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        null !== $recordingStatusCallbackMethod && $self['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        null !== $recordingTimeout && $self['recordingTimeout'] = $recordingTimeout;
        null !== $recordingTrack && $self['recordingTrack'] = $recordingTrack;
        null !== $sendRecordingURL && $self['sendRecordingURL'] = $sendRecordingURL;
        null !== $sipAuthPassword && $self['sipAuthPassword'] = $sipAuthPassword;
        null !== $sipAuthUsername && $self['sipAuthUsername'] = $sipAuthUsername;
        null !== $sipRegion && $self['sipRegion'] = $sipRegion;
        null !== $statusCallback && $self['statusCallback'] = $statusCallback;
        null !== $statusCallbackEvent && $self['statusCallbackEvent'] = $statusCallbackEvent;
        null !== $statusCallbackMethod && $self['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $superviseCallSid && $self['superviseCallSid'] = $superviseCallSid;
        null !== $supervisingRole && $self['supervisingRole'] = $supervisingRole;
        null !== $texml && $self['texml'] = $texml;
        null !== $timeLimit && $self['timeLimit'] = $timeLimit;
        null !== $timeout && $self['timeout'] = $timeout;
        null !== $trim && $self['trim'] = $trim;
        null !== $url && $self['url'] = $url;
        null !== $urlMethod && $self['urlMethod'] = $urlMethod;

        return $self;
    }

    /**
     * The ID of the TeXML Application.
     */
    public function withApplicationSid(string $applicationSid): self
    {
        $self = clone $this;
        $self['applicationSid'] = $applicationSid;

        return $self;
    }

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Select whether to perform answering machine detection in the background. By default execution is blocked until Answering Machine Detection is completed.
     */
    public function withAsyncAmd(bool $asyncAmd): self
    {
        $self = clone $this;
        $self['asyncAmd'] = $asyncAmd;

        return $self;
    }

    /**
     * URL destination for Telnyx to send AMD callback events to for the call.
     */
    public function withAsyncAmdStatusCallback(
        string $asyncAmdStatusCallback
    ): self {
        $self = clone $this;
        $self['asyncAmdStatusCallback'] = $asyncAmdStatusCallback;

        return $self;
    }

    /**
     * HTTP request type used for `AsyncAmdStatusCallback`. The default value is inherited from TeXML Application setting.
     *
     * @param AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod> $asyncAmdStatusCallbackMethod
     */
    public function withAsyncAmdStatusCallbackMethod(
        AsyncAmdStatusCallbackMethod|string $asyncAmdStatusCallbackMethod
    ): self {
        $self = clone $this;
        $self['asyncAmdStatusCallbackMethod'] = $asyncAmdStatusCallbackMethod;

        return $self;
    }

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    public function withCallerID(string $callerID): self
    {
        $self = clone $this;
        $self['callerID'] = $callerID;

        return $self;
    }

    /**
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnDetectMessageEnd(
        bool $cancelPlaybackOnDetectMessageEnd
    ): self {
        $self = clone $this;
        $self['cancelPlaybackOnDetectMessageEnd'] = $cancelPlaybackOnDetectMessageEnd;

        return $self;
    }

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnMachineDetection(
        bool $cancelPlaybackOnMachineDetection
    ): self {
        $self = clone $this;
        $self['cancelPlaybackOnMachineDetection'] = $cancelPlaybackOnMachineDetection;

        return $self;
    }

    /**
     * Custom HTTP headers to be sent with the call. Each header should be an object with 'name' and 'value' properties.
     *
     * @param list<CustomHeader|CustomHeaderShape> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

        return $self;
    }

    /**
     * Allows you to chose between Premium and Standard detections.
     *
     * @param DetectionMode|value-of<DetectionMode> $detectionMode
     */
    public function withDetectionMode(DetectionMode|string $detectionMode): self
    {
        $self = clone $this;
        $self['detectionMode'] = $detectionMode;

        return $self;
    }

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the `Url` is not responding.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $self = clone $this;
        $self['fallbackURL'] = $fallbackURL;

        return $self;
    }

    /**
     * Enables Answering Machine Detection.
     *
     * @param MachineDetection|value-of<MachineDetection> $machineDetection
     */
    public function withMachineDetection(
        MachineDetection|string $machineDetection
    ): self {
        $self = clone $this;
        $self['machineDetection'] = $machineDetection;

        return $self;
    }

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSilenceTimeout(
        int $machineDetectionSilenceTimeout
    ): self {
        $self = clone $this;
        $self['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;

        return $self;
    }

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechEndThreshold(
        int $machineDetectionSpeechEndThreshold
    ): self {
        $self = clone $this;
        $self['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;

        return $self;
    }

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechThreshold(
        int $machineDetectionSpeechThreshold
    ): self {
        $self = clone $this;
        $self['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;

        return $self;
    }

    /**
     * Maximum timeout threshold in milliseconds for overall detection.
     */
    public function withMachineDetectionTimeout(
        int $machineDetectionTimeout
    ): self {
        $self = clone $this;
        $self['machineDetectionTimeout'] = $machineDetectionTimeout;

        return $self;
    }

    /**
     * The list of comma-separated codecs to be offered on a call.
     */
    public function withPreferredCodecs(string $preferredCodecs): self
    {
        $self = clone $this;
        $self['preferredCodecs'] = $preferredCodecs;

        return $self;
    }

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    public function withRecord(bool $record): self
    {
        $self = clone $this;
        $self['record'] = $record;

        return $self;
    }

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     */
    public function withRecordingChannels(
        RecordingChannels|string $recordingChannels
    ): self {
        $self = clone $this;
        $self['recordingChannels'] = $recordingChannels;

        return $self;
    }

    /**
     * The URL the recording callbacks will be sent to.
     */
    public function withRecordingStatusCallback(
        string $recordingStatusCallback
    ): self {
        $self = clone $this;
        $self['recordingStatusCallback'] = $recordingStatusCallback;

        return $self;
    }

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    public function withRecordingStatusCallbackEvent(
        string $recordingStatusCallbackEvent
    ): self {
        $self = clone $this;
        $self['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;

        return $self;
    }

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     */
    public function withRecordingStatusCallbackMethod(
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod
    ): self {
        $self = clone $this;
        $self['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;

        return $self;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordingTimeout(int $recordingTimeout): self
    {
        $self = clone $this;
        $self['recordingTimeout'] = $recordingTimeout;

        return $self;
    }

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack
    ): self {
        $self = clone $this;
        $self['recordingTrack'] = $recordingTrack;

        return $self;
    }

    /**
     * Whether to send RecordingUrl in webhooks.
     */
    public function withSendRecordingURL(bool $sendRecordingURL): self
    {
        $self = clone $this;
        $self['sendRecordingURL'] = $sendRecordingURL;

        return $self;
    }

    /**
     * The password to use for SIP authentication.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $self = clone $this;
        $self['sipAuthPassword'] = $sipAuthPassword;

        return $self;
    }

    /**
     * The username to use for SIP authentication.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $self = clone $this;
        $self['sipAuthUsername'] = $sipAuthUsername;

        return $self;
    }

    /**
     * Defines the SIP region to be used for the call.
     *
     * @param SipRegion|value-of<SipRegion> $sipRegion
     */
    public function withSipRegion(SipRegion|string $sipRegion): self
    {
        $self = clone $this;
        $self['sipRegion'] = $sipRegion;

        return $self;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $self = clone $this;
        $self['statusCallback'] = $statusCallback;

        return $self;
    }

    /**
     * The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space.
     *
     * @param StatusCallbackEvent|value-of<StatusCallbackEvent> $statusCallbackEvent
     */
    public function withStatusCallbackEvent(
        StatusCallbackEvent|string $statusCallbackEvent
    ): self {
        $self = clone $this;
        $self['statusCallbackEvent'] = $statusCallbackEvent;

        return $self;
    }

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $self = clone $this;
        $self['statusCallbackMethod'] = $statusCallbackMethod;

        return $self;
    }

    /**
     * The call control ID of the existing call to supervise. When provided, the created leg will be added to the specified call in supervising mode. Status callbacks and action callbacks will NOT be sent for the supervising leg.
     */
    public function withSuperviseCallSid(string $superviseCallSid): self
    {
        $self = clone $this;
        $self['superviseCallSid'] = $superviseCallSid;

        return $self;
    }

    /**
     * The supervising role for the new leg. Determines the audio behavior: barge (hear both sides), whisper (only hear supervisor), monitor (hear both sides but supervisor muted). Default: barge.
     *
     * @param SupervisingRole|value-of<SupervisingRole> $supervisingRole
     */
    public function withSupervisingRole(
        SupervisingRole|string $supervisingRole
    ): self {
        $self = clone $this;
        $self['supervisingRole'] = $supervisingRole;

        return $self;
    }

    /**
     * TeXML to be used as instructions for the call. If provided, the call will execute these instructions instead of fetching from the Url.
     */
    public function withTexml(string $texml): self
    {
        $self = clone $this;
        $self['texml'] = $texml;

        return $self;
    }

    /**
     * The maximum duration of the call in seconds. The minimum value is 30 and the maximum value is 14400 (4 hours). Default is 14400 seconds.
     */
    public function withTimeLimit(int $timeLimit): self
    {
        $self = clone $this;
        $self['timeLimit'] = $timeLimit;

        return $self;
    }

    /**
     * The number of seconds to wait for the called party to answer the call before the call is canceled. The minimum value is 5 and the maximum value is 120. Default is 30 seconds.
     */
    public function withTimeout(int $timeout): self
    {
        $self = clone $this;
        $self['timeout'] = $timeout;

        return $self;
    }

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @param Trim|value-of<Trim> $trim
     */
    public function withTrim(Trim|string $trim): self
    {
        $self = clone $this;
        $self['trim'] = $trim;

        return $self;
    }

    /**
     * The URL from which Telnyx will retrieve the TeXML call instructions.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * HTTP request type used for `Url`. The default value is inherited from TeXML Application setting.
     *
     * @param URLMethod|value-of<URLMethod> $urlMethod
     */
    public function withURLMethod(URLMethod|string $urlMethod): self
    {
        $self = clone $this;
        $self['urlMethod'] = $urlMethod;

        return $self;
    }
}
