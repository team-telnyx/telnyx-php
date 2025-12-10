<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionBridgeParams\MuteDtmf;
use Telnyx\Calls\Actions\ActionBridgeParams\Record;
use Telnyx\Calls\Actions\ActionBridgeParams\RecordChannels;
use Telnyx\Calls\Actions\ActionBridgeParams\RecordFormat;
use Telnyx\Calls\Actions\ActionBridgeParams\RecordTrack;
use Telnyx\Calls\Actions\ActionBridgeParams\RecordTrim;
use Telnyx\Calls\Actions\ActionBridgeParams\Ringtone;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Bridge two call control calls.
 *
 * **Expected Webhooks:**
 *
 * - `call.bridged` for Leg A
 * - `call.bridged` for Leg B
 *
 * @see Telnyx\Services\Calls\ActionsService::bridge()
 *
 * @phpstan-type ActionBridgeParamsShape = array{
 *   callControlID: string,
 *   clientState?: string,
 *   commandID?: string,
 *   muteDtmf?: MuteDtmf|value-of<MuteDtmf>,
 *   parkAfterUnbridge?: string,
 *   playRingtone?: bool,
 *   queue?: string,
 *   record?: Record|value-of<Record>,
 *   recordChannels?: RecordChannels|value-of<RecordChannels>,
 *   recordCustomFileName?: string,
 *   recordFormat?: RecordFormat|value-of<RecordFormat>,
 *   recordMaxLength?: int,
 *   recordTimeoutSecs?: int,
 *   recordTrack?: RecordTrack|value-of<RecordTrack>,
 *   recordTrim?: RecordTrim|value-of<RecordTrim>,
 *   ringtone?: Ringtone|value-of<Ringtone>,
 *   videoRoomContext?: string,
 *   videoRoomID?: string,
 * }
 */
final class ActionBridgeParams implements BaseModel
{
    /** @use SdkModel<ActionBridgeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The Call Control ID of the call you want to bridge with, can't be used together with queue parameter or video_room_id parameter.
     */
    #[Required('call_control_id')]
    public string $callControlID;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @var value-of<MuteDtmf>|null $muteDtmf
     */
    #[Optional('mute_dtmf', enum: MuteDtmf::class)]
    public ?string $muteDtmf;

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    #[Optional('park_after_unbridge')]
    public ?string $parkAfterUnbridge;

    /**
     * Specifies whether to play a ringtone if the call you want to bridge with has not yet been answered.
     */
    #[Optional('play_ringtone')]
    public ?bool $playRingtone;

    /**
     * The name of the queue you want to bridge with, can't be used together with call_control_id parameter or video_room_id parameter. Bridging with a queue means bridging with the first call in the queue. The call will always be removed from the queue regardless of whether bridging succeeds. Returns an error when the queue is empty.
     */
    #[Optional]
    public ?string $queue;

    /**
     * Start recording automatically after an event. Disabled by default.
     *
     * @var value-of<Record>|null $record
     */
    #[Optional(enum: Record::class)]
    public ?string $record;

