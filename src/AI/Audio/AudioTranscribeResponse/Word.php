<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio\AudioTranscribeResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Word-level timing detail. Only present when using `deepgram/nova-3` with `model_config` options that enable word timestamps.
 *
 * @phpstan-type WordShape = array{
 *   end: float,
 *   start: float,
 *   word: string,
 *   confidence?: float|null,
 *   speaker?: int|null,
 * }
 */
final class Word implements BaseModel
{
    /** @use SdkModel<WordShape> */
    use SdkModel;

    /**
     * End time of the word in seconds.
     */
    #[Required]
    public float $end;

    /**
     * Start time of the word in seconds.
     */
    #[Required]
    public float $start;

    /**
     * The transcribed word.
     */
    #[Required]
    public string $word;

    /**
     * Confidence score for the word (0.0 to 1.0).
     */
    #[Optional]
    public ?float $confidence;

    /**
     * Speaker index. Only present when diarization is enabled via `model_config`.
     */
    #[Optional]
    public ?int $speaker;

    /**
     * `new Word()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Word::with(end: ..., start: ..., word: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Word)->withEnd(...)->withStart(...)->withWord(...)
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
     */
    public static function with(
        float $end,
        float $start,
        string $word,
        ?float $confidence = null,
        ?int $speaker = null,
    ): self {
        $self = new self;

        $self['end'] = $end;
        $self['start'] = $start;
        $self['word'] = $word;

        null !== $confidence && $self['confidence'] = $confidence;
        null !== $speaker && $self['speaker'] = $speaker;

        return $self;
    }

    /**
     * End time of the word in seconds.
     */
    public function withEnd(float $end): self
    {
        $self = clone $this;
        $self['end'] = $end;

        return $self;
    }

    /**
     * Start time of the word in seconds.
     */
    public function withStart(float $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }

    /**
     * The transcribed word.
     */
    public function withWord(string $word): self
    {
        $self = clone $this;
        $self['word'] = $word;

        return $self;
    }

    /**
     * Confidence score for the word (0.0 to 1.0).
     */
    public function withConfidence(float $confidence): self
    {
        $self = clone $this;
        $self['confidence'] = $confidence;

        return $self;
    }

    /**
     * Speaker index. Only present when diarization is enabled via `model_config`.
     */
    public function withSpeaker(int $speaker): self
    {
        $self = clone $this;
        $self['speaker'] = $speaker;

        return $self;
    }
}
