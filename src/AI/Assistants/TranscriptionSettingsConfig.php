<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptionSettingsConfigShape = array{
 *   eagerEotThreshold?: float|null,
 *   endOfTurnConfidenceThreshold?: float|null,
 *   eotThreshold?: float|null,
 *   eotTimeoutMs?: int|null,
 *   keyterm?: string|null,
 *   maxTurnSilence?: int|null,
 *   minTurnSilence?: int|null,
 *   numerals?: bool|null,
 *   smartFormat?: bool|null,
 * }
 */
final class TranscriptionSettingsConfig implements BaseModel
{
    /** @use SdkModel<TranscriptionSettingsConfigShape> */
    use SdkModel;

    /**
     * Available only for deepgram/flux. Confidence threshold for eager end of turn detection. Must be lower than or equal to eot_threshold. Setting this equal to eot_threshold effectively disables eager end of turn.
     */
    #[Optional('eager_eot_threshold')]
    public ?float $eagerEotThreshold;

    /**
     * Available only for assemblyai/universal-streaming. Confidence level required to trigger an end of turn. Higher values require more certainty before ending a turn.
     */
    #[Optional('end_of_turn_confidence_threshold')]
    public ?float $endOfTurnConfidenceThreshold;

    /**
     * Available only for deepgram/flux. Confidence required to trigger an end of turn. Higher values = more reliable turn detection but slightly increased latency.
     */
    #[Optional('eot_threshold')]
    public ?float $eotThreshold;

    /**
     * Available only for deepgram/flux. Maximum milliseconds of silence before forcing an end of turn, regardless of confidence.
     */
    #[Optional('eot_timeout_ms')]
    public ?int $eotTimeoutMs;

    /**
     * Available only for deepgram/nova-3 and deepgram/flux. A comma-separated list of key terms to boost for recognition during transcription. Helps improve accuracy for domain-specific terminology, proper nouns, or uncommon words.
     */
    #[Optional]
    public ?string $keyterm;

    /**
     * Available only for assemblyai/universal-streaming. Maximum duration of silence in milliseconds before forcing an end of turn.
     */
    #[Optional('max_turn_silence')]
    public ?int $maxTurnSilence;

    /**
     * Available only for assemblyai/universal-streaming. Minimum duration of silence in milliseconds before a turn can end. Must be less than or equal to max_turn_silence.
     */
    #[Optional('min_turn_silence')]
    public ?int $minTurnSilence;

    #[Optional]
    public ?bool $numerals;

    #[Optional('smart_format')]
    public ?bool $smartFormat;

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
        ?float $endOfTurnConfidenceThreshold = null,
        ?float $eotThreshold = null,
        ?int $eotTimeoutMs = null,
        ?string $keyterm = null,
        ?int $maxTurnSilence = null,
        ?int $minTurnSilence = null,
        ?bool $numerals = null,
        ?bool $smartFormat = null,
    ): self {
        $self = new self;

        null !== $eagerEotThreshold && $self['eagerEotThreshold'] = $eagerEotThreshold;
        null !== $endOfTurnConfidenceThreshold && $self['endOfTurnConfidenceThreshold'] = $endOfTurnConfidenceThreshold;
        null !== $eotThreshold && $self['eotThreshold'] = $eotThreshold;
        null !== $eotTimeoutMs && $self['eotTimeoutMs'] = $eotTimeoutMs;
        null !== $keyterm && $self['keyterm'] = $keyterm;
        null !== $maxTurnSilence && $self['maxTurnSilence'] = $maxTurnSilence;
        null !== $minTurnSilence && $self['minTurnSilence'] = $minTurnSilence;
        null !== $numerals && $self['numerals'] = $numerals;
        null !== $smartFormat && $self['smartFormat'] = $smartFormat;

        return $self;
    }

    /**
     * Available only for deepgram/flux. Confidence threshold for eager end of turn detection. Must be lower than or equal to eot_threshold. Setting this equal to eot_threshold effectively disables eager end of turn.
     */
    public function withEagerEotThreshold(float $eagerEotThreshold): self
    {
        $self = clone $this;
        $self['eagerEotThreshold'] = $eagerEotThreshold;

        return $self;
    }

    /**
     * Available only for assemblyai/universal-streaming. Confidence level required to trigger an end of turn. Higher values require more certainty before ending a turn.
     */
    public function withEndOfTurnConfidenceThreshold(
        float $endOfTurnConfidenceThreshold
    ): self {
        $self = clone $this;
        $self['endOfTurnConfidenceThreshold'] = $endOfTurnConfidenceThreshold;

        return $self;
    }

    /**
     * Available only for deepgram/flux. Confidence required to trigger an end of turn. Higher values = more reliable turn detection but slightly increased latency.
     */
    public function withEotThreshold(float $eotThreshold): self
    {
        $self = clone $this;
        $self['eotThreshold'] = $eotThreshold;

        return $self;
    }

    /**
     * Available only for deepgram/flux. Maximum milliseconds of silence before forcing an end of turn, regardless of confidence.
     */
    public function withEotTimeoutMs(int $eotTimeoutMs): self
    {
        $self = clone $this;
        $self['eotTimeoutMs'] = $eotTimeoutMs;

        return $self;
    }

    /**
     * Available only for deepgram/nova-3 and deepgram/flux. A comma-separated list of key terms to boost for recognition during transcription. Helps improve accuracy for domain-specific terminology, proper nouns, or uncommon words.
     */
    public function withKeyterm(string $keyterm): self
    {
        $self = clone $this;
        $self['keyterm'] = $keyterm;

        return $self;
    }

    /**
     * Available only for assemblyai/universal-streaming. Maximum duration of silence in milliseconds before forcing an end of turn.
     */
    public function withMaxTurnSilence(int $maxTurnSilence): self
    {
        $self = clone $this;
        $self['maxTurnSilence'] = $maxTurnSilence;

        return $self;
    }

    /**
     * Available only for assemblyai/universal-streaming. Minimum duration of silence in milliseconds before a turn can end. Must be less than or equal to max_turn_silence.
     */
    public function withMinTurnSilence(int $minTurnSilence): self
    {
        $self = clone $this;
        $self['minTurnSilence'] = $minTurnSilence;

        return $self;
    }

    public function withNumerals(bool $numerals): self
    {
        $self = clone $this;
        $self['numerals'] = $numerals;

        return $self;
    }

    public function withSmartFormat(bool $smartFormat): self
    {
        $self = clone $this;
        $self['smartFormat'] = $smartFormat;

        return $self;
    }
}
