<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Engine-specific transcription settings for Conversation Relay. This accepts the same provider-specific options used by the Call Transcription Start command, such as `transcription_model`, without requiring the engine discriminator to be repeated inside this object. With Deepgram Flux (`deepgram/flux`), `interim_results`, `eot_threshold` and `eager_eot_threshold` control the interim prompts and the `eagerEndOfTurn` and `turnResumed` frames sent to your WebSocket server.
 *
 * @phpstan-type ConversationRelayTranscriptionEngineConfigShape = array{
 *   eagerEotThreshold?: float|null,
 *   eotThreshold?: float|null,
 *   interimResults?: bool|null,
 * }
 */
final class ConversationRelayTranscriptionEngineConfig implements BaseModel
{
    /** @use SdkModel<ConversationRelayTranscriptionEngineConfigShape> */
    use SdkModel;

    /**
     * Deepgram Flux: confidence at which an `eagerEndOfTurn` frame is sent before the final prompt, followed by `turnResumed` if the caller keeps talking. When omitted, these frames are not sent.
     */
    #[Optional('eager_eot_threshold')]
    public ?float $eagerEotThreshold;

    /**
     * Deepgram Flux: confidence required to end the caller's turn.
     */
    #[Optional('eot_threshold')]
    public ?float $eotThreshold;

    /**
     * Deepgram Flux: send interim transcripts as `prompt` frames with `last: false`.
     */
    #[Optional('interim_results')]
    public ?bool $interimResults;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?float $eagerEotThreshold = null,
        ?float $eotThreshold = null,
        ?bool $interimResults = null,
    ): self {
        $self = new self;

        null !== $eagerEotThreshold && $self['eagerEotThreshold'] = $eagerEotThreshold;
        null !== $eotThreshold && $self['eotThreshold'] = $eotThreshold;
        null !== $interimResults && $self['interimResults'] = $interimResults;

        return $self;
    }

    /**
     * Deepgram Flux: confidence at which an `eagerEndOfTurn` frame is sent before the final prompt, followed by `turnResumed` if the caller keeps talking. When omitted, these frames are not sent.
     */
    public function withEagerEotThreshold(float $eagerEotThreshold): self
    {
        $self = clone $this;
        $self['eagerEotThreshold'] = $eagerEotThreshold;

        return $self;
    }

    /**
     * Deepgram Flux: confidence required to end the caller's turn.
     */
    public function withEotThreshold(float $eotThreshold): self
    {
        $self = clone $this;
        $self['eotThreshold'] = $eotThreshold;

        return $self;
    }

    /**
     * Deepgram Flux: send interim transcripts as `prompt` frames with `last: false`.
     */
    public function withInterimResults(bool $interimResults): self
    {
        $self = clone $this;
        $self['interimResults'] = $interimResults;

        return $self;
    }
}
