<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngine;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Azure;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Azure\Region;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config\Language;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova3Config;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Google;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Google\Model;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Google\SpeechContext;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Telnyx;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Telnyx\TranscriptionModel;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptionStartRequestShape = array{
 *   client_state?: string|null,
 *   command_id?: string|null,
 *   transcription_engine?: value-of<TranscriptionEngine>|null,
 *   transcription_engine_config?: null|Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig,
 *   transcription_tracks?: string|null,
 * }
 */
final class TranscriptionStartRequest implements BaseModel
{
    /** @use SdkModel<TranscriptionStartRequestShape> */
    use SdkModel;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional]
    public ?string $command_id;

    /**
     * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility.
     *
     * @var value-of<TranscriptionEngine>|null $transcription_engine
     */
    #[Optional(enum: TranscriptionEngine::class)]
    public ?string $transcription_engine;

    #[Optional(union: TranscriptionEngineConfig::class)]
    public Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcription_engine_config;

    /**
     * Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     */
    #[Optional]
    public ?string $transcription_tracks;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcription_engine
     * @param Google|array{
     *   enable_speaker_diarization?: bool|null,
     *   hints?: list<string>|null,
     *   interim_results?: bool|null,
     *   language?: value-of<GoogleTranscriptionLanguage>|null,
     *   max_speaker_count?: int|null,
     *   min_speaker_count?: int|null,
     *   model?: value-of<Model>|null,
     *   profanity_filter?: bool|null,
     *   speech_context?: list<SpeechContext>|null,
     *   transcription_engine?: value-of<Google\TranscriptionEngine>|null,
     *   use_enhanced?: bool|null,
     * }|Telnyx|array{
     *   language?: value-of<TelnyxTranscriptionLanguage>|null,
     *   transcription_engine?: value-of<Telnyx\TranscriptionEngine>|null,
     *   transcription_model?: value-of<TranscriptionModel>|null,
     * }|DeepgramNova2Config|array{
     *   transcription_engine: 'Deepgram',
     *   transcription_model: value-of<DeepgramNova2Config\TranscriptionModel>,
     *   keywords_boosting?: array<string,float>|null,
     *   language?: value-of<Language>|null,
     * }|DeepgramNova3Config|array{
     *   transcription_engine: 'Deepgram',
     *   transcription_model: value-of<DeepgramNova3Config\TranscriptionModel>,
     *   keywords_boosting?: array<string,float>|null,
     *   language?: value-of<DeepgramNova3Config\Language>|null,
     * }|Azure|array{
     *   region: value-of<Region>,
     *   transcription_engine: 'Azure',
     *   api_key_ref?: string|null,
     *   language?: value-of<Azure\Language>|null,
     * }|TranscriptionEngineAConfig|array{
     *   enable_speaker_diarization?: bool|null,
     *   hints?: list<string>|null,
     *   interim_results?: bool|null,
     *   language?: value-of<GoogleTranscriptionLanguage>|null,
     *   max_speaker_count?: int|null,
     *   min_speaker_count?: int|null,
     *   model?: value-of<TranscriptionEngineAConfig\Model>|null,
     *   profanity_filter?: bool|null,
     *   speech_context?: list<TranscriptionEngineAConfig\SpeechContext>|null,
     *   transcription_engine?: value-of<TranscriptionEngineAConfig\TranscriptionEngine>|null,
     *   use_enhanced?: bool|null,
     * }|TranscriptionEngineBConfig|array{
     *   language?: value-of<TelnyxTranscriptionLanguage>|null,
     *   transcription_engine?: value-of<TranscriptionEngineBConfig\TranscriptionEngine>|null,
     *   transcription_model?: value-of<TranscriptionEngineBConfig\TranscriptionModel>|null,
     * } $transcription_engine_config
     */
    public static function with(
        ?string $client_state = null,
        ?string $command_id = null,
        TranscriptionEngine|string|null $transcription_engine = null,
        Google|array|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcription_engine_config = null,
        ?string $transcription_tracks = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $transcription_engine && $obj['transcription_engine'] = $transcription_engine;
        null !== $transcription_engine_config && $obj['transcription_engine_config'] = $transcription_engine_config;
        null !== $transcription_tracks && $obj['transcription_tracks'] = $transcription_tracks;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['command_id'] = $commandID;

        return $obj;
    }

    /**
     * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public function withTranscriptionEngine(
        TranscriptionEngine|string $transcriptionEngine
    ): self {
        $obj = clone $this;
        $obj['transcription_engine'] = $transcriptionEngine;

        return $obj;
    }

    /**
     * @param Google|array{
     *   enable_speaker_diarization?: bool|null,
     *   hints?: list<string>|null,
     *   interim_results?: bool|null,
     *   language?: value-of<GoogleTranscriptionLanguage>|null,
     *   max_speaker_count?: int|null,
     *   min_speaker_count?: int|null,
     *   model?: value-of<Model>|null,
     *   profanity_filter?: bool|null,
     *   speech_context?: list<SpeechContext>|null,
     *   transcription_engine?: value-of<Google\TranscriptionEngine>|null,
     *   use_enhanced?: bool|null,
     * }|Telnyx|array{
     *   language?: value-of<TelnyxTranscriptionLanguage>|null,
     *   transcription_engine?: value-of<Telnyx\TranscriptionEngine>|null,
     *   transcription_model?: value-of<TranscriptionModel>|null,
     * }|DeepgramNova2Config|array{
     *   transcription_engine: 'Deepgram',
     *   transcription_model: value-of<DeepgramNova2Config\TranscriptionModel>,
     *   keywords_boosting?: array<string,float>|null,
     *   language?: value-of<Language>|null,
     * }|DeepgramNova3Config|array{
     *   transcription_engine: 'Deepgram',
     *   transcription_model: value-of<DeepgramNova3Config\TranscriptionModel>,
     *   keywords_boosting?: array<string,float>|null,
     *   language?: value-of<DeepgramNova3Config\Language>|null,
     * }|Azure|array{
     *   region: value-of<Region>,
     *   transcription_engine: 'Azure',
     *   api_key_ref?: string|null,
     *   language?: value-of<Azure\Language>|null,
     * }|TranscriptionEngineAConfig|array{
     *   enable_speaker_diarization?: bool|null,
     *   hints?: list<string>|null,
     *   interim_results?: bool|null,
     *   language?: value-of<GoogleTranscriptionLanguage>|null,
     *   max_speaker_count?: int|null,
     *   min_speaker_count?: int|null,
     *   model?: value-of<TranscriptionEngineAConfig\Model>|null,
     *   profanity_filter?: bool|null,
     *   speech_context?: list<TranscriptionEngineAConfig\SpeechContext>|null,
     *   transcription_engine?: value-of<TranscriptionEngineAConfig\TranscriptionEngine>|null,
     *   use_enhanced?: bool|null,
     * }|TranscriptionEngineBConfig|array{
     *   language?: value-of<TelnyxTranscriptionLanguage>|null,
     *   transcription_engine?: value-of<TranscriptionEngineBConfig\TranscriptionEngine>|null,
     *   transcription_model?: value-of<TranscriptionEngineBConfig\TranscriptionModel>|null,
     * } $transcriptionEngineConfig
     */
    public function withTranscriptionEngineConfig(
        Google|array|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig $transcriptionEngineConfig,
    ): self {
        $obj = clone $this;
        $obj['transcription_engine_config'] = $transcriptionEngineConfig;

        return $obj;
    }

    /**
     * Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     */
    public function withTranscriptionTracks(string $transcriptionTracks): self
    {
        $obj = clone $this;
        $obj['transcription_tracks'] = $transcriptionTracks;

        return $obj;
    }
}
