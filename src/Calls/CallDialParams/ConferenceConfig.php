<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

use Telnyx\Calls\CallDialParams\ConferenceConfig\BeepEnabled;
use Telnyx\Calls\CallDialParams\ConferenceConfig\SupervisorRole;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional configuration parameters to dial new participant into a conference.
 *
 * @phpstan-type ConferenceConfigShape = array{
 *   id?: string|null,
 *   beepEnabled?: null|BeepEnabled|value-of<BeepEnabled>,
 *   conferenceName?: string|null,
 *   earlyMedia?: bool|null,
 *   endConferenceOnExit?: bool|null,
 *   hold?: bool|null,
 *   holdAudioURL?: string|null,
 *   holdMediaName?: string|null,
 *   mute?: bool|null,
 *   softEndConferenceOnExit?: bool|null,
 *   startConferenceOnCreate?: bool|null,
 *   startConferenceOnEnter?: bool|null,
 *   supervisorRole?: null|\Telnyx\Calls\CallDialParams\ConferenceConfig\SupervisorRole|value-of<\Telnyx\Calls\CallDialParams\ConferenceConfig\SupervisorRole>,
 *   whisperCallControlIDs?: list<string>|null,
 * }
 */
final class ConferenceConfig implements BaseModel
{
    /** @use SdkModel<ConferenceConfigShape> */
    use SdkModel;

    /**
     * Conference ID to be joined.
     */
    #[Optional]
    public ?string $id;

    /**
     * Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     *
     * @var value-of<BeepEnabled>|null $beepEnabled
     */
    #[Optional('beep_enabled', enum: BeepEnabled::class)]
    public ?string $beepEnabled;

    /**
     * Conference name to be joined.
     */
    #[Optional('conference_name')]
    public ?string $conferenceName;

    /**
     * Controls the moment when dialled call is joined into conference. If set to `true` user will be joined as soon as media is available (ringback). If `false` user will be joined when call is answered. Defaults to `true`.
     */
    #[Optional('early_media')]
    public ?bool $earlyMedia;

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
     * Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     */
    #[Optional('soft_end_conference_on_exit')]
    public ?bool $softEndConferenceOnExit;

    /**
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    #[Optional('start_conference_on_create')]
    public ?bool $startConferenceOnCreate;

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
    #[Optional(
        'supervisor_role',
        enum: SupervisorRole::class,
    )]
    public ?string $supervisorRole;

    /**
     * Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @var list<string>|null $whisperCallControlIDs
     */
    #[Optional('whisper_call_control_ids', list: 'string')]
    public ?array $whisperCallControlIDs;

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
     * @param SupervisorRole|value-of<SupervisorRole>|null $supervisorRole
     * @param list<string>|null $whisperCallControlIDs
     */
    public static function with(
        ?string $id = null,
        BeepEnabled|string|null $beepEnabled = null,
        ?string $conferenceName = null,
        ?bool $earlyMedia = null,
        ?bool $endConferenceOnExit = null,
        ?bool $hold = null,
        ?string $holdAudioURL = null,
        ?string $holdMediaName = null,
        ?bool $mute = null,
        ?bool $softEndConferenceOnExit = null,
        ?bool $startConferenceOnCreate = null,
        ?bool $startConferenceOnEnter = null,
        SupervisorRole|string|null $supervisorRole = null,
        ?array $whisperCallControlIDs = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $beepEnabled && $self['beepEnabled'] = $beepEnabled;
        null !== $conferenceName && $self['conferenceName'] = $conferenceName;
        null !== $earlyMedia && $self['earlyMedia'] = $earlyMedia;
        null !== $endConferenceOnExit && $self['endConferenceOnExit'] = $endConferenceOnExit;
        null !== $hold && $self['hold'] = $hold;
        null !== $holdAudioURL && $self['holdAudioURL'] = $holdAudioURL;
        null !== $holdMediaName && $self['holdMediaName'] = $holdMediaName;
        null !== $mute && $self['mute'] = $mute;
        null !== $softEndConferenceOnExit && $self['softEndConferenceOnExit'] = $softEndConferenceOnExit;
        null !== $startConferenceOnCreate && $self['startConferenceOnCreate'] = $startConferenceOnCreate;
        null !== $startConferenceOnEnter && $self['startConferenceOnEnter'] = $startConferenceOnEnter;
        null !== $supervisorRole && $self['supervisorRole'] = $supervisorRole;
        null !== $whisperCallControlIDs && $self['whisperCallControlIDs'] = $whisperCallControlIDs;

        return $self;
    }

    /**
     * Conference ID to be joined.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * Conference name to be joined.
     */
    public function withConferenceName(string $conferenceName): self
    {
        $self = clone $this;
        $self['conferenceName'] = $conferenceName;

        return $self;
    }

    /**
     * Controls the moment when dialled call is joined into conference. If set to `true` user will be joined as soon as media is available (ringback). If `false` user will be joined when call is answered. Defaults to `true`.
     */
    public function withEarlyMedia(bool $earlyMedia): self
    {
        $self = clone $this;
        $self['earlyMedia'] = $earlyMedia;

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
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    public function withStartConferenceOnCreate(
        bool $startConferenceOnCreate
    ): self {
        $self = clone $this;
        $self['startConferenceOnCreate'] = $startConferenceOnCreate;

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
        SupervisorRole|string $supervisorRole,
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
