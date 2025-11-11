<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngine;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Deepgram;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Google;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Telnyx;
use Telnyx\Core\Attributes\Api;
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
 * @see Telnyx\Calls\Actions->startTranscription
 *
 * @phpstan-type ActionStartTranscriptionParamsShape = array{
 *   client_state?: string,
 *   command_id?: string,
 *   transcription_engine?: TranscriptionEngine|value-of<TranscriptionEngine>,
 *   transcription_engine_config?: Google|Telnyx|Deepgram|TranscriptionEngineAConfig|TranscriptionEngineBConfig,
 *   transcription_tracks?: string,
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility.
     *
     * @var value-of<TranscriptionEngine>|null $transcription_engine
     */
    #[Api(enum: TranscriptionEngine::class, optional: true)]
    public ?string $transcription_engine;

    #[Api(union: TranscriptionEngineConfig::class, optional: true)]
    public Google|Telnyx|Deepgram|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcription_engine_config;

    /**
     * Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     */
    #[Api(optional: true)]
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
     */
    public static function with(
        ?string $client_state = null,
        ?string $command_id = null,
        TranscriptionEngine|string|null $transcription_engine = null,
        Google|Telnyx|Deepgram|TranscriptionEngineAConfig|TranscriptionEngineBConfig|null $transcription_engine_config = null,
        ?string $transcription_tracks = null,
    ): self {
        $obj = new self;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $transcription_engine && $obj['transcription_engine'] = $transcription_engine;
        null !== $transcription_engine_config && $obj->transcription_engine_config = $transcription_engine_config;
        null !== $transcription_tracks && $obj->transcription_tracks = $transcription_tracks;

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

    public function withTranscriptionEngineConfig(
        Google|Telnyx|Deepgram|TranscriptionEngineAConfig|TranscriptionEngineBConfig $transcriptionEngineConfig,
    ): self {
        $obj = clone $this;
        $obj->transcription_engine_config = $transcriptionEngineConfig;

        return $obj;
    }

    /**
     * Indicates which leg of the call will be transcribed. Use `inbound` for the leg that requested the transcription, `outbound` for the other leg, and `both` for both legs of the call. Will default to `inbound`.
     */
    public function withTranscriptionTracks(string $transcriptionTracks): self
    {
        $obj = clone $this;
        $obj->transcription_tracks = $transcriptionTracks;

        return $obj;
    }
}
