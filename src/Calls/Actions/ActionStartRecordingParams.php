<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartRecordingParams\Channels;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Format;
use Telnyx\Calls\Actions\ActionStartRecordingParams\RecordingTrack;
use Telnyx\Calls\Actions\ActionStartRecordingParams\TranscriptionLanguage;
use Telnyx\Calls\Actions\ActionStartRecordingParams\Trim;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start recording the call. Recording will stop on call hang-up, or can be initiated via the Stop Recording command.
 *
 * **Expected Webhooks:**
 *
 * - `call.recording.saved`
 * - `call.recording.transcription.saved`
 * - `call.recording.error`
 *
 * @see Telnyx\Services\Calls\ActionsService::startRecording()
 *
 * @phpstan-type ActionStartRecordingParamsShape = array{
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
    /** @use SdkModel<ActionStartRecordingParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * When `dual`, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B.
     *
     * @var value-of<Channels> $channels
     */
    #[Required(enum: Channels::class)]
    public string $channels;

    /**
     * The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     *
     * @var value-of<Format> $format
     */
    #[Required(enum: Format::class)]
    public string $format;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Optional('custom_file_name')]
    public ?string $customFileName;

    /**
     * Defines the maximum length for the recording in seconds. The minimum value is 0. The maximum value is 14400. The default value is 0 (infinite).
     */
    #[Optional('max_length')]
    public ?int $maxLength;

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    #[Optional('play_beep')]
    public ?bool $playBeep;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordingTrack>|null $recordingTrack
     */
    #[Optional('recording_track', enum: RecordingTrack::class)]
    public ?string $recordingTrack;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Optional('timeout_secs')]
    public ?int $timeoutSecs;

    /**
     * Enable post recording transcription. The default value is false.
     */
    #[Optional]
    public ?bool $transcription;

    /**
     * Engine to use for speech recognition. `A` - `Google`.
     */
    #[Optional('transcription_engine')]
    public ?string $transcriptionEngine;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<TranscriptionLanguage>|null $transcriptionLanguage
     */
    #[Optional('transcription_language', enum: TranscriptionLanguage::class)]
    public ?string $transcriptionLanguage;

    /**
     * Defines maximum number of speakers in the conversation. Applies to `google` engine only.
     */
    #[Optional('transcription_max_speaker_count')]
    public ?int $transcriptionMaxSpeakerCount;

    /**
     * Defines minimum number of speakers in the conversation. Applies to `google` engine only.
     */
    #[Optional('transcription_min_speaker_count')]
    public ?int $transcriptionMinSpeakerCount;

    /**
     * Enables profanity_filter. Applies to `google` engine only.
     */
    #[Optional('transcription_profanity_filter')]
    public ?bool $transcriptionProfanityFilter;

    /**
     * Enables speaker diarization. Applies to `google` engine only.
     */
    #[Optional('transcription_speaker_diarization')]
    public ?bool $transcriptionSpeakerDiarization;

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @var value-of<Trim>|null $trim
     */
    #[Optional(enum: Trim::class)]
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
        $self = new self;

        $self['channels'] = $channels;
        $self['format'] = $format;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $customFileName && $self['customFileName'] = $customFileName;
        null !== $maxLength && $self['maxLength'] = $maxLength;
        null !== $playBeep && $self['playBeep'] = $playBeep;
        null !== $recordingTrack && $self['recordingTrack'] = $recordingTrack;
        null !== $timeoutSecs && $self['timeoutSecs'] = $timeoutSecs;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $transcriptionEngine && $self['transcriptionEngine'] = $transcriptionEngine;
        null !== $transcriptionLanguage && $self['transcriptionLanguage'] = $transcriptionLanguage;
        null !== $transcriptionMaxSpeakerCount && $self['transcriptionMaxSpeakerCount'] = $transcriptionMaxSpeakerCount;
        null !== $transcriptionMinSpeakerCount && $self['transcriptionMinSpeakerCount'] = $transcriptionMinSpeakerCount;
        null !== $transcriptionProfanityFilter && $self['transcriptionProfanityFilter'] = $transcriptionProfanityFilter;
        null !== $transcriptionSpeakerDiarization && $self['transcriptionSpeakerDiarization'] = $transcriptionSpeakerDiarization;
        null !== $trim && $self['trim'] = $trim;

        return $self;
    }

    /**
     * When `dual`, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B.
     *
     * @param Channels|value-of<Channels> $channels
     */
    public function withChannels(Channels|string $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    /**
     * The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withCustomFileName(string $customFileName): self
    {
        $self = clone $this;
        $self['customFileName'] = $customFileName;

        return $self;
    }

    /**
     * Defines the maximum length for the recording in seconds. The minimum value is 0. The maximum value is 14400. The default value is 0 (infinite).
     */
    public function withMaxLength(int $maxLength): self
    {
        $self = clone $this;
        $self['maxLength'] = $maxLength;

        return $self;
    }

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    public function withPlayBeep(bool $playBeep): self
    {
        $self = clone $this;
        $self['playBeep'] = $playBeep;

        return $self;
    }

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack
     */
    public function withRecordingTrack(
        RecordingTrack|string $recordingTrack
    ): self {
        $self = clone $this;
        $self['recordingTrack'] = $recordingTrack;

        return $self;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $self = clone $this;
        $self['timeoutSecs'] = $timeoutSecs;

        return $self;
    }

    /**
     * Enable post recording transcription. The default value is false.
     */
    public function withTranscription(bool $transcription): self
    {
        $self = clone $this;
        $self['transcription'] = $transcription;

        return $self;
    }

    /**
     * Engine to use for speech recognition. `A` - `Google`.
     */
    public function withTranscriptionEngine(string $transcriptionEngine): self
    {
        $self = clone $this;
        $self['transcriptionEngine'] = $transcriptionEngine;

        return $self;
    }

    /**
     * Language to use for speech recognition.
     *
     * @param TranscriptionLanguage|value-of<TranscriptionLanguage> $transcriptionLanguage
     */
    public function withTranscriptionLanguage(
        TranscriptionLanguage|string $transcriptionLanguage
    ): self {
        $self = clone $this;
        $self['transcriptionLanguage'] = $transcriptionLanguage;

        return $self;
    }

    /**
     * Defines maximum number of speakers in the conversation. Applies to `google` engine only.
     */
    public function withTranscriptionMaxSpeakerCount(
        int $transcriptionMaxSpeakerCount
    ): self {
        $self = clone $this;
        $self['transcriptionMaxSpeakerCount'] = $transcriptionMaxSpeakerCount;

        return $self;
    }

    /**
     * Defines minimum number of speakers in the conversation. Applies to `google` engine only.
     */
    public function withTranscriptionMinSpeakerCount(
        int $transcriptionMinSpeakerCount
    ): self {
        $self = clone $this;
        $self['transcriptionMinSpeakerCount'] = $transcriptionMinSpeakerCount;

        return $self;
    }

    /**
     * Enables profanity_filter. Applies to `google` engine only.
     */
    public function withTranscriptionProfanityFilter(
        bool $transcriptionProfanityFilter
    ): self {
        $self = clone $this;
        $self['transcriptionProfanityFilter'] = $transcriptionProfanityFilter;

        return $self;
    }

    /**
     * Enables speaker diarization. Applies to `google` engine only.
     */
    public function withTranscriptionSpeakerDiarization(
        bool $transcriptionSpeakerDiarization
    ): self {
        $self = clone $this;
        $self['transcriptionSpeakerDiarization'] = $transcriptionSpeakerDiarization;

        return $self;
    }

    /**
     * When set to `trim-silence`, silence will be removed from the beginning and end of the recording.
     *
     * @param Trim|value-of<Trim> $trim
     */
    public function withTrim(Trim|string $trim): self
    {
        $self = clone $this;
        $self['trim'] = $trim;

        return $self;
    }
}
