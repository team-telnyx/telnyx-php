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
 * Start recording the call. Recording will stop on call hang-up, or can be initiated via the Stop Recording command.
 *
 * **Expected Webhooks:**
 *
 * - `call.recording.saved`
 * - `call.recording.transcription.saved`
 * - `call.recording.error`
 *
 * @see Telnyx\STAINLESS_FIXME_Calls\ActionsService::startRecording()
 *
 * @phpstan-type ActionStartRecordingParamsShape = array{
 *   channels: Channels|value-of<Channels>,
 *   format: Format|value-of<Format>,
 *   client_state?: string,
 *   command_id?: string,
 *   custom_file_name?: string,
 *   max_length?: int,
 *   play_beep?: bool,
 *   recording_track?: RecordingTrack|value-of<RecordingTrack>,
 *   timeout_secs?: int,
 *   transcription?: bool,
 *   transcription_engine?: string,
 *   transcription_language?: TranscriptionLanguage|value-of<TranscriptionLanguage>,
 *   transcription_max_speaker_count?: int,
 *   transcription_min_speaker_count?: int,
 *   transcription_profanity_filter?: bool,
 *   transcription_speaker_diarization?: bool,
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    #[Api(optional: true)]
    public ?string $custom_file_name;

    /**
     * Defines the maximum length for the recording in seconds. The minimum value is 0. The maximum value is 14400. The default value is 0 (infinite).
     */
    #[Api(optional: true)]
    public ?int $max_length;

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    #[Api(optional: true)]
    public ?bool $play_beep;

    /**
     * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
     *
     * @var value-of<RecordingTrack>|null $recording_track
     */
    #[Api(enum: RecordingTrack::class, optional: true)]
    public ?string $recording_track;

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    #[Api(optional: true)]
    public ?int $timeout_secs;

    /**
     * Enable post recording transcription. The default value is false.
     */
    #[Api(optional: true)]
    public ?bool $transcription;

    /**
     * Engine to use for speech recognition. `A` - `Google`.
     */
    #[Api(optional: true)]
    public ?string $transcription_engine;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<TranscriptionLanguage>|null $transcription_language
     */
    #[Api(enum: TranscriptionLanguage::class, optional: true)]
    public ?string $transcription_language;

    /**
     * Defines maximum number of speakers in the conversation. Applies to `google` engine only.
     */
    #[Api(optional: true)]
    public ?int $transcription_max_speaker_count;

    /**
     * Defines minimum number of speakers in the conversation. Applies to `google` engine only.
     */
    #[Api(optional: true)]
    public ?int $transcription_min_speaker_count;

    /**
     * Enables profanity_filter. Applies to `google` engine only.
     */
    #[Api(optional: true)]
    public ?bool $transcription_profanity_filter;

    /**
     * Enables speaker diarization. Applies to `google` engine only.
     */
    #[Api(optional: true)]
    public ?bool $transcription_speaker_diarization;

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
     * @param RecordingTrack|value-of<RecordingTrack> $recording_track
     * @param TranscriptionLanguage|value-of<TranscriptionLanguage> $transcription_language
     * @param Trim|value-of<Trim> $trim
     */
    public static function with(
        Channels|string $channels,
        Format|string $format,
        ?string $client_state = null,
        ?string $command_id = null,
        ?string $custom_file_name = null,
        ?int $max_length = null,
        ?bool $play_beep = null,
        RecordingTrack|string|null $recording_track = null,
        ?int $timeout_secs = null,
        ?bool $transcription = null,
        ?string $transcription_engine = null,
        TranscriptionLanguage|string|null $transcription_language = null,
        ?int $transcription_max_speaker_count = null,
        ?int $transcription_min_speaker_count = null,
        ?bool $transcription_profanity_filter = null,
        ?bool $transcription_speaker_diarization = null,
        Trim|string|null $trim = null,
    ): self {
        $obj = new self;

        $obj['channels'] = $channels;
        $obj['format'] = $format;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $custom_file_name && $obj->custom_file_name = $custom_file_name;
        null !== $max_length && $obj->max_length = $max_length;
        null !== $play_beep && $obj->play_beep = $play_beep;
        null !== $recording_track && $obj['recording_track'] = $recording_track;
        null !== $timeout_secs && $obj->timeout_secs = $timeout_secs;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $transcription_engine && $obj->transcription_engine = $transcription_engine;
        null !== $transcription_language && $obj['transcription_language'] = $transcription_language;
        null !== $transcription_max_speaker_count && $obj->transcription_max_speaker_count = $transcription_max_speaker_count;
        null !== $transcription_min_speaker_count && $obj->transcription_min_speaker_count = $transcription_min_speaker_count;
        null !== $transcription_profanity_filter && $obj->transcription_profanity_filter = $transcription_profanity_filter;
        null !== $transcription_speaker_diarization && $obj->transcription_speaker_diarization = $transcription_speaker_diarization;
        null !== $trim && $obj['trim'] = $trim;

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
        $obj['channels'] = $channels;

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
        $obj['format'] = $format;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

        return $obj;
    }

    /**
     * The custom recording file name to be used instead of the default `call_leg_id`. Telnyx will still add a Unix timestamp suffix.
     */
    public function withCustomFileName(string $customFileName): self
    {
        $obj = clone $this;
        $obj->custom_file_name = $customFileName;

        return $obj;
    }

    /**
     * Defines the maximum length for the recording in seconds. The minimum value is 0. The maximum value is 14400. The default value is 0 (infinite).
     */
    public function withMaxLength(int $maxLength): self
    {
        $obj = clone $this;
        $obj->max_length = $maxLength;

        return $obj;
    }

    /**
     * If enabled, a beep sound will be played at the start of a recording.
     */
    public function withPlayBeep(bool $playBeep): self
    {
        $obj = clone $this;
        $obj->play_beep = $playBeep;

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
        $obj['recording_track'] = $recordingTrack;

        return $obj;
    }

    /**
     * The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. Please note that call transcription is used to detect silence and the related charge will be applied. The minimum value is 0. The default value is 0 (infinite).
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj->timeout_secs = $timeoutSecs;

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
        $obj->transcription_engine = $transcriptionEngine;

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
        $obj['transcription_language'] = $transcriptionLanguage;

        return $obj;
    }

    /**
     * Defines maximum number of speakers in the conversation. Applies to `google` engine only.
     */
    public function withTranscriptionMaxSpeakerCount(
        int $transcriptionMaxSpeakerCount
    ): self {
        $obj = clone $this;
        $obj->transcription_max_speaker_count = $transcriptionMaxSpeakerCount;

        return $obj;
    }

    /**
     * Defines minimum number of speakers in the conversation. Applies to `google` engine only.
     */
    public function withTranscriptionMinSpeakerCount(
        int $transcriptionMinSpeakerCount
    ): self {
        $obj = clone $this;
        $obj->transcription_min_speaker_count = $transcriptionMinSpeakerCount;

        return $obj;
    }

    /**
     * Enables profanity_filter. Applies to `google` engine only.
     */
    public function withTranscriptionProfanityFilter(
        bool $transcriptionProfanityFilter
    ): self {
        $obj = clone $this;
        $obj->transcription_profanity_filter = $transcriptionProfanityFilter;

        return $obj;
    }

    /**
     * Enables speaker diarization. Applies to `google` engine only.
     */
    public function withTranscriptionSpeakerDiarization(
        bool $transcriptionSpeakerDiarization
    ): self {
        $obj = clone $this;
        $obj->transcription_speaker_diarization = $transcriptionSpeakerDiarization;

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
        $obj['trim'] = $trim;

        return $obj;
    }
}
