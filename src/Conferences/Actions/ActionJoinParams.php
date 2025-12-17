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
 *   callControlID: string,
 *   beepEnabled?: null|BeepEnabled|value-of<BeepEnabled>,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   endConferenceOnExit?: bool|null,
 *   hold?: bool|null,
 *   holdAudioURL?: string|null,
 *   holdMediaName?: string|null,
 *   mute?: bool|null,
 *   region?: null|Region|value-of<Region>,
 *   softEndConferenceOnExit?: bool|null,
 *   startConferenceOnEnter?: bool|null,
 *   supervisorRole?: null|SupervisorRole|value-of<SupervisorRole>,
 *   whisperCallControlIDs?: list<string>|null,
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
    #[Required('call_control_id')]
    public string $callControlID;

    /**
     * Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     *
     * @var value-of<BeepEnabled>|null $beepEnabled
     */
    #[Optional('beep_enabled', enum: BeepEnabled::class)]
    public ?string $beepEnabled;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. Please note that the client_state will be updated for the participient call leg and the change will not affect conferencing webhooks unless the participient is the owner of the conference.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Whether the conference should end and all remaining participants be hung up after the participant leaves the conference. Defaults to "false".
     */
    #[Optional('end_conference_on_exit')]
    public ?bool $endConferenceOnExit;

    /**
     * Whether the participant should be put on hold immediately after joining the conference. Defaults to "false".
     */
    #[Optional]
    public ?bool $hold;

    /**
     * The URL of a file to be played to the participant when they are put on hold after joining the conference. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    #[Optional('hold_audio_url')]
    public ?string $holdAudioURL;

    /**
     * The media_name of a file to be played to the participant when they are put on hold after joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    #[Optional('hold_media_name')]
    public ?string $holdMediaName;

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
    #[Optional('soft_end_conference_on_exit')]
    public ?bool $softEndConferenceOnExit;

    /**
     * Whether the conference should be started after the participant joins the conference. Defaults to "false".
     */
    #[Optional('start_conference_on_enter')]
    public ?bool $startConferenceOnEnter;

    /**
     * Sets the joining participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     *
     * @var value-of<SupervisorRole>|null $supervisorRole
     */
    #[Optional('supervisor_role', enum: SupervisorRole::class)]
    public ?string $supervisorRole;

    /**
     * Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @var list<string>|null $whisperCallControlIDs
     */
    #[Optional('whisper_call_control_ids', list: 'string')]
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
     * @param BeepEnabled|value-of<BeepEnabled>|null $beepEnabled
     * @param Region|value-of<Region>|null $region
     * @param SupervisorRole|value-of<SupervisorRole>|null $supervisorRole
     * @param list<string>|null $whisperCallControlIDs
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
        Region|string|null $region = null,
        ?bool $softEndConferenceOnExit = null,
        ?bool $startConferenceOnEnter = null,
        SupervisorRole|string|null $supervisorRole = null,
        ?array $whisperCallControlIDs = null,
    ): self {
        $self = new self;

        $self['callControlID'] = $callControlID;

        null !== $beepEnabled && $self['beepEnabled'] = $beepEnabled;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $endConferenceOnExit && $self['endConferenceOnExit'] = $endConferenceOnExit;
        null !== $hold && $self['hold'] = $hold;
        null !== $holdAudioURL && $self['holdAudioURL'] = $holdAudioURL;
        null !== $holdMediaName && $self['holdMediaName'] = $holdMediaName;
        null !== $mute && $self['mute'] = $mute;
        null !== $region && $self['region'] = $region;
        null !== $softEndConferenceOnExit && $self['softEndConferenceOnExit'] = $softEndConferenceOnExit;
        null !== $startConferenceOnEnter && $self['startConferenceOnEnter'] = $startConferenceOnEnter;
        null !== $supervisorRole && $self['supervisorRole'] = $supervisorRole;
        null !== $whisperCallControlIDs && $self['whisperCallControlIDs'] = $whisperCallControlIDs;

        return $self;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     *
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled
     */
    public function withBeepEnabled(BeepEnabled|string $beepEnabled): self
    {
        $self = clone $this;
        $self['beepEnabled'] = $beepEnabled;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. Please note that the client_state will be updated for the participient call leg and the change will not affect conferencing webhooks unless the participient is the owner of the conference.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * Whether the conference should end and all remaining participants be hung up after the participant leaves the conference. Defaults to "false".
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $self = clone $this;
        $self['endConferenceOnExit'] = $endConferenceOnExit;

        return $self;
    }

    /**
     * Whether the participant should be put on hold immediately after joining the conference. Defaults to "false".
     */
    public function withHold(bool $hold): self
    {
        $self = clone $this;
        $self['hold'] = $hold;

        return $self;
    }

    /**
     * The URL of a file to be played to the participant when they are put on hold after joining the conference. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    public function withHoldAudioURL(string $holdAudioURL): self
    {
        $self = clone $this;
        $self['holdAudioURL'] = $holdAudioURL;

        return $self;
    }

    /**
     * The media_name of a file to be played to the participant when they are put on hold after joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false". This property takes effect only if "hold" is set to "true".
     */
    public function withHoldMediaName(string $holdMediaName): self
    {
        $self = clone $this;
        $self['holdMediaName'] = $holdMediaName;

        return $self;
    }

    /**
     * Whether the participant should be muted immediately after joining the conference. Defaults to "false".
     */
    public function withMute(bool $mute): self
    {
        $self = clone $this;
        $self['mute'] = $mute;

        return $self;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     */
    public function withSoftEndConferenceOnExit(
        bool $softEndConferenceOnExit
    ): self {
        $self = clone $this;
        $self['softEndConferenceOnExit'] = $softEndConferenceOnExit;

        return $self;
    }

    /**
     * Whether the conference should be started after the participant joins the conference. Defaults to "false".
     */
    public function withStartConferenceOnEnter(
        bool $startConferenceOnEnter
    ): self {
        $self = clone $this;
        $self['startConferenceOnEnter'] = $startConferenceOnEnter;

        return $self;
    }

    /**
     * Sets the joining participant as a supervisor for the conference. A conference can have multiple supervisors. "barge" means the supervisor enters the conference as a normal participant. This is the same as "none". "monitor" means the supervisor is muted but can hear all participants. "whisper" means that only the specified "whisper_call_control_ids" can hear the supervisor. Defaults to "none".
     *
     * @param SupervisorRole|value-of<SupervisorRole> $supervisorRole
     */
    public function withSupervisorRole(
        SupervisorRole|string $supervisorRole
    ): self {
        $self = clone $this;
        $self['supervisorRole'] = $supervisorRole;

        return $self;
    }

    /**
     * Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @param list<string> $whisperCallControlIDs
     */
    public function withWhisperCallControlIDs(
        array $whisperCallControlIDs
    ): self {
        $self = clone $this;
        $self['whisperCallControlIDs'] = $whisperCallControlIDs;

        return $self;
    }
}
