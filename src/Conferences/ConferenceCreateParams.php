<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceCreateParams\BeepEnabled;
use Telnyx\Conferences\ConferenceCreateParams\Region;
use Telnyx\Core\Attributes\Api;
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
 * @see Telnyx\ConferencesService::create()
 *
 * @phpstan-type ConferenceCreateParamsShape = array{
 *   call_control_id: string,
 *   name: string,
 *   beep_enabled?: BeepEnabled|value-of<BeepEnabled>,
 *   client_state?: string,
 *   comfort_noise?: bool,
 *   command_id?: string,
 *   duration_minutes?: int,
 *   hold_audio_url?: string,
 *   hold_media_name?: string,
 *   max_participants?: int,
 *   region?: Region|value-of<Region>,
 *   start_conference_on_create?: bool,
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
    #[Api]
    public string $call_control_id;

    /**
     * Name of the conference.
     */
    #[Api]
    public string $name;

    /**
     * Whether a beep sound should be played when participants join and/or leave the conference.
     *
     * @var value-of<BeepEnabled>|null $beep_enabled
     */
    #[Api(enum: BeepEnabled::class, optional: true)]
    public ?string $beep_enabled;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. The client_state will be updated for the creator call leg and will be used for all webhooks related to the created conference.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Toggle background comfort noise.
     */
    #[Api(optional: true)]
    public ?bool $comfort_noise;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * Time length (minutes) after which the conference will end.
     */
    #[Api(optional: true)]
    public ?int $duration_minutes;

    /**
     * The URL of a file to be played to participants joining the conference. The URL can point to either a WAV or MP3 file. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false".
     */
    #[Api(optional: true)]
    public ?string $hold_audio_url;

    /**
     * The media_name of a file to be played to participants joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false".
     */
    #[Api(optional: true)]
    public ?string $hold_media_name;

    /**
     * The maximum number of active conference participants to allow. Must be between 2 and 800. Defaults to 250.
     */
    #[Api(optional: true)]
    public ?int $max_participants;

    /**
     * Sets the region where the conference data will be hosted. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Api(enum: Region::class, optional: true)]
    public ?string $region;

    /**
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    #[Api(optional: true)]
    public ?bool $start_conference_on_create;

    /**
     * `new ConferenceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceCreateParams::with(call_control_id: ..., name: ...)
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
     * @param BeepEnabled|value-of<BeepEnabled> $beep_enabled
     * @param Region|value-of<Region> $region
     */
    public static function with(
        string $call_control_id,
        string $name,
        BeepEnabled|string|null $beep_enabled = null,
        ?string $client_state = null,
        ?bool $comfort_noise = null,
        ?string $command_id = null,
        ?int $duration_minutes = null,
        ?string $hold_audio_url = null,
        ?string $hold_media_name = null,
        ?int $max_participants = null,
        Region|string|null $region = null,
        ?bool $start_conference_on_create = null,
    ): self {
        $obj = new self;

        $obj->call_control_id = $call_control_id;
        $obj->name = $name;

        null !== $beep_enabled && $obj['beep_enabled'] = $beep_enabled;
        null !== $client_state && $obj->client_state = $client_state;
        null !== $comfort_noise && $obj->comfort_noise = $comfort_noise;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $duration_minutes && $obj->duration_minutes = $duration_minutes;
        null !== $hold_audio_url && $obj->hold_audio_url = $hold_audio_url;
        null !== $hold_media_name && $obj->hold_media_name = $hold_media_name;
        null !== $max_participants && $obj->max_participants = $max_participants;
        null !== $region && $obj['region'] = $region;
        null !== $start_conference_on_create && $obj->start_conference_on_create = $start_conference_on_create;

        return $obj;
    }

    /**
     * Unique identifier and token for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->call_control_id = $callControlID;

        return $obj;
    }

    /**
     * Name of the conference.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Whether a beep sound should be played when participants join and/or leave the conference.
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
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. The client_state will be updated for the creator call leg and will be used for all webhooks related to the created conference.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Toggle background comfort noise.
     */
    public function withComfortNoise(bool $comfortNoise): self
    {
        $obj = clone $this;
        $obj->comfort_noise = $comfortNoise;

        return $obj;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

        return $obj;
    }

    /**
     * Time length (minutes) after which the conference will end.
     */
    public function withDurationMinutes(int $durationMinutes): self
    {
        $obj = clone $this;
        $obj->duration_minutes = $durationMinutes;

        return $obj;
    }

    /**
     * The URL of a file to be played to participants joining the conference. The URL can point to either a WAV or MP3 file. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false".
     */
    public function withHoldAudioURL(string $holdAudioURL): self
    {
        $obj = clone $this;
        $obj->hold_audio_url = $holdAudioURL;

        return $obj;
    }

    /**
     * The media_name of a file to be played to participants joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false".
     */
    public function withHoldMediaName(string $holdMediaName): self
    {
        $obj = clone $this;
        $obj->hold_media_name = $holdMediaName;

        return $obj;
    }

    /**
     * The maximum number of active conference participants to allow. Must be between 2 and 800. Defaults to 250.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $obj = clone $this;
        $obj->max_participants = $maxParticipants;

        return $obj;
    }

    /**
     * Sets the region where the conference data will be hosted. Defaults to the region defined in user's data locality settings (Europe or US).
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
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    public function withStartConferenceOnCreate(
        bool $startConferenceOnCreate
    ): self {
        $obj = clone $this;
        $obj->start_conference_on_create = $startConferenceOnCreate;

        return $obj;
    }
}
