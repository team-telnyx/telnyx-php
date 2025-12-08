<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionJoinParams\BeepEnabled;
use Telnyx\Conferences\Actions\ActionJoinParams\Region;
use Telnyx\Conferences\Actions\ActionJoinParams\SupervisorRole;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Join an existing call leg to a conference. Issue the Join Conference command with the conference ID in the path and the `call_control_id` of the leg you wish to join to the conference as an attribute. The conference can have up to a certain amount of active participants, as set by the `max_participants` parameter in conference creation request.
 *
 * **Expected Webhooks:**
 *
 * - `conference.participant.joined`
 * - `conference.participant.left`
 *
 * @see Telnyx\Services\Conferences\ActionsService::join()
 *
 * @phpstan-type ActionJoinParamsShape = array{
 *   call_control_id: string,
 *   beep_enabled?: BeepEnabled|value-of<BeepEnabled>,
 *   client_state?: string,
 *   command_id?: string,
 *   end_conference_on_exit?: bool,
 *   hold?: bool,
 *   hold_audio_url?: string,
 *   hold_media_name?: string,
 *   mute?: bool,
 *   region?: Region|value-of<Region>,
 *   soft_end_conference_on_exit?: bool,
 *   start_conference_on_enter?: bool,
 *   supervisor_role?: SupervisorRole|value-of<SupervisorRole>,
 *   whisper_call_control_ids?: list<string>,
 * }
 */
