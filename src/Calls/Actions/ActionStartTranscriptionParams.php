<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngine;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\DeepgramNova2Config;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\DeepgramNova3Config;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start real-time transcription. Transcription will stop on call hang-up, or can be initiated via the Transcription stop command.
 *
 * **Expected Webhooks:**
 *
 * - `call.transcription`
 *
 * @see Telnyx\Services\Calls\ActionsService::startTranscription()
 *
 * @phpstan-import-type TranscriptionEngineConfigVariants from \Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig
 * @phpstan-import-type TranscriptionEngineConfigShape from \Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig
 *
 * @phpstan-type ActionStartTranscriptionParamsShape = array{
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   transcriptionEngine?: null|TranscriptionEngine|value-of<TranscriptionEngine>,
 *   transcriptionEngineConfig?: TranscriptionEngineConfigShape|null,
 *   transcriptionTracks?: string|null,
 * }
 */
final class ActionStartTranscriptionParams implements BaseModel
{
    /** @use SdkModel<ActionStartTranscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

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

    /** @var TranscriptionEngineConfigVariants|null $transcriptionEngineConfig */
    #[Optional(
        'transcription_engine_config',
        union: TranscriptionEngineConfig::class
    )]
    public TranscriptionEngineGoogleConfig|TranscriptionEngineTelnyxConfig|DeepgramNova2Config|DeepgramNova3Config|TranscriptionEngineAzureConfig|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcriptionEngineConfig;

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
     * @param TranscriptionEngine|value-of<TranscriptionEngine>|null $transcriptionEngine
     * @param TranscriptionEngineConfigShape|null $transcriptionEngineConfig
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        TranscriptionEngineGoogleConfig|array|TranscriptionEngineTelnyxConfig|DeepgramNova2Config|DeepgramNova3Config|TranscriptionEngineAzureConfig|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcriptionEngineConfig = null,
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
     * @param TranscriptionEngineConfigShape $transcriptionEngineConfig
     */
    public function withTranscriptionEngineConfig(
        TranscriptionEngineGoogleConfig|array|TranscriptionEngineTelnyxConfig|DeepgramNova2Config|DeepgramNova3Config|TranscriptionEngineAzureConfig|TranscriptionEngineAConfig|TranscriptionEngineBConfig $transcriptionEngineConfig,
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
