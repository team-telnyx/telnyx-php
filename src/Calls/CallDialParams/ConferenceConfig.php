<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

use Telnyx\Calls\CallDialParams\ConferenceConfig\BeepEnabled;
use Telnyx\Calls\CallDialParams\ConferenceConfig\SupervisorRole;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional configuration parameters to dial new participant into a conference.
 *
 * @phpstan-type ConferenceConfigShape = array{
 *   id?: string,
 *   beepEnabled?: value-of<BeepEnabled>,
 *   conferenceName?: string,
 *   earlyMedia?: bool,
 *   endConferenceOnExit?: bool,
 *   hold?: bool,
 *   holdAudioURL?: string,
 *   holdMediaName?: string,
 *   mute?: bool,
 *   softEndConferenceOnExit?: bool,
 *   startConferenceOnCreate?: bool,
 *   startConferenceOnEnter?: bool,
 *   supervisorRole?: value-of<SupervisorRole>,
 *   whisperCallControlIDs?: list<string>,
 * }
 */
final class ConferenceConfig implements BaseModel
{
    /** @use SdkModel<ConferenceConfigShape> */
    use SdkModel;

    /**
     * Conference ID to be joined.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Whether a beep sound should be played when the participant joins and/or leaves the conference. Can be used to override the conference-level setting.
     *
     * @var value-of<BeepEnabled>|null $beepEnabled
     */
    #[Api('beep_enabled', enum: BeepEnabled::class, optional: true)]
    public ?string $beepEnabled;

    /**
     * Conference name to be joined.
     */
    #[Api('conference_name', optional: true)]
    public ?string $conferenceName;

    /**
     * Controls the moment when dialled call is joined into conference. If set to `true` user will be joined as soon as media is available (ringback). If `false` user will be joined when call is answered. Defaults to `true`.
     */
    #[Api('early_media', optional: true)]
    public ?bool $earlyMedia;

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
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    #[Api('start_conference_on_create', optional: true)]
    public ?bool $startConferenceOnCreate;

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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $beepEnabled && $obj['beepEnabled'] = $beepEnabled;
        null !== $conferenceName && $obj->conferenceName = $conferenceName;
        null !== $earlyMedia && $obj->earlyMedia = $earlyMedia;
        null !== $endConferenceOnExit && $obj->endConferenceOnExit = $endConferenceOnExit;
        null !== $hold && $obj->hold = $hold;
        null !== $holdAudioURL && $obj->holdAudioURL = $holdAudioURL;
        null !== $holdMediaName && $obj->holdMediaName = $holdMediaName;
        null !== $mute && $obj->mute = $mute;
        null !== $softEndConferenceOnExit && $obj->softEndConferenceOnExit = $softEndConferenceOnExit;
        null !== $startConferenceOnCreate && $obj->startConferenceOnCreate = $startConferenceOnCreate;
        null !== $startConferenceOnEnter && $obj->startConferenceOnEnter = $startConferenceOnEnter;
        null !== $supervisorRole && $obj['supervisorRole'] = $supervisorRole;
        null !== $whisperCallControlIDs && $obj->whisperCallControlIDs = $whisperCallControlIDs;

        return $obj;
    }

    /**
     * Conference ID to be joined.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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
     * Conference name to be joined.
     */
    public function withConferenceName(string $conferenceName): self
    {
        $obj = clone $this;
        $obj->conferenceName = $conferenceName;

        return $obj;
    }

    /**
     * Controls the moment when dialled call is joined into conference. If set to `true` user will be joined as soon as media is available (ringback). If `false` user will be joined when call is answered. Defaults to `true`.
     */
    public function withEarlyMedia(bool $earlyMedia): self
    {
        $obj = clone $this;
        $obj->earlyMedia = $earlyMedia;

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
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    public function withStartConferenceOnCreate(
        bool $startConferenceOnCreate
    ): self {
        $obj = clone $this;
        $obj->startConferenceOnCreate = $startConferenceOnCreate;

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