final class ActionJoinParams implements BaseModel
{
    /** @use SdkModel<ActionJoinParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Required]
    public string $call_control_id;

    /**
     * Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     *
     * @var value-of<BeepEnabled>|null $beep_enabled
     */
    #[Optional(enum: BeepEnabled::class)]
    public ?string $beep_enabled;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. Please note that the client_state will be updated for the participient call leg and the change will not affect conferencing webhooks unless the participient is the owner of the conference.
     */
    #[Optional]
    public ?string $client_state;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Optional]
    public ?string $command_id;

    /**
     * Whether the conference should end and all remaining participants be hung up after the participant leaves the conference. Defaults to "false".
     */
    #[Optional]
    public ?bool $end_conference_on_exit;

    /**
     * Whether the participant should be put on hold immediately after joining the conference. Defaults to "false".
     */
    #[Optional]
    public ?bool $hold;

    /**
     * The URL of a file to be played to the participant when they are put on hold after joining the conference. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    #[Optional]
    public ?string $hold_audio_url;

    /**
     * The media_name of a file to be played to the participant when they are put on hold after joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    #[Optional]
    public ?string $hold_media_name;

    /**
     * Whether the participant should be muted immediately after joining the conference. Defaults to "false".
     */
    #[Optional]
    public ?bool $mute;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    /**
     * Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     */
    #[Optional]
    public ?bool $soft_end_conference_on_exit;

    /**
     * Whether the conference should be started after the participant joins the conference. Defaults to "false".
     */
    #[Optional]
    public ?bool $start_conference_on_enter;

    /**
     * Sets the joining participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     *
     * @var value-of<SupervisorRole>|null $supervisor_role
     */
    #[Optional(enum: SupervisorRole::class)]
    public ?string $supervisor_role;

    /**
     * Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @var list<string>|null $whisper_call_control_ids
     */
    #[Optional(list: 'string')]
    public ?array $whisper_call_control_ids;

    /**
     * `new ActionJoinParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionJoinParams::with(call_control_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionJoinParams)->withCallControlID(...)
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
     * @param BeepEnabled|value-of<BeepEnabled> $beep_enabled
     * @param Region|value-of<Region> $region
     * @param SupervisorRole|value-of<SupervisorRole> $supervisor_role
     * @param list<string> $whisper_call_control_ids
     */
    public static function with(
        string $call_control_id,
        BeepEnabled|string|null $beep_enabled = null,
        ?string $client_state = null,
        ?string $command_id = null,
        ?bool $end_conference_on_exit = null,
        ?bool $hold = null,
        ?string $hold_audio_url = null,
        ?string $hold_media_name = null,
        ?bool $mute = null,
        Region|string|null $region = null,
        ?bool $soft_end_conference_on_exit = null,
        ?bool $start_conference_on_enter = null,
        SupervisorRole|string|null $supervisor_role = null,
        ?array $whisper_call_control_ids = null,
    ): self {
        $obj = new self;

        $obj['call_control_id'] = $call_control_id;

        null !== $beep_enabled && $obj['beep_enabled'] = $beep_enabled;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $end_conference_on_exit && $obj['end_conference_on_exit'] = $end_conference_on_exit;
        null !== $hold && $obj['hold'] = $hold;
        null !== $hold_audio_url && $obj['hold_audio_url'] = $hold_audio_url;
        null !== $hold_media_name && $obj['hold_media_name'] = $hold_media_name;
        null !== $mute && $obj['mute'] = $mute;
        null !== $region && $obj['region'] = $region;
        null !== $soft_end_conference_on_exit && $obj['soft_end_conference_on_exit'] = $soft_end_conference_on_exit;
        null !== $start_conference_on_enter && $obj['start_conference_on_enter'] = $start_conference_on_enter;
        null !== $supervisor_role && $obj['supervisor_role'] = $supervisor_role;
        null !== $whisper_call_control_ids && $obj['whisper_call_control_ids'] = $whisper_call_control_ids;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['call_control_id'] = $callControlID;

        return $obj;
    }

    /**
     * Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     *
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled
     */
    public function withBeepEnabled(BeepEnabled|string $beepEnabled): self
    {
        $obj = clone $this;
        $obj['beep_enabled'] = $beepEnabled;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. Please note that the client_state will be updated for the participient call leg and the change will not affect conferencing webhooks unless the participient is the owner of the conference.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['command_id'] = $commandID;

        return $obj;
    }

    /**
     * Whether the conference should end and all remaining participants be hung up after the participant leaves the conference. Defaults to "false".
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj['end_conference_on_exit'] = $endConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the participant should be put on hold immediately after joining the conference. Defaults to "false".
     */
    public function withHold(bool $hold): self
    {
        $obj = clone $this;
        $obj['hold'] = $hold;

        return $obj;
    }

    /**
     * The URL of a file to be played to the participant when they are put on hold after joining the conference. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    public function withHoldAudioURL(string $holdAudioURL): self
    {
        $obj = clone $this;
        $obj['hold_audio_url'] = $holdAudioURL;

        return $obj;
    }

    /**
     * The media_name of a file to be played to the participant when they are put on hold after joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    public function withHoldMediaName(string $holdMediaName): self
    {
        $obj = clone $this;
        $obj['hold_media_name'] = $holdMediaName;

        return $obj;
    }

    /**
     * Whether the participant should be muted immediately after joining the conference. Defaults to "false".
     */
    public function withMute(bool $mute): self
    {
        $obj = clone $this;
        $obj['mute'] = $mute;

        return $obj;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }

    /**
     * Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     */
    public function withSoftEndConferenceOnExit(
        bool $softEndConferenceOnExit
    ): self {
        $obj = clone $this;
        $obj['soft_end_conference_on_exit'] = $softEndConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the conference should be started after the participant joins the conference. Defaults to "false".
     */
    public function withStartConferenceOnEnter(
        bool $startConferenceOnEnter
    ): self {
        $obj = clone $this;
        $obj['start_conference_on_enter'] = $startConferenceOnEnter;

        return $obj;
    }

    /**
     * Sets the joining participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     *
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole
     */
    public function withSupervisorRole(
        SupervisorRole|string $supervisorRole
    ): self {
        $obj = clone $this;
        $obj['supervisor_role'] = $supervisorRole;

        return $obj;
    }

    /**
     * Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @param list<string> $whisperCallControlIDs
     */
    public function withWhisperCallControlIDs(
        array $whisperCallControlIDs
    ): self {
        $obj = clone $this;
        $obj['whisper_call_control_ids'] = $whisperCallControlIDs;

        return $obj;
    }
}
