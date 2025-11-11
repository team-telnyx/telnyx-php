<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Calls\CallInitiateParams\AsyncAmdStatusCallbackMethod;
use Telnyx\Texml\Calls\CallInitiateParams\DetectionMode;
use Telnyx\Texml\Calls\CallInitiateParams\MachineDetection;
use Telnyx\Texml\Calls\CallInitiateParams\RecordingChannels;
use Telnyx\Texml\Calls\CallInitiateParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Calls\CallInitiateParams\RecordingTrack;
use Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackEvent;
use Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackMethod;
use Telnyx\Texml\Calls\CallInitiateParams\Trim;
use Telnyx\Texml\Calls\CallInitiateParams\URLMethod;

/**
 * Initiate an outbound TeXML call. Telnyx will request TeXML from the XML Request URL configured for the connection in the Mission Control Portal.
 *
 * @see Telnyx\Texml\Calls->initiate
 *
 * @phpstan-type CallInitiateParamsShape = array{
 *   From: string,
 *   To: string,
 *   AsyncAmd?: bool,
 *   AsyncAmdStatusCallback?: string,
 *   AsyncAmdStatusCallbackMethod?: \Telnyx\Texml\Calls\CallInitiateParams\AsyncAmdStatusCallbackMethod|value-of<\Telnyx\Texml\Calls\CallInitiateParams\AsyncAmdStatusCallbackMethod>,
 *   CallerId?: string,
 *   CancelPlaybackOnDetectMessageEnd?: bool,
 *   CancelPlaybackOnMachineDetection?: bool,
 *   DetectionMode?: \Telnyx\Texml\Calls\CallInitiateParams\DetectionMode|value-of<\Telnyx\Texml\Calls\CallInitiateParams\DetectionMode>,
 *   FallbackUrl?: string,
 *   MachineDetection?: \Telnyx\Texml\Calls\CallInitiateParams\MachineDetection|value-of<\Telnyx\Texml\Calls\CallInitiateParams\MachineDetection>,
 *   MachineDetectionSilenceTimeout?: int,
 *   MachineDetectionSpeechEndThreshold?: int,
 *   MachineDetectionSpeechThreshold?: int,
 *   MachineDetectionTimeout?: int,
 *   PreferredCodecs?: string,
 *   Record?: bool,
 *   RecordingChannels?: \Telnyx\Texml\Calls\CallInitiateParams\RecordingChannels|value-of<\Telnyx\Texml\Calls\CallInitiateParams\RecordingChannels>,
 *   RecordingStatusCallback?: string,
 *   RecordingStatusCallbackEvent?: string,
 *   RecordingStatusCallbackMethod?: \Telnyx\Texml\Calls\CallInitiateParams\RecordingStatusCallbackMethod|value-of<\Telnyx\Texml\Calls\CallInitiateParams\RecordingStatusCallbackMethod>,
 *   RecordingTimeout?: int,
 *   RecordingTrack?: \Telnyx\Texml\Calls\CallInitiateParams\RecordingTrack|value-of<\Telnyx\Texml\Calls\CallInitiateParams\RecordingTrack>,
 *   SipAuthPassword?: string,
 *   SipAuthUsername?: string,
 *   StatusCallback?: string,
 *   StatusCallbackEvent?: \Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackEvent|value-of<\Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackEvent>,
 *   StatusCallbackMethod?: \Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Calls\CallInitiateParams\StatusCallbackMethod>,
 *   Trim?: \Telnyx\Texml\Calls\CallInitiateParams\Trim|value-of<\Telnyx\Texml\Calls\CallInitiateParams\Trim>,
 *   Url?: string,
 *   UrlMethod?: URLMethod|value-of<URLMethod>,
 * }
 */
final class CallInitiateParams implements BaseModel
{
    /** @use SdkModel<CallInitiateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    #[Api]
    public string $From;

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    #[Api]
    public string $To;

    /**
     * Select whether to perform answering machine detection in the background. By default execution is blocked until Answering Machine Detection is completed.
     */
    #[Api(optional: true)]
    public ?bool $AsyncAmd;

