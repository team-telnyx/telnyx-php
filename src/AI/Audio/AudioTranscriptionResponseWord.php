<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Word-level timing detail. Only present when using a `deepgram/*` model with `model_config` options that enable word timestamps.
 *
 * @phpstan-type AudioTranscriptionResponseWordShape = array{
 *   end: float,
 *   start: float,
 *   word: string,
 *   confidence?: float|null,
 *   punctuatedWord?: string|null,
 *   speaker?: int|null,
 *   speakerConfidence?: float|null,
 * }
 */
final class AudioTranscriptionResponseWord implements BaseModel
{
    /** @use SdkModel<AudioTranscriptionResponseWordShape> */
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
     * The transcribed word with punctuation and capitalisation applied. Only present when `punctuate` or `smart_format` is enabled via `model_config`.
     */
    #[Optional('punctuated_word')]
    public ?string $punctuatedWord;

    /**
     * Speaker index. Only present when diarization is enabled via `model_config`.
     */
    #[Optional]
    public ?int $speaker;

    /**
     * Confidence score for the speaker assignment (0.0 to 1.0). Only present when diarization is enabled via `model_config`.
     */
    #[Optional('speaker_confidence')]
    public ?float $speakerConfidence;

    /**
     * `new AudioTranscriptionResponseWord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudioTranscriptionResponseWord::with(end: ..., start: ..., word: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudioTranscriptionResponseWord)
     *   ->withEnd(...)
     *   ->withStart(...)
     *   ->withWord(...)
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
        ?string $punctuatedWord = null,
        ?int $speaker = null,
        ?float $speakerConfidence = null,
    ): self {
        $self = new self;

        $self['end'] = $end;
        $self['start'] = $start;
        $self['word'] = $word;

        null !== $confidence && $self['confidence'] = $confidence;
        null !== $punctuatedWord && $self['punctuatedWord'] = $punctuatedWord;
        null !== $speaker && $self['speaker'] = $speaker;
        null !== $speakerConfidence && $self['speakerConfidence'] = $speakerConfidence;

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
     * The transcribed word with punctuation and capitalisation applied. Only present when `punctuate` or `smart_format` is enabled via `model_config`.
     */
    public function withPunctuatedWord(string $punctuatedWord): self
    {
        $self = clone $this;
        $self['punctuatedWord'] = $punctuatedWord;

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

    /**
     * Confidence score for the speaker assignment (0.0 to 1.0). Only present when diarization is enabled via `model_config`.
     */
    public function withSpeakerConfidence(float $speakerConfidence): self
    {
        $self = clone $this;
        $self['speakerConfidence'] = $speakerConfidence;

        return $self;
    }
}
