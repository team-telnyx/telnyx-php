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
use Telnyx\Core\Attributes\Api;
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
 * @see Telnyx\STAINLESS_FIXME_Calls\ActionsService::bridge()
 *
 * @phpstan-type ActionBridgeParamsShape = array{
 *   call_control_id: string,
 *   client_state?: string,
 *   command_id?: string,
 *   mute_dtmf?: MuteDtmf|value-of<MuteDtmf>,
 *   park_after_unbridge?: string,
 *   play_ringtone?: bool,
 *   queue?: string,
 *   record?: Record|value-of<Record>,
 *   record_channels?: RecordChannels|value-of<RecordChannels>,
 *   record_custom_file_name?: string,
 *   record_format?: RecordFormat|value-of<RecordFormat>,
 *   record_max_length?: int,
 *   record_timeout_secs?: int,
 *   record_track?: RecordTrack|value-of<RecordTrack>,
 *   record_trim?: RecordTrim|value-of<RecordTrim>,
 *   ringtone?: Ringtone|value-of<Ringtone>,
 *   video_room_context?: string,
 *   video_room_id?: string,
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
    #[Api]
    public string $call_control_id;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @var value-of<MuteDtmf>|null $mute_dtmf
     */
    #[Api(enum: MuteDtmf::class, optional: true)]
    public ?string $mute_dtmf;

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    #[Api(optional: true)]
    public ?string $park_after_unbridge;

    /**
     * Specifies whether to play a ringtone if the call you want to bridge with has not yet been answered.
     */
    #[Api(optional: true)]
    public ?bool $play_ringtone;

    /**
     * The name of the queue you want to bridge with, can't be used together with call_control_id parameter or video_room_id parameter. Bridging with a queue means bridging with the first call in the queue. The call will always be removed from the queue regardless of whether bridging succeeds. Returns an error when the queue is empty.
     */
    #[Api(optional: true)]
    public ?string $queue;

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
     * @var value-of<RecordChannels>|null $record_channels
     */
    #[Api(enum: RecordChannels::class, optional: true)]
    public ?string $record_channels;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Api(optional: true)]
    public ?string $record_custom_file_name;

    /**
     * Defines the format of the recording ('wav' or 'mp3') when `record` is specified.
     *
     * @var value-of<RecordFormat>|null $record_format
     */
    #[Api(enum: RecordFormat::class, optional: true)]
    public ?string $record_format;

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    #[Api(optional: true)]
    public ?int $record_max_length;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Api(optional: true)]
    public ?int $record_timeout_secs;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordTrack>|null $record_track
     */
    #[Api(enum: RecordTrack::class, optional: true)]
    public ?string $record_track;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<RecordTrim>|null $record_trim
     */
    #[Api(enum: RecordTrim::class, optional: true)]
    public ?string $record_trim;

    /**
     * Specifies which country ringtone to play when `play_ringtone` is set to `true`. If not set, the US ringtone will be played.
     *
     * @var value-of<Ringtone>|null $ringtone
     */
    #[Api(enum: Ringtone::class, optional: true)]
    public ?string $ringtone;

    /**
     * The additional parameter that will be passed to the video conference. It is a text field and the user can decide how to use it. For example, you can set the participant name or pass JSON text. It can be used only with video_room_id parameter.
     */
    #[Api(optional: true)]
    public ?string $video_room_context;

    /**
     * The ID of the video room you want to bridge with, can't be used together with call_control_id parameter or queue parameter.
     */
    #[Api(optional: true)]
    public ?string $video_room_id;

    /**
     * `new ActionBridgeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionBridgeParams::with(call_control_id: ...)
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
     * @param MuteDtmf|value-of<MuteDtmf> $mute_dtmf
     * @param Record|value-of<Record> $record
     * @param RecordChannels|value-of<RecordChannels> $record_channels
     * @param RecordFormat|value-of<RecordFormat> $record_format
     * @param RecordTrack|value-of<RecordTrack> $record_track
     * @param RecordTrim|value-of<RecordTrim> $record_trim
     * @param Ringtone|value-of<Ringtone> $ringtone
     */
    public static function with(
        string $call_control_id,
        ?string $client_state = null,
        ?string $command_id = null,
        MuteDtmf|string|null $mute_dtmf = null,
        ?string $park_after_unbridge = null,
        ?bool $play_ringtone = null,
        ?string $queue = null,
        Record|string|null $record = null,
        RecordChannels|string|null $record_channels = null,
        ?string $record_custom_file_name = null,
        RecordFormat|string|null $record_format = null,
        ?int $record_max_length = null,
        ?int $record_timeout_secs = null,
        RecordTrack|string|null $record_track = null,
        RecordTrim|string|null $record_trim = null,
        Ringtone|string|null $ringtone = null,
        ?string $video_room_context = null,
        ?string $video_room_id = null,
    ): self {
        $obj = new self;

        $obj->call_control_id = $call_control_id;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $mute_dtmf && $obj['mute_dtmf'] = $mute_dtmf;
        null !== $park_after_unbridge && $obj->park_after_unbridge = $park_after_unbridge;
        null !== $play_ringtone && $obj->play_ringtone = $play_ringtone;
        null !== $queue && $obj->queue = $queue;
        null !== $record && $obj['record'] = $record;
        null !== $record_channels && $obj['record_channels'] = $record_channels;
        null !== $record_custom_file_name && $obj->record_custom_file_name = $record_custom_file_name;
        null !== $record_format && $obj['record_format'] = $record_format;
        null !== $record_max_length && $obj->record_max_length = $record_max_length;
        null !== $record_timeout_secs && $obj->record_timeout_secs = $record_timeout_secs;
        null !== $record_track && $obj['record_track'] = $record_track;
        null !== $record_trim && $obj['record_trim'] = $record_trim;
        null !== $ringtone && $obj['ringtone'] = $ringtone;
        null !== $video_room_context && $obj->video_room_context = $video_room_context;
        null !== $video_room_id && $obj->video_room_id = $video_room_id;

        return $obj;
    }

    /**
     * The Call Control ID of the call you want to bridge with, can't be used together with queue parameter or video_room_id parameter.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->call_control_id = $callControlID;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

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
        $obj['mute_dtmf'] = $muteDtmf;

        return $obj;
    }

    /**
     * Specifies behavior after the bridge ends (i.e. the opposite leg either hangs up or is transferred). If supplied with the value `self`, the current leg will be parked after unbridge. If not set, the default behavior is to hang up the leg.
     */
    public function withParkAfterUnbridge(string $parkAfterUnbridge): self
    {
        $obj = clone $this;
        $obj->park_after_unbridge = $parkAfterUnbridge;

        return $obj;
    }

    /**
     * Specifies whether to play a ringtone if the call you want to bridge with has not yet been answered.
     */
    public function withPlayRingtone(bool $playRingtone): self
    {
        $obj = clone $this;
        $obj->play_ringtone = $playRingtone;

        return $obj;
    }

    /**
     * The name of the queue you want to bridge with, can't be used together with call_control_id parameter or video_room_id parameter. Bridging with a queue means bridging with the first call in the queue. The call will always be removed from the queue regardless of whether bridging succeeds. Returns an error when the queue is empty.
     */
    public function withQueue(string $queue): self
    {
        $obj = clone $this;
        $obj->queue = $queue;

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
        $obj['record_channels'] = $recordChannels;

        return $obj;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withRecordCustomFileName(string $recordCustomFileName): self
    {
        $obj = clone $this;
        $obj->record_custom_file_name = $recordCustomFileName;

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
        $obj['record_format'] = $recordFormat;

        return $obj;
    }

    /**
     * Defines the maximum length for the recording in seconds when `record` is specified. The minimum value is 0. The maximum value is 43200. The default value is 0 (infinite).
     */
    public function withRecordMaxLength(int $recordMaxLength): self
    {
        $obj = clone $this;
        $obj->record_max_length = $recordMaxLength;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected when `record` is specified. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withRecordTimeoutSecs(int $recordTimeoutSecs): self
    {
        $obj = clone $this;
        $obj->record_timeout_secs = $recordTimeoutSecs;

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
        $obj['record_track'] = $recordTrack;

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
        $obj['record_trim'] = $recordTrim;

        return $obj;
    }

    /**
     * Specifies which country ringtone to play when `play_ringtone` is set to `true`. If not set, the US ringtone will be played.
     *
     * @param Ringtone|value-of<Ringtone> $ringtone
     */
    public function withRingtone(Ringtone|string $ringtone): self
    {
        $obj = clone $this;
        $obj['ringtone'] = $ringtone;

        return $obj;
    }

    /**
     * The additional parameter that will be passed to the video conference. It is a text field and the user can decide how to use it. For example, you can set the participant name or pass JSON text. It can be used only with video_room_id parameter.
     */
    public function withVideoRoomContext(string $videoRoomContext): self
    {
        $obj = clone $this;
        $obj->video_room_context = $videoRoomContext;

        return $obj;
    }

    /**
     * The ID of the video room you want to bridge with, can't be used together with call_control_id parameter or queue parameter.
     */
    public function withVideoRoomID(string $videoRoomID): self
    {
        $obj = clone $this;
        $obj->video_room_id = $videoRoomID;

        return $obj;
    }
}