    /**
     * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
     *
     * @var value-of<RecordChannels>|null $recordChannels
     */
    #[Optional('record_channels', enum: RecordChannels::class)]
    public ?string $recordChannels;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Optional('record_custom_file_name')]
    public ?string $recordCustomFileName;

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @var value-of<RecordFormat>|null $recordFormat
     */
    #[Optional('record_format', enum: RecordFormat::class)]
    public ?string $recordFormat;

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    #[Optional('record_max_length')]
    public ?int $recordMaxLength;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Optional('record_timeout_secs')]
    public ?int $recordTimeoutSecs;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordTrack>|null $recordTrack
     */
    #[Optional('record_track', enum: RecordTrack::class)]
    public ?string $recordTrack;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<RecordTrim>|null $recordTrim
     */
    #[Optional('record_trim', enum: RecordTrim::class)]
    public ?string $recordTrim;

    /**
     * Specifies which country ringtone to play when `play_ringtone` is set to `true`. If not set, the US ringtone will be played.
     *
     * @var value-of<Ringtone>|null $ringtone
     */
    #[Optional(enum: Ringtone::class)]
    public ?string $ringtone;

    /**
     * The additional parameter that will be passed to the video conference. It is a text field and the user can decide how to use it. For example, you can set the participant name or pass JSON text. It can be used only with video_room_id parameter.
     */
    #[Optional('video_room_context')]
    public ?string $videoRoomContext;

    /**
     * The ID of the video room you want to bridge with, can't be used together with call_control_id parameter or queue parameter.
     */
    #[Optional('video_room_id')]
    public ?string $videoRoomID;

    /**
     * `new ActionBridgeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionBridgeParams::with(callControlID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionBridgeParams)->withCallControlID(...)
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
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     * @param Ringtone|value-of<Ringtone> $ringtone
     */
    public static function with(
        string $callControlID,
        ?string $clientState = null,
        ?string $commandID = null,
        MuteDtmf|string|null $muteDtmf = null,
        ?string $parkAfterUnbridge = null,
        ?bool $playRingtone = null,
        ?string $queue = null,
        Record|string|null $record = null,
        RecordChannels|string|null $recordChannels = null,
        ?string $recordCustomFileName = null,
        RecordFormat|string|null $recordFormat = null,
        ?int $recordMaxLength = null,
        ?int $recordTimeoutSecs = null,
        RecordTrack|string|null $recordTrack = null,
        RecordTrim|string|null $recordTrim = null,
        Ringtone|string|null $ringtone = null,
        ?string $videoRoomContext = null,
        ?string $videoRoomID = null,
    ): self {
        $self = new self;

        $self['callControlID'] = $callControlID;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $muteDtmf && $self['muteDtmf'] = $muteDtmf;
        null !== $parkAfterUnbridge && $self['parkAfterUnbridge'] = $parkAfterUnbridge;
        null !== $playRingtone && $self['playRingtone'] = $playRingtone;
        null !== $queue && $self['queue'] = $queue;
        null !== $record && $self['record'] = $record;
        null !== $recordChannels && $self['recordChannels'] = $recordChannels;
        null !== $recordCustomFileName && $self['recordCustomFileName'] = $recordCustomFileName;
        null !== $recordFormat && $self['recordFormat'] = $recordFormat;
        null !== $recordMaxLength && $self['recordMaxLength'] = $recordMaxLength;
        null !== $recordTimeoutSecs && $self['recordTimeoutSecs'] = $recordTimeoutSecs;
        null !== $recordTrack && $self['recordTrack'] = $recordTrack;
        null !== $recordTrim && $self['recordTrim'] = $recordTrim;
        null !== $ringtone && $self['ringtone'] = $ringtone;
        null !== $videoRoomContext && $self['videoRoomContext'] = $videoRoomContext;
        null !== $videoRoomID && $self['videoRoomID'] = $videoRoomID;

        return $self;
    }

    /**
     * The Call Control ID of the call you want to bridge with, can't be used together with queue parameter or video_room_id parameter.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf
     */
    public function withMuteDtmf(MuteDtmf|string $muteDtmf): self
    {
        $self = clone $this;
        $self['muteDtmf'] = $muteDtmf;

        return $self;
    }

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    public function withParkAfterUnbridge(string $parkAfterUnbridge): self
    {
        $self = clone $this;
        $self['parkAfterUnbridge'] = $parkAfterUnbridge;

        return $self;
    }

    /**
     * Specifies whether to play a ringtone if the call you want to bridge with has not yet been answered.
     */
    public function withPlayRingtone(bool $playRingtone): self
    {
        $self = clone $this;
        $self['playRingtone'] = $playRingtone;

        return $self;
    }

    /**
     * The name of the queue you want to bridge with, can't be used together with call_control_id parameter or video_room_id parameter. Bridging with a queue means bridging with the first call in the queue. The call will always be removed from the queue regardless of whether bridging succeeds. Returns an error when the queue is empty.
     */
    public function withQueue(string $queue): self
    {
        $self = clone $this;
        $self['queue'] = $queue;

        return $self;
    }

    /**
     * Start recording automatically after an event. Disabled by default.
     *
     * @param Record|value-of<Record> $record
     */
    public function withRecord(Record|string $record): self
    {
        $self = clone $this;
        $self['record'] = $record;

        return $self;
    }

    /**
     * Defines which channel should be recorded ('single' or 'dual') when `record` is specified.
     *
     * @param RecordChannels|value-of<RecordChannels> $recordChannels
     */
    public function withRecordChannels(
        RecordChannels|string $recordChannels
    ): self {
        $self = clone $this;
        $self['recordChannels'] = $recordChannels;

        return $self;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withRecordCustomFileName(string $recordCustomFileName): self
    {
        $self = clone $this;
        $self['recordCustomFileName'] = $recordCustomFileName;

        return $self;
    }

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @param RecordFormat|value-of<RecordFormat> $recordFormat
     */
    public function withRecordFormat(RecordFormat|string $recordFormat): self
    {
        $self = clone $this;
        $self['recordFormat'] = $recordFormat;

        return $self;
    }

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    public function withRecordMaxLength(int $recordMaxLength): self
    {
        $self = clone $this;
        $self['recordMaxLength'] = $recordMaxLength;

        return $self;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordTimeoutSecs(int $recordTimeoutSecs): self
    {
        $self = clone $this;
        $self['recordTimeoutSecs'] = $recordTimeoutSecs;

        return $self;
    }

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @param RecordTrack|value-of<RecordTrack> $recordTrack
     */
    public function withRecordTrack(RecordTrack|string $recordTrack): self
    {
        $self = clone $this;
        $self['recordTrack'] = $recordTrack;

        return $self;
    }

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @param RecordTrim|value-of<RecordTrim> $recordTrim
     */
    public function withRecordTrim(RecordTrim|string $recordTrim): self
    {
        $self = clone $this;
        $self['recordTrim'] = $recordTrim;

        return $self;
    }

    /**
     * Specifies which country ringtone to play when `play_ringtone` is set to `true`. If not set, the US ringtone will be played.
     *
     * @param Ringtone|value-of<Ringtone> $ringtone
     */
    public function withRingtone(Ringtone|string $ringtone): self
    {
        $self = clone $this;
        $self['ringtone'] = $ringtone;

        return $self;
    }

    /**
     * The additional parameter that will be passed to the video conference. It is a text field and the user can decide how to use it. For example, you can set the participant name or pass JSON text. It can be used only with video_room_id parameter.
     */
    public function withVideoRoomContext(string $videoRoomContext): self
    {
        $self = clone $this;
        $self['videoRoomContext'] = $videoRoomContext;

        return $self;
    }

    /**
     * The ID of the video room you want to bridge with, can't be used together with call_control_id parameter or queue parameter.
     */
    public function withVideoRoomID(string $videoRoomID): self
    {
        $self = clone $this;
        $self['videoRoomID'] = $videoRoomID;

        return $self;
    }
}
