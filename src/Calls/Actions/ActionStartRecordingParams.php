<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartRecordingParams\Channels;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Format;
use Telnyx\Calls\Actions\ActionStartRecordingParams\RecordingTrack;
use Telnyx\Calls\Actions\ActionStartRecordingParams\TranscriptionLanguage;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Trim;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionStartRecordingParams); // set properties as needed
 * $client->calls.actions->startRecording(...$params->toArray());
 * ```
 * Start recording the call. Recording will stop on call hang-up, or can be initiated via the Stop Recording command.
 *
 * **Expected Webhooks (see [callback schema](https://developers.telnyx.com/api/call-control/start-call-record#callbacks) below):**
 *
 * - `call.recording.saved`
 * - `call.recording.transcription.saved`
 * - `call.recording.error`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->startRecording(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->startRecording
 *
 * @phpstan-type action_start_recording_params = array{
 *   channels: Channels|value-of<Channels>,
 *   format: Format|value-of<Format>,
 *   clientState?: string,
 *   commandID?: string,
 *   customFileName?: string,
 *   maxLength?: int,
 *   playBeep?: bool,
 *   recordingTrack?: RecordingTrack|value-of<RecordingTrack>,
 *   timeoutSecs?: int,
 *   transcription?: bool,
 *   transcriptionEngine?: string,
 *   transcriptionLanguage?: TranscriptionLanguage|value-of<TranscriptionLanguage>,
 *   transcriptionMaxSpeakerCount?: int,
 *   transcriptionMinSpeakerCount?: int,
 *   transcriptionProfanityFilter?: bool,
 *   transcriptionSpeakerDiarization?: bool,
 *   trim?: Trim|value-of<Trim>,
 * }
 */
final class ActionStartRecordingParams implements BaseModel
{
    /** @use SdkModel<action_start_recording_params> */
    use SdkModel;
    use SdkParams;

    /**
     * When `dual`, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B.
     *
     * @var value-of<Channels> $channels
     */
    #[Api(enum: Channels::class)]
    public string $channels;

    /**
     * The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     *
     * @var value-of<Format> $format
     */
    #[Api(enum: Format::class)]
    public string $format;

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
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Api('custom_file_name', optional: true)]
    public ?string $customFileName;

    /**
     * Defines the maximum length for the recording in seconds. The minimum value is 0. The maximum value is 14400. The default value is 0 (infinite).
     */
    #[Api('max_length', optional: true)]
    public ?int $maxLength;

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    #[Api('play_beep', optional: true)]
    public ?bool $playBeep;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordingTrack>|null $recordingTrack
     */
    #[Api('recording_track', enum: RecordingTrack::class, optional: true)]
    public ?string $recordingTrack;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Api('timeout_secs', optional: true)]
    public ?int $timeoutSecs;

    /**
     * Enable post recording transcription. The default value is false.
     */
    #[Api(optional: true)]
    public ?bool $transcription;

    /**
     * Engine to use for speech recognition. `A` - `Google`.
     */
    #[Api('transcription_engine', optional: true)]
    public ?string $transcriptionEngine;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<TranscriptionLanguage>|null $transcriptionLanguage
     */
    #[Api(
        'transcription_language',
        enum: TranscriptionLanguage::class,
        optional: true
    )]
    public ?string $transcriptionLanguage;

    /**
     * Defines maximum number of speakers in the conversation. Applies to `google` engine only.
     */
    #[Api('transcription_max_speaker_count', optional: true)]
    public ?int $transcriptionMaxSpeakerCount;

    /**
     * Defines minimum number of speakers in the conversation. Applies to `google` engine only.
     */
    #[Api('transcription_min_speaker_count', optional: true)]
    public ?int $transcriptionMinSpeakerCount;

    /**
     * Enables profanity_filter. Applies to `google` engine only.
     */
    #[Api('transcription_profanity_filter', optional: true)]
    public ?bool $transcriptionProfanityFilter;

    /**
     * Enables speaker diarization. Applies to `google` engine only.
     */
    #[Api('transcription_speaker_diarization', optional: true)]
    public ?bool $transcriptionSpeakerDiarization;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<Trim>|null $trim
     */
    #[Api(enum: Trim::class, optional: true)]
    public ?string $trim;

    /**
     * `new ActionStartRecordingParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionStartRecordingParams::with(channels: ..., format: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionStartRecordingParams)->withChannels(...)->withFormat(...)
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
     * @param Channels|value-of<Channels> $channels
     * @param Format|value-of<Format> $format
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     * @param TranscriptionLanguage|value-of<TranscriptionLanguage> $transcriptionLanguage
     * @param Trim|value-of<Trim> $trim
     */
    public static function with(
        Channels|string $channels,
        Format|string $format,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $customFileName = null,
        ?int $maxLength = null,
        ?bool $playBeep = null,
        RecordingTrack|string|null $recordingTrack = null,
        ?int $timeoutSecs = null,
        ?bool $transcription = null,
        ?string $transcriptionEngine = null,
        TranscriptionLanguage|string|null $transcriptionLanguage = null,
        ?int $transcriptionMaxSpeakerCount = null,
        ?int $transcriptionMinSpeakerCount = null,
        ?bool $transcriptionProfanityFilter = null,
        ?bool $transcriptionSpeakerDiarization = null,
        Trim|string|null $trim = null,
    ): self {
        $obj = new self;

        $obj->channels = $channels instanceof Channels ? $channels->value : $channels;
        $obj->format = $format instanceof Format ? $format->value : $format;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $customFileName && $obj->customFileName = $customFileName;
        null !== $maxLength && $obj->maxLength = $maxLength;
        null !== $playBeep && $obj->playBeep = $playBeep;
        null !== $recordingTrack && $obj->recordingTrack = $recordingTrack instanceof RecordingTrack ? $recordingTrack->value : $recordingTrack;
        null !== $timeoutSecs && $obj->timeoutSecs = $timeoutSecs;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $transcriptionEngine && $obj->transcriptionEngine = $transcriptionEngine;
        null !== $transcriptionLanguage && $obj->transcriptionLanguage = $transcriptionLanguage instanceof TranscriptionLanguage ? $transcriptionLanguage->value : $transcriptionLanguage;
        null !== $transcriptionMaxSpeakerCount && $obj->transcriptionMaxSpeakerCount = $transcriptionMaxSpeakerCount;
        null !== $transcriptionMinSpeakerCount && $obj->transcriptionMinSpeakerCount = $transcriptionMinSpeakerCount;
        null !== $transcriptionProfanityFilter && $obj->transcriptionProfanityFilter = $transcriptionProfanityFilter;
        null !== $transcriptionSpeakerDiarization && $obj->transcriptionSpeakerDiarization = $transcriptionSpeakerDiarization;
        null !== $trim && $obj->trim = $trim instanceof Trim ? $trim->value : $trim;

        return $obj;
    }

    /**
     * When `dual`, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B.
     *
     * @param Channels|value-of<Channels> $channels
     */
    public function withChannels(Channels|string $channels): self
    {
        $obj = clone $this;
        $obj->channels = $channels instanceof Channels ? $channels->value : $channels;

        return $obj;
    }

    /**
     * The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $obj = clone $this;
        $obj->format = $format instanceof Format ? $format->value : $format;

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
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withCustomFileName(string $customFileName): self
    {
        $obj = clone $this;
        $obj->customFileName = $customFileName;

        return $obj;
    }

    /**
     * Defines the maximum length for the recording in seconds. The minimum value is 0. The maximum value is 14400. The default value is 0 (infinite).
     */
    public function withMaxLength(int $maxLength): self
    {
        $obj = clone $this;
        $obj->maxLength = $maxLength;

        return $obj;
    }

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    public function withPlayBeep(bool $playBeep): self
    {
        $obj = clone $this;
        $obj->playBeep = $playBeep;

        return $obj;
    }

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack
    ): self {
        $obj = clone $this;
        $obj->recordingTrack = $recordingTrack instanceof RecordingTrack ? $recordingTrack->value : $recordingTrack;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj->timeoutSecs = $timeoutSecs;

        return $obj;
    }

    /**
     * Enable post recording transcription. The default value is false.
     */
    public function withTranscription(bool $transcription): self
    {
        $obj = clone $this;
        $obj->transcription = $transcription;

        return $obj;
    }

    /**
     * Engine to use for speech recognition. `A` - `Google`.
     */
    public function withTranscriptionEngine(string $transcriptionEngine): self
    {
        $obj = clone $this;
        $obj->transcriptionEngine = $transcriptionEngine;

        return $obj;
    }

    /**
     * Language to use for speech recognition.
     *
     * @param TranscriptionLanguage|value-of<TranscriptionLanguage> $transcriptionLanguage
     */
    public function withTranscriptionLanguage(
        TranscriptionLanguage|string $transcriptionLanguage
    ): self {
        $obj = clone $this;
        $obj->transcriptionLanguage = $transcriptionLanguage instanceof TranscriptionLanguage ? $transcriptionLanguage->value : $transcriptionLanguage;

        return $obj;
    }

    /**
     * Defines maximum number of speakers in the conversation. Applies to `google` engine only.
     */
    public function withTranscriptionMaxSpeakerCount(
        int $transcriptionMaxSpeakerCount
    ): self {
        $obj = clone $this;
        $obj->transcriptionMaxSpeakerCount = $transcriptionMaxSpeakerCount;

        return $obj;
    }

    /**
     * Defines minimum number of speakers in the conversation. Applies to `google` engine only.
     */
    public function withTranscriptionMinSpeakerCount(
        int $transcriptionMinSpeakerCount
    ): self {
        $obj = clone $this;
        $obj->transcriptionMinSpeakerCount = $transcriptionMinSpeakerCount;

        return $obj;
    }

    /**
     * Enables profanity_filter. Applies to `google` engine only.
     */
    public function withTranscriptionProfanityFilter(
        bool $transcriptionProfanityFilter
    ): self {
        $obj = clone $this;
        $obj->transcriptionProfanityFilter = $transcriptionProfanityFilter;

        return $obj;
    }

    /**
     * Enables speaker diarization. Applies to `google` engine only.
     */
    public function withTranscriptionSpeakerDiarization(
        bool $transcriptionSpeakerDiarization
    ): self {
        $obj = clone $this;
        $obj->transcriptionSpeakerDiarization = $transcriptionSpeakerDiarization;

        return $obj;
    }

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @param Trim|value-of<Trim> $trim
     */
    public function withTrim(Trim|string $trim): self
    {
        $obj = clone $this;
        $obj->trim = $trim instanceof Trim ? $trim->value : $trim;

        return $obj;
    }
}
