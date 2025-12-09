<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 * @see Telnyx\Services\Texml\CallsService::initiate()
 *
 * @phpstan-type CallInitiateParamsShape = array{
 *   from: string,
 *   to: string,
 *   asyncAmd?: bool,
 *   asyncAmdStatusCallback?: string,
 *   asyncAmdStatusCallbackMethod?: AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod>,
 *   callerID?: string,
 *   cancelPlaybackOnDetectMessageEnd?: bool,
 *   cancelPlaybackOnMachineDetection?: bool,
 *   detectionMode?: DetectionMode|value-of<DetectionMode>,
 *   fallbackURL?: string,
 *   machineDetection?: MachineDetection|value-of<MachineDetection>,
 *   machineDetectionSilenceTimeout?: int,
 *   machineDetectionSpeechEndThreshold?: int,
 *   machineDetectionSpeechThreshold?: int,
 *   machineDetectionTimeout?: int,
 *   preferredCodecs?: string,
 *   record?: bool,
 *   recordingChannels?: RecordingChannels|value-of<RecordingChannels>,
 *   recordingStatusCallback?: string,
 *   recordingStatusCallbackEvent?: string,
 *   recordingStatusCallbackMethod?: RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
 *   recordingTimeout?: int,
 *   recordingTrack?: RecordingTrack|value-of<RecordingTrack>,
 *   sipAuthPassword?: string,
 *   sipAuthUsername?: string,
 *   statusCallback?: string,
 *   statusCallbackEvent?: StatusCallbackEvent|value-of<StatusCallbackEvent>,
 *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
 *   trim?: Trim|value-of<Trim>,
 *   url?: string,
 *   urlMethod?: URLMethod|value-of<URLMethod>,
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
     * `new CallInitiateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallInitiateParams::with(from: ..., to: ...)
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
     * @param AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod> $asyncAmdStatusCallbackMethod
     * @param DetectionMode|value-of<DetectionMode> $detectionMode
     * @param MachineDetection|value-of<MachineDetection> $machineDetection
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     * @param StatusCallbackEvent|value-of<StatusCallbackEvent> $statusCallbackEvent
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     * @param Trim|value-of<Trim> $trim
     * @param URLMethod|value-of<URLMethod> $urlMethod
     */
    public static function with(
        string $from,
        string $to,
        ?bool $asyncAmd = null,
        ?string $asyncAmdStatusCallback = null,
        AsyncAmdStatusCallbackMethod|string|null $asyncAmdStatusCallbackMethod = null,
        ?string $callerID = null,
        ?bool $cancelPlaybackOnDetectMessageEnd = null,
        ?bool $cancelPlaybackOnMachineDetection = null,
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
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?string $statusCallback = null,
        StatusCallbackEvent|string|null $statusCallbackEvent = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        Trim|string|null $trim = null,
        ?string $url = null,
        URLMethod|string|null $urlMethod = null,
    ): self {
        $obj = new self;

        $obj['from'] = $from;
        $obj['to'] = $to;

        null !== $asyncAmd && $obj['asyncAmd'] = $asyncAmd;
        null !== $asyncAmdStatusCallback && $obj['asyncAmdStatusCallback'] = $asyncAmdStatusCallback;
        null !== $asyncAmdStatusCallbackMethod && $obj['asyncAmdStatusCallbackMethod'] = $asyncAmdStatusCallbackMethod;
        null !== $callerID && $obj['callerID'] = $callerID;
        null !== $cancelPlaybackOnDetectMessageEnd && $obj['cancelPlaybackOnDetectMessageEnd'] = $cancelPlaybackOnDetectMessageEnd;
        null !== $cancelPlaybackOnMachineDetection && $obj['cancelPlaybackOnMachineDetection'] = $cancelPlaybackOnMachineDetection;
        null !== $detectionMode && $obj['detectionMode'] = $detectionMode;
        null !== $fallbackURL && $obj['fallbackURL'] = $fallbackURL;
        null !== $machineDetection && $obj['machineDetection'] = $machineDetection;
        null !== $machineDetectionSilenceTimeout && $obj['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;
        null !== $machineDetectionSpeechEndThreshold && $obj['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;
        null !== $machineDetectionSpeechThreshold && $obj['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;
        null !== $machineDetectionTimeout && $obj['machineDetectionTimeout'] = $machineDetectionTimeout;
        null !== $preferredCodecs && $obj['preferredCodecs'] = $preferredCodecs;
        null !== $record && $obj['record'] = $record;
        null !== $recordingChannels && $obj['recordingChannels'] = $recordingChannels;
        null !== $recordingStatusCallback && $obj['recordingStatusCallback'] = $recordingStatusCallback;
        null !== $recordingStatusCallbackEvent && $obj['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;
        null !== $recordingStatusCallbackMethod && $obj['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;
        null !== $recordingTimeout && $obj['recordingTimeout'] = $recordingTimeout;
        null !== $recordingTrack && $obj['recordingTrack'] = $recordingTrack;
        null !== $sipAuthPassword && $obj['sipAuthPassword'] = $sipAuthPassword;
        null !== $sipAuthUsername && $obj['sipAuthUsername'] = $sipAuthUsername;
        null !== $statusCallback && $obj['statusCallback'] = $statusCallback;
        null !== $statusCallbackEvent && $obj['statusCallbackEvent'] = $statusCallbackEvent;
        null !== $statusCallbackMethod && $obj['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $trim && $obj['trim'] = $trim;
        null !== $url && $obj['url'] = $url;
        null !== $urlMethod && $obj['urlMethod'] = $urlMethod;

        return $obj;
    }

    /**
     * The phone number of the party that initiated the call. Phone numbers are formatted with a `+` and country code.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * Select whether to perform answering machine detection in the background. By default execution is blocked until Answering Machine Detection is completed.
     */
    public function withAsyncAmd(bool $asyncAmd): self
    {
        $obj = clone $this;
        $obj['asyncAmd'] = $asyncAmd;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send AMD callback events to for the call.
     */
    public function withAsyncAmdStatusCallback(
        string $asyncAmdStatusCallback
    ): self {
        $obj = clone $this;
        $obj['asyncAmdStatusCallback'] = $asyncAmdStatusCallback;

        return $obj;
    }

    /**
     * HTTP request type used for `AsyncAmdStatusCallback`. The default value is inherited from TeXML Application setting.
     *
     * @param AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod> $asyncAmdStatusCallbackMethod
     */
    public function withAsyncAmdStatusCallbackMethod(
        AsyncAmdStatusCallbackMethod|string $asyncAmdStatusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['asyncAmdStatusCallbackMethod'] = $asyncAmdStatusCallbackMethod;

        return $obj;
    }

    /**
     * To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If ommited, the display name will be the same as the number in the `From` field.
     */
    public function withCallerID(string $callerID): self
    {
        $obj = clone $this;
        $obj['callerID'] = $callerID;

        return $obj;
    }

    /**
     * Whether to cancel ongoing playback on `greeting ended` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnDetectMessageEnd(
        bool $cancelPlaybackOnDetectMessageEnd
    ): self {
        $obj = clone $this;
        $obj['cancelPlaybackOnDetectMessageEnd'] = $cancelPlaybackOnDetectMessageEnd;

        return $obj;
    }

    /**
     * Whether to cancel ongoing playback on `machine` detection. Defaults to `true`.
     */
    public function withCancelPlaybackOnMachineDetection(
        bool $cancelPlaybackOnMachineDetection
    ): self {
        $obj = clone $this;
        $obj['cancelPlaybackOnMachineDetection'] = $cancelPlaybackOnMachineDetection;

        return $obj;
    }

    /**
     * Allows you to chose between Premium and Standard detections.
     *
     * @param DetectionMode|value-of<DetectionMode> $detectionMode
     */
    public function withDetectionMode(DetectionMode|string $detectionMode): self
    {
        $obj = clone $this;
        $obj['detectionMode'] = $detectionMode;

        return $obj;
    }

    /**
     * A failover URL for which Telnyx will retrieve the TeXML call instructions if the `Url` is not responding.
     */
    public function withFallbackURL(string $fallbackURL): self
    {
        $obj = clone $this;
        $obj['fallbackURL'] = $fallbackURL;

        return $obj;
    }

    /**
     * Enables Answering Machine Detection.
     *
     * @param MachineDetection|value-of<MachineDetection> $machineDetection
     */
    public function withMachineDetection(
        MachineDetection|string $machineDetection
    ): self {
        $obj = clone $this;
        $obj['machineDetection'] = $machineDetection;

        return $obj;
    }

    /**
     * If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSilenceTimeout(
        int $machineDetectionSilenceTimeout
    ): self {
        $obj = clone $this;
        $obj['machineDetectionSilenceTimeout'] = $machineDetectionSilenceTimeout;

        return $obj;
    }

    /**
     * Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechEndThreshold(
        int $machineDetectionSpeechEndThreshold
    ): self {
        $obj = clone $this;
        $obj['machineDetectionSpeechEndThreshold'] = $machineDetectionSpeechEndThreshold;

        return $obj;
    }

    /**
     * Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     */
    public function withMachineDetectionSpeechThreshold(
        int $machineDetectionSpeechThreshold
    ): self {
        $obj = clone $this;
        $obj['machineDetectionSpeechThreshold'] = $machineDetectionSpeechThreshold;

        return $obj;
    }

    /**
     * Maximum timeout threshold in milliseconds for overall detection.
     */
    public function withMachineDetectionTimeout(
        int $machineDetectionTimeout
    ): self {
        $obj = clone $this;
        $obj['machineDetectionTimeout'] = $machineDetectionTimeout;

        return $obj;
    }

    /**
     * The list of comma-separated codecs to be offered on a call.
     */
    public function withPreferredCodecs(string $preferredCodecs): self
    {
        $obj = clone $this;
        $obj['preferredCodecs'] = $preferredCodecs;

        return $obj;
    }

    /**
     * Whether to record the entire participant's call leg. Defaults to `false`.
     */
    public function withRecord(bool $record): self
    {
        $obj = clone $this;
        $obj['record'] = $record;

        return $obj;
    }

    /**
     * The number of channels in the final recording. Defaults to `mono`.
     *
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels
     */
    public function withRecordingChannels(
        RecordingChannels|string $recordingChannels
    ): self {
        $obj = clone $this;
        $obj['recordingChannels'] = $recordingChannels;

        return $obj;
    }

    /**
     * The URL the recording callbacks will be sent to.
     */
    public function withRecordingStatusCallback(
        string $recordingStatusCallback
    ): self {
        $obj = clone $this;
        $obj['recordingStatusCallback'] = $recordingStatusCallback;

        return $obj;
    }

    /**
     * The changes to the recording's state that should generate a call to `RecoridngStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     */
    public function withRecordingStatusCallbackEvent(
        string $recordingStatusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj['recordingStatusCallbackEvent'] = $recordingStatusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     *
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod
     */
    public function withRecordingStatusCallbackMethod(
        RecordingStatusCallbackMethod|string $recordingStatusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['recordingStatusCallbackMethod'] = $recordingStatusCallbackMethod;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that the transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordingTimeout(int $recordingTimeout): self
    {
        $obj = clone $this;
        $obj['recordingTimeout'] = $recordingTimeout;

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
        $obj['recordingTrack'] = $recordingTrack;

        return $obj;
    }

    /**
     * The password to use for SIP authentication.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj['sipAuthPassword'] = $sipAuthPassword;

        return $obj;
    }

    /**
     * The username to use for SIP authentication.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj['sipAuthUsername'] = $sipAuthUsername;

        return $obj;
    }

    /**
     * URL destination for Telnyx to send status callback events to for the call.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj['statusCallback'] = $statusCallback;

        return $obj;
    }

    /**
     * The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space.
     *
     * @param StatusCallbackEvent|value-of<StatusCallbackEvent> $statusCallbackEvent
     */
    public function withStatusCallbackEvent(
        StatusCallbackEvent|string $statusCallbackEvent
    ): self {
        $obj = clone $this;
        $obj['statusCallbackEvent'] = $statusCallbackEvent;

        return $obj;
    }

    /**
     * HTTP request type used for `StatusCallback`.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['statusCallbackMethod'] = $statusCallbackMethod;

        return $obj;
    }

    /**
     * Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     *
     * @param Trim|value-of<Trim> $trim
     */
    public function withTrim(Trim|string $trim): self
    {
        $obj = clone $this;
        $obj['trim'] = $trim;

        return $obj;
    }

    /**
     * The URL from which Telnyx will retrieve the TeXML call instructions.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

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
        $obj['urlMethod'] = $urlMethod;

        return $obj;
    }
}
