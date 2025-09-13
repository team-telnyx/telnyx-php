<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngine;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type transcription_start_request = array{
 *   clientState?: string,
 *   commandID?: string,
 *   transcriptionEngine?: value-of<TranscriptionEngine>,
 *   transcriptionEngineConfig?: TranscriptionEngineAConfig|TranscriptionEngineBConfig,
 *   transcriptionTracks?: string,
 * }
 */
final class TranscriptionStartRequest implements BaseModel
{
    /** @use SdkModel<transcription_start_request> */
    use SdkModel;

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
     * Engine to use for speech recognition. `A` - `Google`, `B` - `Telnyx`.
     *
     * @var value-of<TranscriptionEngine>|null $transcriptionEngine
     */
    #[Api(
        'transcription_engine',
        enum: TranscriptionEngine::class,
        optional: true
    )]
    public ?string $transcriptionEngine;

    #[Api(
        'transcription_engine_config',
        union: TranscriptionEngineConfig::class,
        optional: true,
    )]
    public TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcriptionEngineConfig;

    /**
     * Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     */
    #[Api('transcription_tracks', optional: true)]
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
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcriptionEngineConfig = null,
        ?string $transcriptionTracks = null,
    ): self {
        $obj = new self;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $transcriptionEngine && $obj->transcriptionEngine = $transcriptionEngine instanceof TranscriptionEngine ? $transcriptionEngine->value : $transcriptionEngine;
        null !== $transcriptionEngineConfig && $obj->transcriptionEngineConfig = $transcriptionEngineConfig;
        null !== $transcriptionTracks && $obj->transcriptionTracks = $transcriptionTracks;

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
     * Engine to use for speech recognition. `A` - `Google`, `B` - `Telnyx`.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public function withTranscriptionEngine(
        TranscriptionEngine|string $transcriptionEngine
    ): self {
        $obj = clone $this;
        $obj->transcriptionEngine = $transcriptionEngine instanceof TranscriptionEngine ? $transcriptionEngine->value : $transcriptionEngine;

        return $obj;
    }

    public function withTranscriptionEngineConfig(
        TranscriptionEngineAConfig|TranscriptionEngineBConfig $transcriptionEngineConfig,
    ): self {
        $obj = clone $this;
        $obj->transcriptionEngineConfig = $transcriptionEngineConfig;

        return $obj;
    }

    /**
     * Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     */
    public function withTranscriptionTracks(string $transcriptionTracks): self
    {
        $obj = clone $this;
        $obj->transcriptionTracks = $transcriptionTracks;

        return $obj;
    }
}
