<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetection;
use Telnyx\Calls\Actions\ActionTransferParams\AnsweringMachineDetectionConfig;
use Telnyx\Calls\Actions\ActionTransferParams\MediaEncryption;
use Telnyx\Calls\Actions\ActionTransferParams\MuteDtmf;
use Telnyx\Calls\Actions\ActionTransferParams\Record;
use Telnyx\Calls\Actions\ActionTransferParams\RecordChannels;
use Telnyx\Calls\Actions\ActionTransferParams\RecordFormat;
use Telnyx\Calls\Actions\ActionTransferParams\RecordTrack;
use Telnyx\Calls\Actions\ActionTransferParams\RecordTrim;
use Telnyx\Calls\Actions\ActionTransferParams\SipTransportProtocol;
use Telnyx\Calls\Actions\ActionTransferParams\WebhookURLMethod;
use Telnyx\Calls\CustomSipHeader;
use Telnyx\Calls\SipHeader;
use Telnyx\Calls\SoundModifications;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Transfer a call to a new destination. If the transfer is unsuccessful, a `call.hangup` webhook for the other call (Leg B) will be sent indicating that the transfer could not be completed. The original call will remain active and may be issued additional commands, potentially transfering the call to an alternate destination.
 *
 * **Expected Webhooks:**
 *
 * - `call.initiated`
 * - `call.bridged` to Leg B
 * - `call.answered` or `call.hangup`
 * - `call.machine.detection.ended` if `answering_machine_detection` was requested
 * - `call.machine.greeting.ended` if `answering_machine_detection` was requested to detect the end of machine greeting
 * - `call.machine.premium.detection.ended` if `answering_machine_detection=premium` was requested
 * - `call.machine.premium.greeting.ended` if `answering_machine_detection=premium` was requested and a beep was detected
 *
 * @see Telnyx\Calls\Actions->transfer
 *
 * @phpstan-type action_transfer_params = array{
 *   to: string,
 *   answeringMachineDetection?: AnsweringMachineDetection|value-of<AnsweringMachineDetection>,
 *   answeringMachineDetectionConfig?: AnsweringMachineDetectionConfig,
 *   audioURL?: string,
 *   clientState?: string,
 *   commandID?: string,
 *   customHeaders?: list<CustomSipHeader>,
 *   earlyMedia?: bool,
 *   from?: string,
 *   fromDisplayName?: string,
 *   mediaEncryption?: MediaEncryption|value-of<MediaEncryption>,
 *   mediaName?: string,
 *   muteDtmf?: MuteDtmf|value-of<MuteDtmf>,
 *   parkAfterUnbridge?: string,
 *   record?: Record|value-of<Record>,
 *   recordChannels?: RecordChannels|value-of<RecordChannels>,
 *   recordCustomFileName?: string,
 *   recordFormat?: RecordFormat|value-of<RecordFormat>,
 *   recordMaxLength?: int,
 *   recordTimeoutSecs?: int,
 *   recordTrack?: RecordTrack|value-of<RecordTrack>,
 *   recordTrim?: RecordTrim|value-of<RecordTrim>,
 *   sipAuthPassword?: string,
 *   sipAuthUsername?: string,
 *   sipHeaders?: list<SipHeader>,
 *   sipTransportProtocol?: SipTransportProtocol|value-of<SipTransportProtocol>,
 *   soundModifications?: SoundModifications,
 *   targetLegClientState?: string,
 *   timeLimitSecs?: int,
 *   timeoutSecs?: int,
 *   webhookURL?: string,
 *   webhookURLMethod?: WebhookURLMethod|value-of<WebhookURLMethod>,
 * }
 */
final class ActionTransferParams implements BaseModel
{
    /** @use SdkModel<action_transfer_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The DID or SIP URI to dial out to.
     */
    #[Api]
    public string $to;

