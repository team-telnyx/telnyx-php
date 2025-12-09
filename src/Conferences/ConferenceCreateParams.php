<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceCreateParams\BeepEnabled;
use Telnyx\Conferences\ConferenceCreateParams\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a conference from an existing call leg using a `call_control_id` and a conference name. Upon creating the conference, the call will be automatically bridged to the conference. Conferences will expire after all participants have left the conference or after 4 hours regardless of the number of active participants.
 *
 * **Expected Webhooks:**
 *
 * - `conference.created`
 * - `conference.participant.joined`
 * - `conference.participant.left`
 * - `conference.ended`
 * - `conference.recording.saved`
 * - `conference.floor.changed`
 *
 * @see Telnyx\Services\ConferencesService::create()
 *
 * @phpstan-type ConferenceCreateParamsShape = array{
 *   callControlID: string,
 *   name: string,
 *   beepEnabled?: BeepEnabled|value-of<BeepEnabled>,
 *   clientState?: string,
 *   comfortNoise?: bool,
 *   commandID?: string,
 *   durationMinutes?: int,
 *   holdAudioURL?: string,
 *   holdMediaName?: string,
 *   maxParticipants?: int,
 *   region?: Region|value-of<Region>,
 *   startConferenceOnCreate?: bool,
 * }
 */
final class ConferenceCreateParams implements BaseModel
{
    /** @use SdkModel<ConferenceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Required('call_control_id')]
    public string $callControlID;

    /**
     * Name of the conference.
     */
    #[Required]
    public string $name;

    /**
     * Whether a beep sound should be played when participants join and/or leave the conference.
     *
     * @var value-of<BeepEnabled>|null $beepEnabled
     */
    #[Optional('beep_enabled', enum: BeepEnabled::class)]
    public ?string $beepEnabled;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. The client_state will be updated for the creator call leg and will be used for all webhooks related to the created conference.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Toggle background comfort noise.
     */
    #[Optional('comfort_noise')]
    public ?bool $comfortNoise;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Time length (minutes) after which the conference will end.
     */
    #[Optional('duration_minutes')]
    public ?int $durationMinutes;

    /**
     * The URL of a file to be played to participants joining the conference. The URL can point to either a WAV or MP3 file. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false".
     */
    #[Optional('hold_audio_url')]
    public ?string $holdAudioURL;

    /**
     * The media_name of a file to be played to participants joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false".
     */
    #[Optional('hold_media_name')]
    public ?string $holdMediaName;

    /**
     * The maximum number of active conference participants to allow. Must be between 2 and 800. Defaults to 250.
     */
    #[Optional('max_participants')]
    public ?int $maxParticipants;

    /**
     * Sets the region where the conference data will be hosted. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    /**
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    #[Optional('start_conference_on_create')]
    public ?bool $startConferenceOnCreate;

    /**
     * `new ConferenceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceCreateParams::with(callControlID: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceCreateParams)->withCallControlID(...)->withName(...)
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
     * @param Region|value-of<Region> $region
     */
    public static function with(
        string $callControlID,
        string $name,
        BeepEnabled|string|null $beepEnabled = null,
        ?string $clientState = null,
        ?bool $comfortNoise = null,
        ?string $commandID = null,
        ?int $durationMinutes = null,
        ?string $holdAudioURL = null,
        ?string $holdMediaName = null,
        ?int $maxParticipants = null,
        Region|string|null $region = null,
        ?bool $startConferenceOnCreate = null,
    ): self {
        $self = new self;

        $self['callControlID'] = $callControlID;
        $self['name'] = $name;

        null !== $beepEnabled && $self['beepEnabled'] = $beepEnabled;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $comfortNoise && $self['comfortNoise'] = $comfortNoise;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $durationMinutes && $self['durationMinutes'] = $durationMinutes;
        null !== $holdAudioURL && $self['holdAudioURL'] = $holdAudioURL;
        null !== $holdMediaName && $self['holdMediaName'] = $holdMediaName;
        null !== $maxParticipants && $self['maxParticipants'] = $maxParticipants;
        null !== $region && $self['region'] = $region;
        null !== $startConferenceOnCreate && $self['startConferenceOnCreate'] = $startConferenceOnCreate;

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
     * Name of the conference.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Whether a beep sound should be played when participants join and/or leave the conference.
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
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. The client_state will be updated for the creator call leg and will be used for all webhooks related to the created conference.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Toggle background comfort noise.
     */
    public function withComfortNoise(bool $comfortNoise): self
    {
        $self = clone $this;
        $self['comfortNoise'] = $comfortNoise;

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
     * Time length (minutes) after which the conference will end.
     */
    public function withDurationMinutes(int $durationMinutes): self
    {
        $self = clone $this;
        $self['durationMinutes'] = $durationMinutes;

        return $self;
    }

    /**
     * The URL of a file to be played to participants joining the conference. The URL can point to either a WAV or MP3 file. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false".
     */
    public function withHoldAudioURL(string $holdAudioURL): self
    {
        $self = clone $this;
        $self['holdAudioURL'] = $holdAudioURL;

        return $self;
    }

    /**
     * The media_name of a file to be played to participants joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false".
     */
    public function withHoldMediaName(string $holdMediaName): self
    {
        $self = clone $this;
        $self['holdMediaName'] = $holdMediaName;

        return $self;
    }

    /**
     * The maximum number of active conference participants to allow. Must be between 2 and 800. Defaults to 250.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $self = clone $this;
        $self['maxParticipants'] = $maxParticipants;

        return $self;
    }

    /**
     * Sets the region where the conference data will be hosted. Defaults to the region defined in user's data locality settings (Europe or US).
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
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    public function withStartConferenceOnCreate(
        bool $startConferenceOnCreate
    ): self {
        $self = clone $this;
        $self['startConferenceOnCreate'] = $startConferenceOnCreate;

        return $self;
    }
}