    /**
     * URL destination for Telnyx to send AMD callback events to for the call.
     */
    #[Api(optional: true)]
    public ?string $AsyncAmdStatusCallback;

    /**
     * HTTP request type used for `AsyncAmdStatusCallback`. The default value is inherited from TeXML Application setting.
     *
     * @var value-of<AsyncAmdStatusCallbackMethod>|null $AsyncAmdStatusCallbackMethod
     */
    #[Api(
        enum: AsyncAmdStatusCallbackMethod::class,
        optional: true,
    )]
    public ?string $AsyncAmdStatusCallbackMethod;

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    #[Api(optional: true)]
    public ?string $CallerId;

    /**
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    #[Api(optional: true)]
    public ?bool $CancelPlaybackOnDetectMessageEnd;

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    #[Api(optional: true)]
    public ?bool $CancelPlaybackOnMachineDetection;

    /**
     * Allows you to chose between Premium and Standard detections.
     *
     * @var value-of<DetectionMode>|null $DetectionMode
     */
    #[Api(
        enum: DetectionMode::class,
        optional: true,
    )]
    public ?string $DetectionMode;

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the `Url` is not responding.
     */
    #[Api(optional: true)]
    public ?string $FallbackUrl;

    /**
     * Enables Answering Machine Detection.
     *
     * @var value-of<MachineDetection>|null $MachineDetection
     */
    #[Api(
        enum: MachineDetection::class,
        optional: true,
    )]
    public ?string $MachineDetection;

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    #[Api(optional: true)]
    public ?int $MachineDetectionSilenceTimeout;

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    #[Api(optional: true)]
    public ?int $MachineDetectionSpeechEndThreshold;

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    #[Api(optional: true)]
    public ?int $MachineDetectionSpeechThreshold;

    /**
     * Maximum timeout threshold in milliseconds for overall detection.
     */
    #[Api(optional: true)]
    public ?int $MachineDetectionTimeout;

    /**
     * The list of comma-separated codecs to be offered on a call.
     */
    #[Api(optional: true)]
    public ?string $PreferredCodecs;

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $Record;

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @var value-of<RecordingChannels>|null $RecordingChannels
     */
    #[Api(
        enum: RecordingChannels::class,
        optional: true,
    )]
    public ?string $RecordingChannels;

    /**
     * The URL the recording callbacks will be sent to.
     */
    #[Api(optional: true)]
    public ?string $RecordingStatusCallback;

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    #[Api(optional: true)]
    public ?string $RecordingStatusCallbackEvent;

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @var value-of<RecordingStatusCallbackMethod>|null $RecordingStatusCallbackMethod
     */
    #[Api(
        enum: RecordingStatusCallbackMethod::class,
        optional: true,
    )]
    public ?string $RecordingStatusCallbackMethod;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Api(optional: true)]
    public ?int $RecordingTimeout;

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @var value-of<RecordingTrack>|null $RecordingTrack
     */
    #[Api(
        enum: RecordingTrack::class,
        optional: true,
    )]
    public ?string $RecordingTrack;

    /**
     * The password to use for SIP authentication.
     */
    #[Api(optional: true)]
    public ?string $SipAuthPassword;

    /**
     * The username to use for SIP authentication.
     */
    #[Api(optional: true)]
    public ?string $SipAuthUsername;

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    #[Api(optional: true)]
    public ?string $StatusCallback;

    /**
     * The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space.
     *
     * @var value-of<StatusCallbackEvent>|null $StatusCallbackEvent
     */
    #[Api(
        enum: StatusCallbackEvent::class,
        optional: true,
    )]
    public ?string $StatusCallbackEvent;

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @var value-of<StatusCallbackMethod>|null $StatusCallbackMethod
     */
    #[Api(
        enum: StatusCallbackMethod::class,
        optional: true,
    )]
    public ?string $StatusCallbackMethod;

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @var value-of<Trim>|null $Trim
     */
    #[Api(
        enum: Trim::class,
        optional: true
    )]
    public ?string $Trim;

    /**
     * The URL from which Telnyx will retrieve the TeXML call instructions.
     */
    #[Api(optional: true)]
    public ?string $Url;

    /**
     * HTTP request type used for `Url`. The default value is inherited from TeXML Application setting.
     *
     * @var value-of<URLMethod>|null $UrlMethod
     */
    #[Api(enum: URLMethod::class, optional: true)]
    public ?string $UrlMethod;

    /**
     * `new CallInitiateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallInitiateParams::with(From: ..., To: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallInitiateParams)->withFrom(...)->withTo(...)
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
     * @param AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod> $AsyncAmdStatusCallbackMethod
     * @param DetectionMode|value-of<DetectionMode> $DetectionMode
     * @param MachineDetection|value-of<MachineDetection> $MachineDetection
     * @param RecordingChannels|value-of<RecordingChannels> $RecordingChannels
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $RecordingStatusCallbackMethod
     * @param RecordingTrack|value-of<RecordingTrack> $RecordingTrack
     * @param StatusCallbackEvent|value-of<StatusCallbackEvent> $StatusCallbackEvent
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $StatusCallbackMethod
     * @param Trim|value-of<Trim> $Trim
     * @param URLMethod|value-of<URLMethod> $UrlMethod
     */
    public static function with(
        string $From,
        string $To,
        ?bool $AsyncAmd = null,
        ?string $AsyncAmdStatusCallback = null,
        AsyncAmdStatusCallbackMethod|string|null $AsyncAmdStatusCallbackMethod = null,
        ?string $CallerId = null,
        ?bool $CancelPlaybackOnDetectMessageEnd = null,
        ?bool $CancelPlaybackOnMachineDetection = null,
        DetectionMode|string|null $DetectionMode = null,
        ?string $FallbackUrl = null,
        MachineDetection|string|null $MachineDetection = null,
        ?int $MachineDetectionSilenceTimeout = null,
        ?int $MachineDetectionSpeechEndThreshold = null,
        ?int $MachineDetectionSpeechThreshold = null,
        ?int $MachineDetectionTimeout = null,
        ?string $PreferredCodecs = null,
        ?bool $Record = null,
        RecordingChannels|string|null $RecordingChannels = null,
        ?string $RecordingStatusCallback = null,
        ?string $RecordingStatusCallbackEvent = null,
        RecordingStatusCallbackMethod|string|null $RecordingStatusCallbackMethod = null,
        ?int $RecordingTimeout = null,
        RecordingTrack|string|null $RecordingTrack = null,
        ?string $SipAuthPassword = null,
        ?string $SipAuthUsername = null,
        ?string $StatusCallback = null,
        StatusCallbackEvent|string|null $StatusCallbackEvent = null,
        StatusCallbackMethod|string|null $StatusCallbackMethod = null,
        Trim|string|null $Trim = null,
        ?string $Url = null,
        URLMethod|string|null $UrlMethod = null,
    ): self {
        $obj = new self;

        $obj->From = $From;
        $obj->To = $To;

        null !== $AsyncAmd && $obj->AsyncAmd = $AsyncAmd;
        null !== $AsyncAmdStatusCallback && $obj->AsyncAmdStatusCallback = $AsyncAmdStatusCallback;
        null !== $AsyncAmdStatusCallbackMethod && $obj['AsyncAmdStatusCallbackMethod'] = $AsyncAmdStatusCallbackMethod;
        null !== $CallerId && $obj->CallerId = $CallerId;
        null !== $CancelPlaybackOnDetectMessageEnd && $obj->CancelPlaybackOnDetectMessageEnd = $CancelPlaybackOnDetectMessageEnd;
        null !== $CancelPlaybackOnMachineDetection && $obj->CancelPlaybackOnMachineDetection = $CancelPlaybackOnMachineDetection;
        null !== $DetectionMode && $obj['DetectionMode'] = $DetectionMode;
        null !== $FallbackUrl && $obj->FallbackUrl = $FallbackUrl;
        null !== $MachineDetection && $obj['MachineDetection'] = $MachineDetection;
        null !== $MachineDetectionSilenceTimeout && $obj->MachineDetectionSilenceTimeout = $MachineDetectionSilenceTimeout;
        null !== $MachineDetectionSpeechEndThreshold && $obj->MachineDetectionSpeechEndThreshold = $MachineDetectionSpeechEndThreshold;
        null !== $MachineDetectionSpeechThreshold && $obj->MachineDetectionSpeechThreshold = $MachineDetectionSpeechThreshold;
        null !== $MachineDetectionTimeout && $obj->MachineDetectionTimeout = $MachineDetectionTimeout;
        null !== $PreferredCodecs && $obj->PreferredCodecs = $PreferredCodecs;
        null !== $Record && $obj->Record = $Record;
        null !== $RecordingChannels && $obj['RecordingChannels'] = $RecordingChannels;
        null !== $RecordingStatusCallback && $obj->RecordingStatusCallback = $RecordingStatusCallback;
        null !== $RecordingStatusCallbackEvent && $obj->RecordingStatusCallbackEvent = $RecordingStatusCallbackEvent;
        null !== $RecordingStatusCallbackMethod && $obj['RecordingStatusCallbackMethod'] = $RecordingStatusCallbackMethod;
        null !== $RecordingTimeout && $obj->RecordingTimeout = $RecordingTimeout;
        null !== $RecordingTrack && $obj['RecordingTrack'] = $RecordingTrack;
        null !== $SipAuthPassword && $obj->SipAuthPassword = $SipAuthPassword;
        null !== $SipAuthUsername && $obj->SipAuthUsername = $SipAuthUsername;
        null !== $StatusCallback && $obj->StatusCallback = $StatusCallback;
        null !== $StatusCallbackEvent && $obj['StatusCallbackEvent'] = $StatusCallbackEvent;
        null !== $StatusCallbackMethod && $obj['StatusCallbackMethod'] = $StatusCallbackMethod;
        null !== $Trim && $obj['Trim'] = $Trim;
        null !== $Url && $obj->Url = $Url;
        null !== $UrlMethod && $obj['UrlMethod'] = $UrlMethod;

        return $obj;
    }

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->From = $from;

        return $obj;
    }

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->To = $to;

        return $obj;
    }

    /**
     * Select whether to perform answering machine detection in the background. By default execution is blocked until Answering Machine Detection is completed.
     */
    public function withAsyncAmd(bool $asyncAmd): self
    {
        $obj = clone $this;
        $obj->AsyncAmd = $asyncAmd;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send AMD callback events to for the call.
     */
    public function withAsyncAmdStatusCallback(
        string $asyncAmdStatusCallback
    ): self {
        $obj = clone $this;
        $obj->AsyncAmdStatusCallback = $asyncAmdStatusCallback;

        return $obj;
    }

    /**
     * HTTP request type used for `AsyncAmdStatusCallback`. The default value is inherited from TeXML Application setting.
     *
     * @param AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod> $asyncAmdStatusCallbackMethod
     */
    public function withAsyncAmdStatusCallbackMethod(
        AsyncAmdStatusCallbackMethod|string $asyncAmdStatusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['AsyncAmdStatusCallbackMethod'] = $asyncAmdStatusCallbackMethod;

        return $obj;
    }

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    public function withCallerID(string $callerID): self
    {
        $obj = clone $this;
        $obj->CallerId = $callerID;

        return $obj;
    }

    /**
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnDetectMessageEnd(
        bool $cancelPlaybackOnDetectMessageEnd
    ): self {
        $obj = clone $this;
        $obj->CancelPlaybackOnDetectMessageEnd = $cancelPlaybackOnDetectMessageEnd;

        return $obj;
    }

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnMachineDetection(
        bool $cancelPlaybackOnMachineDetection
    ): self {
        $obj = clone $this;
        $obj->CancelPlaybackOnMachineDetection = $cancelPlaybackOnMachineDetection;

        return $obj;
    }

    /**
     * Allows you to chose between Premium and Standard detections.
     *
     * @param DetectionMode|value-of<DetectionMode> $detectionMode
     */
    public function withDetectionMode(
        DetectionMode|string $detectionMode
    ): self {
        $obj = clone $this;
        $obj['DetectionMode'] = $detectionMode;

        return $obj;
    }

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the `Url` is not responding.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $obj = clone $this;
        $obj->FallbackUrl = $fallbackURL;

        return $obj;
    }

    /**
     * Enables Answering Machine Detection.
     *
     * @param MachineDetection|value-of<MachineDetection> $machineDetection
     */
    public function withMachineDetection(
        MachineDetection|string $machineDetection,
    ): self {
        $obj = clone $this;
        $obj['MachineDetection'] = $machineDetection;

        return $obj;
    }

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSilenceTimeout(
        int $machineDetectionSilenceTimeout
    ): self {
        $obj = clone $this;
        $obj->MachineDetectionSilenceTimeout = $machineDetectionSilenceTimeout;

        return $obj;
    }

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechEndThreshold(
        int $machineDetectionSpeechEndThreshold
    ): self {
        $obj = clone $this;
        $obj->MachineDetectionSpeechEndThreshold = $machineDetectionSpeechEndThreshold;

        return $obj;
    }

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechThreshold(
        int $machineDetectionSpeechThreshold
    ): self {
        $obj = clone $this;
        $obj->MachineDetectionSpeechThreshold = $machineDetectionSpeechThreshold;

        return $obj;
    }

    /**
     * Maximum timeout threshold in milliseconds for overall detection.
     */
    public function withMachineDetectionTimeout(
        int $machineDetectionTimeout
    ): self {
        $obj = clone $this;
        $obj->MachineDetectionTimeout = $machineDetectionTimeout;

        return $obj;
    }

    /**
     * The list of comma-separated codecs to be offered on a call.
     */
    public function withPreferredCodecs(string $preferredCodecs): self
    {
        $obj = clone $this;
        $obj->PreferredCodecs = $preferredCodecs;

        return $obj;
    }

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    public function withRecord(bool $record): self
    {
        $obj = clone $this;
        $obj->Record = $record;

        return $obj;
    }

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     */
    public function withRecordingChannels(
        RecordingChannels|string $recordingChannels,
    ): self {
        $obj = clone $this;
        $obj['RecordingChannels'] = $recordingChannels;

        return $obj;
    }

    /**
     * The URL the recording callbacks will be sent to.
     */
    public function withRecordingStatusCallback(
        string $recordingStatusCallback
    ): self {
        $obj = clone $this;
        $obj->RecordingStatusCallback = $recordingStatusCallback;

        return $obj;
    }

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    public function withRecordingStatusCallbackEvent(
        string $recordingStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj->RecordingStatusCallbackEvent = $recordingStatusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     */
    public function withRecordingStatusCallbackMethod(
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['RecordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordingTimeout(int $recordingTimeout): self
    {
        $obj = clone $this;
        $obj->RecordingTimeout = $recordingTimeout;

        return $obj;
    }

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack
    ): self {
        $obj = clone $this;
        $obj['RecordingTrack'] = $recordingTrack;

        return $obj;
    }

    /**
     * The password to use for SIP authentication.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj->SipAuthPassword = $sipAuthPassword;

        return $obj;
    }

    /**
     * The username to use for SIP authentication.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj->SipAuthUsername = $sipAuthUsername;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj->StatusCallback = $statusCallback;

        return $obj;
    }

    /**
     * The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space.
     *
     * @param StatusCallbackEvent|value-of<StatusCallbackEvent> $statusCallbackEvent
     */
    public function withStatusCallbackEvent(
        StatusCallbackEvent|string $statusCallbackEvent,
    ): self {
        $obj = clone $this;
        $obj['StatusCallbackEvent'] = $statusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['StatusCallbackMethod'] = $statusCallbackMethod;

        return $obj;
    }

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @param Trim|value-of<Trim> $trim
     */
    public function withTrim(
        Trim|string $trim
    ): self {
        $obj = clone $this;
        $obj['Trim'] = $trim;

        return $obj;
    }

    /**
     * The URL from which Telnyx will retrieve the TeXML call instructions.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->Url = $url;

        return $obj;
    }

    /**
     * HTTP request type used for `Url`. The default value is inherited from TeXML Application setting.
     *
     * @param URLMethod|value-of<URLMethod> $urlMethod
     */
    public function withURLMethod(URLMethod|string $urlMethod): self
    {
        $obj = clone $this;
        $obj['UrlMethod'] = $urlMethod;

        return $obj;
    }
}
