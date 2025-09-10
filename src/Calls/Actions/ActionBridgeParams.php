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
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionBridgeParams); // set properties as needed
 * $client->calls.actions->bridge(...$params->toArray());
 * ```
 * Bridge two call control calls.
 *
 * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/bridge-call#callbacks) below):**
 *
 * - `call.bridged` for Leg A
 * - `call.bridged` for Leg B
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->bridge(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->bridge
 *
 * @phpstan-type action_bridge_params = array{
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
    /** @use SdkModel<action_bridge_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The Call Control ID of the call you want to bridge with, can't be used together with queue parameter or video_room_id parameter.
     */
    #[Api('call_control_id')]
    public string $callControlID;

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
     * Specifies whether to play a ringtone if the call you want to bridge with has not yet been answered.
     */
    #[Api('play_ringtone', optional: true)]
    public ?bool $playRingtone;

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
     * Specifies which country ringtone to play when `play_ringtone` is set to `true`. If not set, the US ringtone will be played.
     *
     * @var value-of<Ringtone>|null $ringtone
     */
    #[Api(enum: Ringtone::class, optional: true)]
    public ?string $ringtone;

    /**
     * The additional parameter that will be passed to the video conference. It is a text field and the user can decide how to use it. For example, you can set the participant name or pass JSON text. It can be used only with video_room_id parameter.
     */
    #[Api('video_room_context', optional: true)]
    public ?string $videoRoomContext;

    /**
     * The ID of the video room you want to bridge with, can't be used together with call_control_id parameter or queue parameter.
     */
    #[Api('video_room_id', optional: true)]
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
        $obj = new self;

        $obj->callControlID = $callControlID;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $muteDtmf && $obj->muteDtmf = $muteDtmf instanceof MuteDtmf ? $muteDtmf->value : $muteDtmf;
        null !== $parkAfterUnbridge && $obj->parkAfterUnbridge = $parkAfterUnbridge;
        null !== $playRingtone && $obj->playRingtone = $playRingtone;
        null !== $queue && $obj->queue = $queue;
        null !== $record && $obj->record = $record instanceof Record ? $record->value : $record;
        null !== $recordChannels && $obj->recordChannels = $recordChannels instanceof RecordChannels ? $recordChannels->value : $recordChannels;
        null !== $recordCustomFileName && $obj->recordCustomFileName = $recordCustomFileName;
        null !== $recordFormat && $obj->recordFormat = $recordFormat instanceof RecordFormat ? $recordFormat->value : $recordFormat;
        null !== $recordMaxLength && $obj->recordMaxLength = $recordMaxLength;
        null !== $recordTimeoutSecs && $obj->recordTimeoutSecs = $recordTimeoutSecs;
        null !== $recordTrack && $obj->recordTrack = $recordTrack instanceof RecordTrack ? $recordTrack->value : $recordTrack;
        null !== $recordTrim && $obj->recordTrim = $recordTrim instanceof RecordTrim ? $recordTrim->value : $recordTrim;
        null !== $ringtone && $obj->ringtone = $ringtone instanceof Ringtone ? $ringtone->value : $ringtone;
        null !== $videoRoomContext && $obj->videoRoomContext = $videoRoomContext;
        null !== $videoRoomID && $obj->videoRoomID = $videoRoomID;

        return $obj;
    }

    /**
     * The Call Control ID of the call you want to bridge with, can't be used together with queue parameter or video_room_id parameter.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

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
     * When enabled, DTMF tones are not passed to the call participant. The webhooks containing the DTMF information will be sent.
     *
     * @param MuteDtmf|value-of<MuteDtmf> $muteDtmf
     */
    public function withMuteDtmf(MuteDtmf|string $muteDtmf): self
    {
        $obj = clone $this;
        $obj->muteDtmf = $muteDtmf instanceof MuteDtmf ? $muteDtmf->value : $muteDtmf;

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
     * Specifies whether to play a ringtone if the call you want to bridge with has not yet been answered.
     */
    public function withPlayRingtone(bool $playRingtone): self
    {
        $obj = clone $this;
        $obj->playRingtone = $playRingtone;

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
        $obj->record = $record instanceof Record ? $record->value : $record;

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
        $obj->recordChannels = $recordChannels instanceof RecordChannels ? $recordChannels->value : $recordChannels;

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
        $obj->recordFormat = $recordFormat instanceof RecordFormat ? $recordFormat->value : $recordFormat;

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
        $obj->recordTrack = $recordTrack instanceof RecordTrack ? $recordTrack->value : $recordTrack;

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
        $obj->recordTrim = $recordTrim instanceof RecordTrim ? $recordTrim->value : $recordTrim;

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
        $obj->ringtone = $ringtone instanceof Ringtone ? $ringtone->value : $ringtone;

        return $obj;
    }

    /**
     * The additional parameter that will be passed to the video conference. It is a text field and the user can decide how to use it. For example, you can set the participant name or pass JSON text. It can be used only with video_room_id parameter.
     */
    public function withVideoRoomContext(string $videoRoomContext): self
    {
        $obj = clone $this;
        $obj->videoRoomContext = $videoRoomContext;

        return $obj;
    }

    /**
     * The ID of the video room you want to bridge with, can't be used together with call_control_id parameter or queue parameter.
     */
    public function withVideoRoomID(string $videoRoomID): self
    {
        $obj = clone $this;
        $obj->videoRoomID = $videoRoomID;

        return $obj;
    }
}
