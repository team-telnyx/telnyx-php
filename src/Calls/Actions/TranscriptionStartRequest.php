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
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   transcriptionEngine?: value-of<TranscriptionEngine>|null,
 *   transcriptionEngineConfig?: null|Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig,
 *   transcriptionTracks?: string|null,
 * }
 */
final class TranscriptionStartRequest implements BaseModel
{
    /** @use SdkModel<TranscriptionStartRequestShape> */
    use SdkModel;

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
     * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility.
     *
     * @var value-of<TranscriptionEngine>|null $transcriptionEngine
     */
    #[Optional('transcription_engine', enum: TranscriptionEngine::class)]
    public ?string $transcriptionEngine;

    #[Optional(
        'transcription_engine_config',
        union: TranscriptionEngineConfig::class
    )]
    public Google|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcriptionEngineConfig;

    /**
     * Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     */
    #[Optional('transcription_tracks')]
    public ?string $transcriptionTracks;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     * @param Google|array{
     *   enableSpeakerDiarization?: bool|null,
     *   hints?: list<string>|null,
     *   interimResults?: bool|null,
     *   language?: value-of<GoogleTranscriptionLanguage>|null,
     *   maxSpeakerCount?: int|null,
     *   minSpeakerCount?: int|null,
     *   model?: value-of<Model>|null,
     *   profanityFilter?: bool|null,
     *   speechContext?: list<SpeechContext>|null,
     *   transcriptionEngine?: value-of<Google\TranscriptionEngine>|null,
     *   useEnhanced?: bool|null,
     * }|Telnyx|array{
     *   language?: value-of<TelnyxTranscriptionLanguage>|null,
     *   transcriptionEngine?: value-of<Telnyx\TranscriptionEngine>|null,
     *   transcriptionModel?: value-of<TranscriptionModel>|null,
     * }|DeepgramNova2Config|array{
     *   transcriptionEngine?: 'Deepgram',
     *   transcriptionModel: value-of<DeepgramNova2Config\TranscriptionModel>,
     *   keywordsBoosting?: array<string,float>|null,
     *   language?: value-of<Language>|null,
     * }|DeepgramNova3Config|array{
     *   transcriptionEngine?: 'Deepgram',
     *   transcriptionModel: value-of<DeepgramNova3Config\TranscriptionModel>,
     *   keywordsBoosting?: array<string,float>|null,
     *   language?: value-of<DeepgramNova3Config\Language>|null,
     * }|Azure|array{
     *   region: value-of<Region>,
     *   transcriptionEngine?: 'Azure',
     *   apiKeyRef?: string|null,
     *   language?: value-of<Azure\Language>|null,
     * }|TranscriptionEngineAConfig|array{
     *   enableSpeakerDiarization?: bool|null,
     *   hints?: list<string>|null,
     *   interimResults?: bool|null,
     *   language?: value-of<GoogleTranscriptionLanguage>|null,
     *   maxSpeakerCount?: int|null,
     *   minSpeakerCount?: int|null,
     *   model?: value-of<TranscriptionEngineAConfig\Model>|null,
     *   profanityFilter?: bool|null,
     *   speechContext?: list<TranscriptionEngineAConfig\SpeechContext>|null,
     *   transcriptionEngine?: value-of<TranscriptionEngineAConfig\TranscriptionEngine>|null,
     *   useEnhanced?: bool|null,
     * }|TranscriptionEngineBConfig|array{
     *   language?: value-of<TelnyxTranscriptionLanguage>|null,
     *   transcriptionEngine?: value-of<TranscriptionEngineBConfig\TranscriptionEngine>|null,
     *   transcriptionModel?: value-of<TranscriptionEngineBConfig\TranscriptionModel>|null,
     * } $transcriptionEngineConfig
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        Google|array|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcriptionEngineConfig = null,
        ?string $transcriptionTracks = null,
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $transcriptionEngine && $self['transcriptionEngine'] = $transcriptionEngine;
        null !== $transcriptionEngineConfig && $self['transcriptionEngineConfig'] = $transcriptionEngineConfig;
        null !== $transcriptionTracks && $self['transcriptionTracks'] = $transcriptionTracks;

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
     * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public function withTranscriptionEngine(
        TranscriptionEngine|string $transcriptionEngine
    ): self {
        $self = clone $this;
        $self['transcriptionEngine'] = $transcriptionEngine;

        return $self;
    }

    /**
     * @param Google|array{
     *   enableSpeakerDiarization?: bool|null,
     *   hints?: list<string>|null,
     *   interimResults?: bool|null,
     *   language?: value-of<GoogleTranscriptionLanguage>|null,
     *   maxSpeakerCount?: int|null,
     *   minSpeakerCount?: int|null,
     *   model?: value-of<Model>|null,
     *   profanityFilter?: bool|null,
     *   speechContext?: list<SpeechContext>|null,
     *   transcriptionEngine?: value-of<Google\TranscriptionEngine>|null,
     *   useEnhanced?: bool|null,
     * }|Telnyx|array{
     *   language?: value-of<TelnyxTranscriptionLanguage>|null,
     *   transcriptionEngine?: value-of<Telnyx\TranscriptionEngine>|null,
     *   transcriptionModel?: value-of<TranscriptionModel>|null,
     * }|DeepgramNova2Config|array{
     *   transcriptionEngine?: 'Deepgram',
     *   transcriptionModel: value-of<DeepgramNova2Config\TranscriptionModel>,
     *   keywordsBoosting?: array<string,float>|null,
     *   language?: value-of<Language>|null,
     * }|DeepgramNova3Config|array{
     *   transcriptionEngine?: 'Deepgram',
     *   transcriptionModel: value-of<DeepgramNova3Config\TranscriptionModel>,
     *   keywordsBoosting?: array<string,float>|null,
     *   language?: value-of<DeepgramNova3Config\Language>|null,
     * }|Azure|array{
     *   region: value-of<Region>,
     *   transcriptionEngine?: 'Azure',
     *   apiKeyRef?: string|null,
     *   language?: value-of<Azure\Language>|null,
     * }|TranscriptionEngineAConfig|array{
     *   enableSpeakerDiarization?: bool|null,
     *   hints?: list<string>|null,
     *   interimResults?: bool|null,
     *   language?: value-of<GoogleTranscriptionLanguage>|null,
     *   maxSpeakerCount?: int|null,
     *   minSpeakerCount?: int|null,
     *   model?: value-of<TranscriptionEngineAConfig\Model>|null,
     *   profanityFilter?: bool|null,
     *   speechContext?: list<TranscriptionEngineAConfig\SpeechContext>|null,
     *   transcriptionEngine?: value-of<TranscriptionEngineAConfig\TranscriptionEngine>|null,
     *   useEnhanced?: bool|null,
     * }|TranscriptionEngineBConfig|array{
     *   language?: value-of<TelnyxTranscriptionLanguage>|null,
     *   transcriptionEngine?: value-of<TranscriptionEngineBConfig\TranscriptionEngine>|null,
     *   transcriptionModel?: value-of<TranscriptionEngineBConfig\TranscriptionModel>|null,
     * } $transcriptionEngineConfig
     */
    public function withTranscriptionEngineConfig(
        Google|array|Telnyx|DeepgramNova2Config|DeepgramNova3Config|Azure|TranscriptionEngineAConfig|TranscriptionEngineBConfig $transcriptionEngineConfig,
    ): self {
        $self = clone $this;
        $self['transcriptionEngineConfig'] = $transcriptionEngineConfig;

        return $self;
    }

    /**
     * Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     */
    public function withTranscriptionTracks(string $transcriptionTracks): self
    {
        $self = clone $this;
        $self['transcriptionTracks'] = $transcriptionTracks;

        return $self;
    }
}
