<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Conferences\Actions\ActionJoinParams\BeepEnabled;
use Telnyx\Conferences\Actions\ActionJoinParams\SupervisorRole;
use Telnyx\Core\Attributes\Api;
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
 * @see Telnyx\Conferences\Actions->join
 *
 * @phpstan-type action_join_params = array{
 *   callControlID: string,
 *   beepEnabled?: BeepEnabled|value-of<BeepEnabled>,
 *   clientState?: string,
 *   commandID?: string,
 *   endConferenceOnExit?: bool,
 *   hold?: bool,
 *   holdAudioURL?: string,
 *   holdMediaName?: string,
 *   mute?: bool,
 *   softEndConferenceOnExit?: bool,
 *   startConferenceOnEnter?: bool,
 *   supervisorRole?: SupervisorRole|value-of<SupervisorRole>,
 *   whisperCallControlIDs?: list<string>,
 * }
 */
final class ActionJoinParams implements BaseModel
{
    /** @use SdkModel<action_join_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Api('call_control_id')]
    public string $callControlID;

    /**
     * Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     *
     * @var value-of<BeepEnabled>|null $beepEnabled
     */
    #[Api('beep_enabled', enum: BeepEnabled::class, optional: true)]
    public ?string $beepEnabled;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. Please note that the client_state will be updated for the participient call leg and the change will not affect conferencing webhooks unless the participient is the owner of the conference.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * Whether the conference should end and all remaining participants be hung up after the participant leaves the conference. Defaults to "false".
     */
    #[Api('end_conference_on_exit', optional: true)]
    public ?bool $endConferenceOnExit;

    /**
     * Whether the participant should be put on hold immediately after joining the conference. Defaults to "false".
     */
    #[Api(optional: true)]
    public ?bool $hold;

    /**
     * The URL of a file to be played to the participant when they are put on hold after joining the conference. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    #[Api('hold_audio_url', optional: true)]
    public ?string $holdAudioURL;

    /**
     * The media_name of a file to be played to the participant when they are put on hold after joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    #[Api('hold_media_name', optional: true)]
    public ?string $holdMediaName;

    /**
     * Whether the participant should be muted immediately after joining the conference. Defaults to "false".
     */
    #[Api(optional: true)]
    public ?bool $mute;

    /**
     * Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     */
    #[Api('soft_end_conference_on_exit', optional: true)]
    public ?bool $softEndConferenceOnExit;

    /**
     * Whether the conference should be started after the participant joins the conference. Defaults to "false".
     */
    #[Api('start_conference_on_enter', optional: true)]
    public ?bool $startConferenceOnEnter;

    /**
     * Sets the joining participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     *
     * @var value-of<SupervisorRole>|null $supervisorRole
     */
    #[Api('supervisor_role', enum: SupervisorRole::class, optional: true)]
    public ?string $supervisorRole;

    /**
     * Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @var list<string>|null $whisperCallControlIDs
     */
    #[Api('whisper_call_control_ids', list: 'string', optional: true)]
    public ?array $whisperCallControlIDs;

    /**
     * `new ActionJoinParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionJoinParams::with(callControlID: ...)
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
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole
     * @param list<string> $whisperCallControlIDs
     */
    public static function with(
        string $callControlID,
        BeepEnabled|string|null $beepEnabled = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?bool $endConferenceOnExit = null,
        ?bool $hold = null,
        ?string $holdAudioURL = null,
        ?string $holdMediaName = null,
        ?bool $mute = null,
        ?bool $softEndConferenceOnExit = null,
        ?bool $startConferenceOnEnter = null,
        SupervisorRole|string|null $supervisorRole = null,
        ?array $whisperCallControlIDs = null,
    ): self {
        $obj = new self;

        $obj->callControlID = $callControlID;

        null !== $beepEnabled && $obj['beepEnabled'] = $beepEnabled;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $endConferenceOnExit && $obj->endConferenceOnExit = $endConferenceOnExit;
        null !== $hold && $obj->hold = $hold;
        null !== $holdAudioURL && $obj->holdAudioURL = $holdAudioURL;
        null !== $holdMediaName && $obj->holdMediaName = $holdMediaName;
        null !== $mute && $obj->mute = $mute;
        null !== $softEndConferenceOnExit && $obj->softEndConferenceOnExit = $softEndConferenceOnExit;
        null !== $startConferenceOnEnter && $obj->startConferenceOnEnter = $startConferenceOnEnter;
        null !== $supervisorRole && $obj['supervisorRole'] = $supervisorRole;
        null !== $whisperCallControlIDs && $obj->whisperCallControlIDs = $whisperCallControlIDs;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

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
        $obj['beepEnabled'] = $beepEnabled;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. Please note that the client_state will be updated for the participient call leg and the change will not affect conferencing webhooks unless the participient is the owner of the conference.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * Whether the conference should end and all remaining participants be hung up after the participant leaves the conference. Defaults to "false".
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj->endConferenceOnExit = $endConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the participant should be put on hold immediately after joining the conference. Defaults to "false".
     */
    public function withHold(bool $hold): self
    {
        $obj = clone $this;
        $obj->hold = $hold;

        return $obj;
    }

    /**
     * The URL of a file to be played to the participant when they are put on hold after joining the conference. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    public function withHoldAudioURL(string $holdAudioURL): self
    {
        $obj = clone $this;
        $obj->holdAudioURL = $holdAudioURL;

        return $obj;
    }

    /**
     * The media_name of a file to be played to the participant when they are put on hold after joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    public function withHoldMediaName(string $holdMediaName): self
    {
        $obj = clone $this;
        $obj->holdMediaName = $holdMediaName;

        return $obj;
    }

    /**
     * Whether the participant should be muted immediately after joining the conference. Defaults to "false".
     */
    public function withMute(bool $mute): self
    {
        $obj = clone $this;
        $obj->mute = $mute;

        return $obj;
    }

    /**
     * Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     */
    public function withSoftEndConferenceOnExit(
        bool $softEndConferenceOnExit
    ): self {
        $obj = clone $this;
        $obj->softEndConferenceOnExit = $softEndConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the conference should be started after the participant joins the conference. Defaults to "false".
     */
    public function withStartConferenceOnEnter(
        bool $startConferenceOnEnter
    ): self {
        $obj = clone $this;
        $obj->startConferenceOnEnter = $startConferenceOnEnter;

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
        $obj['supervisorRole'] = $supervisorRole;

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
        $obj->whisperCallControlIDs = $whisperCallControlIDs;

        return $obj;
    }
}