    /**
     * Enables Answering Machine Detection. When a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If 'greeting_end' or 'detect_words' is used and a 'machine' is detected, you will receive another 'call.machine.greeting.ended' webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive 'call.machine.greeting.ended' if a beep is detected.
     *
     * @var value-of<AnsweringMachineDetection>|null $answeringMachineDetection
     */
    #[Api(
        'answering_machine_detection',
        enum: AnsweringMachineDetection::class,
        optional: true,
    )]
    public ?string $answeringMachineDetection;

    /**
     * Optional configuration parameters to modify 'answering_machine_detection' performance.
     */
    #[Api('answering_machine_detection_config', optional: true)]
    public ?AnsweringMachineDetectionConfig $answeringMachineDetectionConfig;

    /**
     * The URL of a file to be played back when the transfer destination answers before bridging the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    #[Api('audio_url', optional: true)]
    public ?string $audioURL;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @var list<CustomSipHeader>|null $customHeaders
     */
    #[Api('custom_headers', list: CustomSipHeader::class, optional: true)]
    public ?array $customHeaders;

    /**
     * If set to false, early media will not be passed to the originating leg.
     */
    #[Api('early_media', optional: true)]
    public ?bool $earlyMedia;

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format. This attribute will default to the `to` number of the original call if omitted.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    #[Api('from_display_name', optional: true)]
    public ?string $fromDisplayName;

    /**
     * Defines whether media should be encrypted on the new call leg.
     *
     * @var value-of<MediaEncryption>|null $mediaEncryption
     */
    #[Api('media_encryption', enum: MediaEncryption::class, optional: true)]
    public ?string $mediaEncryption;

    /**
     * The media_name of a file to be played back when the transfer destination answers before bridging the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    /**
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @var value-of<MuteDtmf>|null $muteDtmf
     */
    #[Api('mute_dtmf', enum: MuteDtmf::class, optional: true)]
    public ?string $muteDtmf;

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    #[Api('park_after_unbridge', optional: true)]
    public ?string $parkAfterUnbridge;

    /**
     * Start recording automatically after an event. Disabled by default.
     *
     * @var value-of<Record>|null $record
     */
    #[Api(enum: Record::class, optional: true)]
    public ?string $record;

    /**
     * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
     *
     * @var value-of<RecordChannels>|null $recordChannels
     */
    #[Api('record_channels', enum: RecordChannels::class, optional: true)]
    public ?string $recordChannels;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Api('record_custom_file_name', optional: true)]
    public ?string $recordCustomFileName;

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @var value-of<RecordFormat>|null $recordFormat
     */
    #[Api('record_format', enum: RecordFormat::class, optional: true)]
    public ?string $recordFormat;

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    #[Api('record_max_length', optional: true)]
    public ?int $recordMaxLength;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Api('record_timeout_secs', optional: true)]
    public ?int $recordTimeoutSecs;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordTrack>|null $recordTrack
     */
    #[Api('record_track', enum: RecordTrack::class, optional: true)]
    public ?string $recordTrack;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<RecordTrim>|null $recordTrim
     */
    #[Api('record_trim', enum: RecordTrim::class, optional: true)]
    public ?string $recordTrim;

    /**
     * SIP Authentication password used for SIP challenges.
     */
    #[Api('sip_auth_password', optional: true)]
    public ?string $sipAuthPassword;

    /**
     * SIP Authentication username used for SIP challenges.
     */
    #[Api('sip_auth_username', optional: true)]
    public ?string $sipAuthUsername;

    /**
     * SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
     *
     * @var list<SipHeader>|null $sipHeaders
     */
    #[Api('sip_headers', list: SipHeader::class, optional: true)]
    public ?array $sipHeaders;

    /**
     * Defines SIP transport protocol to be used on the call.
     *
     * @var value-of<SipTransportProtocol>|null $sipTransportProtocol
     */
    #[Api(
        'sip_transport_protocol',
        enum: SipTransportProtocol::class,
        optional: true
    )]
    public ?string $sipTransportProtocol;

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     */
    #[Api('sound_modifications', optional: true)]
    public ?SoundModifications $soundModifications;

    /**
     * Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     */
    #[Api('target_leg_client_state', optional: true)]
    public ?string $targetLegClientState;

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    #[Api('time_limit_secs', optional: true)]
    public ?int $timeLimitSecs;

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    #[Api('timeout_secs', optional: true)]
    public ?int $timeoutSecs;

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    #[Api('webhook_url', optional: true)]
    public ?string $webhookURL;

    /**
     * HTTP request type used for `webhook_url`.
     *
     * @var value-of<WebhookURLMethod>|null $webhookURLMethod
     */
    #[Api('webhook_url_method', enum: WebhookURLMethod::class, optional: true)]
    public ?string $webhookURLMethod;

    /**
     * `new ActionTransferParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionTransferParams::with(to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionTransferParams)->withTo(...)
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
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection
     * @param list<CustomSipHeader> $customHeaders
     * @param MediaEncryption|value-of<MediaEncryption> $mediaEncryption
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     * @param list<SipHeader> $sipHeaders
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod
     */
    public static function with(
        string $to,
        AnsweringMachineDetection|string|null $answeringMachineDetection = null,
        ?AnsweringMachineDetectionConfig $answeringMachineDetectionConfig = null,
        ?string $audioURL = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $customHeaders = null,
        ?bool $earlyMedia = null,
        ?string $from = null,
        ?string $fromDisplayName = null,
        MediaEncryption|string|null $mediaEncryption = null,
        ?string $mediaName = null,
        MuteDtmf|string|null $muteDtmf = null,
        ?string $parkAfterUnbridge = null,
        Record|string|null $record = null,
        RecordChannels|string|null $recordChannels = null,
        ?string $recordCustomFileName = null,
        RecordFormat|string|null $recordFormat = null,
        ?int $recordMaxLength = null,
        ?int $recordTimeoutSecs = null,
        RecordTrack|string|null $recordTrack = null,
        RecordTrim|string|null $recordTrim = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        ?array $sipHeaders = null,
        SipTransportProtocol|string|null $sipTransportProtocol = null,
        ?SoundModifications $soundModifications = null,
        ?string $targetLegClientState = null,
        ?int $timeLimitSecs = null,
        ?int $timeoutSecs = null,
        ?string $webhookURL = null,
        WebhookURLMethod|string|null $webhookURLMethod = null,
    ): self {
        $obj = new self;

        $obj->to = $to;

        null !== $answeringMachineDetection && $obj['answeringMachineDetection'] = $answeringMachineDetection;
        null !== $answeringMachineDetectionConfig && $obj->answeringMachineDetectionConfig = $answeringMachineDetectionConfig;
        null !== $audioURL && $obj->audioURL = $audioURL;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $customHeaders && $obj->customHeaders = $customHeaders;
        null !== $earlyMedia && $obj->earlyMedia = $earlyMedia;
        null !== $from && $obj->from = $from;
        null !== $fromDisplayName && $obj->fromDisplayName = $fromDisplayName;
        null !== $mediaEncryption && $obj['mediaEncryption'] = $mediaEncryption;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $muteDtmf && $obj['muteDtmf'] = $muteDtmf;
        null !== $parkAfterUnbridge && $obj->parkAfterUnbridge = $parkAfterUnbridge;
        null !== $record && $obj['record'] = $record;
        null !== $recordChannels && $obj['recordChannels'] = $recordChannels;
        null !== $recordCustomFileName && $obj->recordCustomFileName = $recordCustomFileName;
        null !== $recordFormat && $obj['recordFormat'] = $recordFormat;
        null !== $recordMaxLength && $obj->recordMaxLength = $recordMaxLength;
        null !== $recordTimeoutSecs && $obj->recordTimeoutSecs = $recordTimeoutSecs;
        null !== $recordTrack && $obj['recordTrack'] = $recordTrack;
        null !== $recordTrim && $obj['recordTrim'] = $recordTrim;
        null !== $sipAuthPassword && $obj->sipAuthPassword = $sipAuthPassword;
        null !== $sipAuthUsername && $obj->sipAuthUsername = $sipAuthUsername;
        null !== $sipHeaders && $obj->sipHeaders = $sipHeaders;
        null !== $sipTransportProtocol && $obj['sipTransportProtocol'] = $sipTransportProtocol;
        null !== $soundModifications && $obj->soundModifications = $soundModifications;
        null !== $targetLegClientState && $obj->targetLegClientState = $targetLegClientState;
        null !== $timeLimitSecs && $obj->timeLimitSecs = $timeLimitSecs;
        null !== $timeoutSecs && $obj->timeoutSecs = $timeoutSecs;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;
        null !== $webhookURLMethod && $obj['webhookURLMethod'] = $webhookURLMethod;

        return $obj;
    }

    /**
     * The DID or SIP URI to dial out to.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Enables Answering Machine Detection. When a call is answered, Telnyx runs real-time detection to determine if it was picked up by a human or a machine and sends an `call.machine.detection.ended` webhook with the analysis result. If 'greeting_end' or 'detect_words' is used and a 'machine' is detected, you will receive another 'call.machine.greeting.ended' webhook when the answering machine greeting ends with a beep or silence. If `detect_beep` is used, you will only receive 'call.machine.greeting.ended' if a beep is detected.
     *
     * @param AnsweringMachineDetection|value-of<AnsweringMachineDetection> $answeringMachineDetection
     */
    public function withAnsweringMachineDetection(
        AnsweringMachineDetection|string $answeringMachineDetection
    ): self {
        $obj = clone $this;
        $obj['answeringMachineDetection'] = $answeringMachineDetection;

        return $obj;
    }

    /**
     * Optional configuration parameters to modify 'answering_machine_detection' performance.
     */
    public function withAnsweringMachineDetectionConfig(
        AnsweringMachineDetectionConfig $answeringMachineDetectionConfig
    ): self {
        $obj = clone $this;
        $obj->answeringMachineDetectionConfig = $answeringMachineDetectionConfig;

        return $obj;
    }

    /**
     * The URL of a file to be played back when the transfer destination answers before bridging the call. The URL can point to either a WAV or MP3 file. media_name and audio_url cannot be used together in one request.
     */
    public function withAudioURL(string $audioURL): self
    {
        $obj = clone $this;
        $obj->audioURL = $audioURL;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * Custom headers to be added to the SIP INVITE.
     *
     * @param list<CustomSipHeader> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj->customHeaders = $customHeaders;

        return $obj;
    }

    /**
     * If set to false, early media will not be passed to the originating leg.
     */
    public function withEarlyMedia(bool $earlyMedia): self
    {
        $obj = clone $this;
        $obj->earlyMedia = $earlyMedia;

        return $obj;
    }

    /**
     * The `from` number to be used as the caller id presented to the destination (`to` number). The number should be in +E164 format. This attribute will default to the `to` number of the original call if omitted.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The `from_display_name` string to be used as the caller id name (SIP From Display Name) presented to the destination (`to` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and -_~!.+ special characters. If ommited, the display name will be the same as the number in the `from` field.
     */
    public function withFromDisplayName(string $fromDisplayName): self
    {
        $obj = clone $this;
        $obj->fromDisplayName = $fromDisplayName;

        return $obj;
    }

    /**
     * Defines whether media should be encrypted on the new call leg.
     *
     * @param MediaEncryption|value-of<MediaEncryption> $mediaEncryption
     */
    public function withMediaEncryption(
        MediaEncryption|string $mediaEncryption
    ): self {
        $obj = clone $this;
        $obj['mediaEncryption'] = $mediaEncryption;

        return $obj;
    }

    /**
     * The media_name of a file to be played back when the transfer destination answers before bridging the call. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }

    /**
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf
     */
    public function withMuteDtmf(MuteDtmf|string $muteDtmf): self
    {
        $obj = clone $this;
        $obj['muteDtmf'] = $muteDtmf;

        return $obj;
    }

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    public function withParkAfterUnbridge(string $parkAfterUnbridge): self
    {
        $obj = clone $this;
        $obj->parkAfterUnbridge = $parkAfterUnbridge;

        return $obj;
    }

    /**
     * Start recording automatically after an event. Disabled by default.
     *
     * @param Record|value-of<Record> $record
     */
    public function withRecord(Record|string $record): self
    {
        $obj = clone $this;
        $obj['record'] = $record;

        return $obj;
    }

    /**
     * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
     *
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     */
    public function withRecordChannels(
        RecordChannels|string $recordChannels
    ): self {
        $obj = clone $this;
        $obj['recordChannels'] = $recordChannels;

        return $obj;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withRecordCustomFileName(string $recordCustomFileName): self
    {
        $obj = clone $this;
        $obj->recordCustomFileName = $recordCustomFileName;

        return $obj;
    }

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     */
    public function withRecordFormat(RecordFormat|string $recordFormat): self
    {
        $obj = clone $this;
        $obj['recordFormat'] = $recordFormat;

        return $obj;
    }

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    public function withRecordMaxLength(int $recordMaxLength): self
    {
        $obj = clone $this;
        $obj->recordMaxLength = $recordMaxLength;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordTimeoutSecs(int $recordTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->recordTimeoutSecs = $recordTimeoutSecs;

        return $obj;
    }

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     */
    public function withRecordTrack(RecordTrack|string $recordTrack): self
    {
        $obj = clone $this;
        $obj['recordTrack'] = $recordTrack;

        return $obj;
    }

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     */
    public function withRecordTrim(RecordTrim|string $recordTrim): self
    {
        $obj = clone $this;
        $obj['recordTrim'] = $recordTrim;

        return $obj;
    }

    /**
     * SIP Authentication password used for SIP challenges.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $obj = clone $this;
        $obj->sipAuthPassword = $sipAuthPassword;

        return $obj;
    }

    /**
     * SIP Authentication username used for SIP challenges.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $obj = clone $this;
        $obj->sipAuthUsername = $sipAuthUsername;

        return $obj;
    }

    /**
     * SIP headers to be added to the SIP INVITE. Currently only User-to-User header is supported.
     *
     * @param list<SipHeader> $sipHeaders
     */
    public function withSipHeaders(array $sipHeaders): self
    {
        $obj = clone $this;
        $obj->sipHeaders = $sipHeaders;

        return $obj;
    }

    /**
     * Defines SIP transport protocol to be used on the call.
     *
     * @param SipTransportProtocol|value-of<SipTransportProtocol> $sipTransportProtocol
     */
    public function withSipTransportProtocol(
        SipTransportProtocol|string $sipTransportProtocol
    ): self {
        $obj = clone $this;
        $obj['sipTransportProtocol'] = $sipTransportProtocol;

        return $obj;
    }

    /**
     * Use this field to modify sound effects, for example adjust the pitch.
     */
    public function withSoundModifications(
        SoundModifications $soundModifications
    ): self {
        $obj = clone $this;
        $obj->soundModifications = $soundModifications;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook for the new leg. It must be a valid Base-64 encoded string.
     */
    public function withTargetLegClientState(string $targetLegClientState): self
    {
        $obj = clone $this;
        $obj->targetLegClientState = $targetLegClientState;

        return $obj;
    }

    /**
     * Sets the maximum duration of a Call Control Leg in seconds. If the time limit is reached, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `time_limit` will be sent. For example, by setting a time limit of 120 seconds, a Call Leg will be automatically terminated two minutes after being answered. The default time limit is 14400 seconds or 4 hours and this is also the maximum allowed call length.
     */
    public function withTimeLimitSecs(int $timeLimitSecs): self
    {
        $obj = clone $this;
        $obj->timeLimitSecs = $timeLimitSecs;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the call to be answered by the destination to which it is being transferred. If the timeout is reached before an answer is received, the call will hangup and a `call.hangup` webhook with a `hangup_cause` of `timeout` will be sent. Minimum value is 5 seconds. Maximum value is 600 seconds.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj->timeoutSecs = $timeoutSecs;

        return $obj;
    }

    /**
     * Use this field to override the URL for which Telnyx will send subsequent webhooks to for this call.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * HTTP request type used for `webhook_url`.
     *
     * @param WebhookURLMethod|value-of<WebhookURLMethod> $webhookURLMethod
     */
    public function withWebhookURLMethod(
        WebhookURLMethod|string $webhookURLMethod
    ): self {
        $obj = clone $this;
        $obj['webhookURLMethod'] = $webhookURLMethod;

        return $obj;
    }
}
