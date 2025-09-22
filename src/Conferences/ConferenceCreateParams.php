<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceCreateParams\BeepEnabled;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ConferenceCreateParams); // set properties as needed
 * $client->conferences->create(...$params->toArray());
 * ```
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
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->conferences->create(...$params->toArray());`
 *
 * @see Telnyx\Conferences->create
 *
 * @phpstan-type conference_create_params = array{
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
 *   startConferenceOnCreate?: bool,
 * }
 */
final class ConferenceCreateParams implements BaseModel
{
    /** @use SdkModel<conference_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier and token for controlling the call.
     */
    #[Api('call_control_id')]
    public string $callControlID;

    /**
     * Name of the conference.
     */
    #[Api]
    public string $name;

    /**
     * Whether a beep sound should be played when participants join and/or leave the conference.
     *
     * @var value-of<BeepEnabled>|null $beepEnabled
     */
    #[Api('beep_enabled', enum: BeepEnabled::class, optional: true)]
    public ?string $beepEnabled;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. The client_state will be updated for the creator call leg and will be used for all webhooks related to the created conference.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Toggle background comfort noise.
     */
    #[Api('comfort_noise', optional: true)]
    public ?bool $comfortNoise;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * Time length (minutes) after which the conference will end.
     */
    #[Api('duration_minutes', optional: true)]
    public ?int $durationMinutes;

    /**
     * The URL of a file to be played to participants joining the conference. The URL can point to either a WAV or MP3 file. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false".
     */
    #[Api('hold_audio_url', optional: true)]
    public ?string $holdAudioURL;

    /**
     * The media_name of a file to be played to participants joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false".
     */
    #[Api('hold_media_name', optional: true)]
    public ?string $holdMediaName;

    /**
     * The maximum number of active conference participants to allow. Must be between 2 and 800. Defaults to 250.
     */
    #[Api('max_participants', optional: true)]
    public ?int $maxParticipants;

    /**
     * Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     */
    #[Api('start_conference_on_create', optional: true)]
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
        ?bool $startConferenceOnCreate = null,
    ): self {
        $obj = new self;

        $obj->callControlID = $callControlID;
        $obj->name = $name;

        null !== $beepEnabled && $obj->beepEnabled = $beepEnabled instanceof BeepEnabled ? $beepEnabled->value : $beepEnabled;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $comfortNoise && $obj->comfortNoise = $comfortNoise;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $durationMinutes && $obj->durationMinutes = $durationMinutes;
        null !== $holdAudioURL && $obj->holdAudioURL = $holdAudioURL;
        null !== $holdMediaName && $obj->holdMediaName = $holdMediaName;
        null !== $maxParticipants && $obj->maxParticipants = $maxParticipants;
        null !== $startConferenceOnCreate && $obj->startConferenceOnCreate = $startConferenceOnCreate;

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
        $obj->beepEnabled = $beepEnabled instanceof BeepEnabled ? $beepEnabled->value : $beepEnabled;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. The client_state will be updated for the creator call leg and will be used for all webhooks related to the created conference.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Toggle background comfort noise.
     */
    public function withComfortNoise(bool $comfortNoise): self
    {
        $obj = clone $this;
        $obj->comfortNoise = $comfortNoise;

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
     * Time length (minutes) after which the conference will end.
     */
    public function withDurationMinutes(int $durationMinutes): self
    {
        $obj = clone $this;
        $obj->durationMinutes = $durationMinutes;

        return $obj;
    }

    /**
     * The URL of a file to be played to participants joining the conference. The URL can point to either a WAV or MP3 file. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false".
     */
    public function withHoldAudioURL(string $holdAudioURL): self
    {
        $obj = clone $this;
        $obj->holdAudioURL = $holdAudioURL;

        return $obj;
    }

    /**
     * The media_name of a file to be played to participants joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false".
     */
    public function withHoldMediaName(string $holdMediaName): self
    {
        $obj = clone $this;
        $obj->holdMediaName = $holdMediaName;

        return $obj;
    }

    /**
     * The maximum number of active conference participants to allow. Must be between 2 and 800. Defaults to 250.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $obj = clone $this;
        $obj->maxParticipants = $maxParticipants;

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
}
