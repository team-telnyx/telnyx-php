<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\InterruptionSettings\StartSpeakingPlan;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Endpointing thresholds used to decide when the user has finished speaking. Applies to non turn-taking transcription models. For `deepgram/flux`, use `transcription.settings.eot_threshold` / `eot_timeout_ms` / `eager_eot_threshold`.
 *
 * @phpstan-type TranscriptionEndpointingPlanShape = array{
 *   onNoPunctuationSeconds?: float|null,
 *   onNumberSeconds?: float|null,
 *   onPunctuationSeconds?: float|null,
 * }
 */
final class TranscriptionEndpointingPlan implements BaseModel
{
    /** @use SdkModel<TranscriptionEndpointingPlanShape> */
    use SdkModel;

    /**
     * Seconds to wait after the transcript ends without punctuation.
     */
    #[Optional('on_no_punctuation_seconds')]
    public ?float $onNoPunctuationSeconds;

    /**
     * Seconds to wait after the transcript ends with a number.
     */
    #[Optional('on_number_seconds')]
    public ?float $onNumberSeconds;

    /**
     * Seconds to wait after the transcript ends with punctuation.
     */
    #[Optional('on_punctuation_seconds')]
    public ?float $onPunctuationSeconds;

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
        ?float $onNoPunctuationSeconds = null,
        ?float $onNumberSeconds = null,
        ?float $onPunctuationSeconds = null,
    ): self {
        $self = new self;

        null !== $onNoPunctuationSeconds && $self['onNoPunctuationSeconds'] = $onNoPunctuationSeconds;
        null !== $onNumberSeconds && $self['onNumberSeconds'] = $onNumberSeconds;
        null !== $onPunctuationSeconds && $self['onPunctuationSeconds'] = $onPunctuationSeconds;

        return $self;
    }

    /**
     * Seconds to wait after the transcript ends without punctuation.
     */
    public function withOnNoPunctuationSeconds(
        float $onNoPunctuationSeconds
    ): self {
        $self = clone $this;
        $self['onNoPunctuationSeconds'] = $onNoPunctuationSeconds;

        return $self;
    }

    /**
     * Seconds to wait after the transcript ends with a number.
     */
    public function withOnNumberSeconds(float $onNumberSeconds): self
    {
        $self = clone $this;
        $self['onNumberSeconds'] = $onNumberSeconds;

        return $self;
    }

    /**
     * Seconds to wait after the transcript ends with punctuation.
     */
    public function withOnPunctuationSeconds(float $onPunctuationSeconds): self
    {
        $self = clone $this;
        $self['onPunctuationSeconds'] = $onPunctuationSeconds;

        return $self;
    }
}
