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
 *   beep_enabled?: value-of<BeepEnabled>|null,
 *   conference_name?: string|null,
 *   early_media?: bool|null,
 *   end_conference_on_exit?: bool|null,
 *   hold?: bool|null,
 *   hold_audio_url?: string|null,
 *   hold_media_name?: string|null,
 *   mute?: bool|null,
 *   soft_end_conference_on_exit?: bool|null,
 *   start_conference_on_create?: bool|null,
 *   start_conference_on_enter?: bool|null,
 *   supervisor_role?: value-of<\Telnyx\Calls\CallDialParams\ConferenceConfig\SupervisorRole>|null,
 *   whisper_call_control_ids?: list<string>|null,
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
     * @var value-of<BeepEnabled>|null $beep_enabled
     */
    #[Optional(enum: BeepEnabled::class)]
    public ?string $beep_enabled;

    /**
     * Conference name to be joined.
     */
    #[Optional]
    public ?string $conference_name;

    /**
     * Controls the moment when dialled call is joined into conference. If set to `true` user will be joined as soon as media is available (ringback). If `false` user will be joined when call is answered. Defaults to `true`.
     */
    #[Optional]
    public ?bool $early_media;

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
     * Whether the conference should end after the participant leaves the conference. NOTE this doesn't hang up the other participants. Defaults to "false".
     */
    #[Optional]
    public ?bool $soft_end_conference_on_exit;

    /**
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    #[Optional]
    public ?bool $start_conference_on_create;

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
    #[Optional(
        enum: SupervisorRole::class
    )]
    public ?string $supervisor_role;

    /**
     * Array of unique call_control_ids the joining supervisor can whisper to. If none provided, the supervisor will join the conference as a monitoring participant only.
     *
     * @var list<string>|null $whisper_call_control_ids
     */
    #[Optional(list: 'string')]
    public ?array $whisper_call_control_ids;

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
     * @param SupervisorRole|value-of<SupervisorRole> $supervisor_role
     * @param list<string> $whisper_call_control_ids
     */
    public static function with(
        ?string $id = null,
        BeepEnabled|string|null $beep_enabled = null,
        ?string $conference_name = null,
        ?bool $early_media = null,
        ?bool $end_conference_on_exit = null,
        ?bool $hold = null,
        ?string $hold_audio_url = null,
        ?string $hold_media_name = null,
        ?bool $mute = null,
        ?bool $soft_end_conference_on_exit = null,
        ?bool $start_conference_on_create = null,
        ?bool $start_conference_on_enter = null,
        SupervisorRole|string|null $supervisor_role = null,
        ?array $whisper_call_control_ids = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $beep_enabled && $obj['beep_enabled'] = $beep_enabled;
        null !== $conference_name && $obj['conference_name'] = $conference_name;
        null !== $early_media && $obj['early_media'] = $early_media;
        null !== $end_conference_on_exit && $obj['end_conference_on_exit'] = $end_conference_on_exit;
        null !== $hold && $obj['hold'] = $hold;
        null !== $hold_audio_url && $obj['hold_audio_url'] = $hold_audio_url;
        null !== $hold_media_name && $obj['hold_media_name'] = $hold_media_name;
        null !== $mute && $obj['mute'] = $mute;
        null !== $soft_end_conference_on_exit && $obj['soft_end_conference_on_exit'] = $soft_end_conference_on_exit;
        null !== $start_conference_on_create && $obj['start_conference_on_create'] = $start_conference_on_create;
        null !== $start_conference_on_enter && $obj['start_conference_on_enter'] = $start_conference_on_enter;
        null !== $supervisor_role && $obj['supervisor_role'] = $supervisor_role;
        null !== $whisper_call_control_ids && $obj['whisper_call_control_ids'] = $whisper_call_control_ids;

        return $obj;
    }

    /**
     * Conference ID to be joined.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
     * Conference name to be joined.
     */
    public function withConferenceName(string $conferenceName): self
    {
        $obj = clone $this;
        $obj['conference_name'] = $conferenceName;

        return $obj;
    }

    /**
     * Controls the moment when dialled call is joined into conference. If set to `true` user will be joined as soon as media is available (ringback). If `false` user will be joined when call is answered. Defaults to `true`.
     */
    public function withEarlyMedia(bool $earlyMedia): self
    {
        $obj = clone $this;
        $obj['early_media'] = $earlyMedia;

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
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    public function withStartConferenceOnCreate(
        bool $startConferenceOnCreate
    ): self {
        $obj = clone $this;
        $obj['start_conference_on_create'] = $startConferenceOnCreate;

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
        SupervisorRole|string $supervisorRole,
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
