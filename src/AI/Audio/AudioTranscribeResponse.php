<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio;

use Telnyx\AI\Audio\AudioTranscribeResponse\Segment;
use Telnyx\AI\Audio\AudioTranscribeResponse\Word;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response fields vary by model. `distil-whisper/distil-large-v2` returns `text`, `duration`, and `segments` in `verbose_json` mode. `openai/whisper-large-v3-turbo` returns `text` only. `deepgram/nova-3` returns `text` and, depending on `model_config`, may include `words` with per-word timestamps and speaker labels.
 *
 * @phpstan-import-type SegmentShape from \Telnyx\AI\Audio\AudioTranscribeResponse\Segment
 * @phpstan-import-type WordShape from \Telnyx\AI\Audio\AudioTranscribeResponse\Word
 *
 * @phpstan-type AudioTranscribeResponseShape = array{
 *   text: string,
 *   duration?: float|null,
 *   segments?: list<Segment|SegmentShape>|null,
 *   words?: list<Word|WordShape>|null,
 * }
 */
final class AudioTranscribeResponse implements BaseModel
{
    /** @use SdkModel<AudioTranscribeResponseShape> */
    use SdkModel;

    /**
     * The transcribed text for the audio file.
     */
    #[Required]
    public string $text;

    /**
     * The duration of the audio file in seconds. Returned by `distil-whisper/distil-large-v2` and `deepgram/nova-3` when `response_format` is `verbose_json`. Not returned by `openai/whisper-large-v3-turbo`.
     */
    #[Optional]
    public ?float $duration;

    /**
     * Segments of the transcribed text and their corresponding details. Returned by `distil-whisper/distil-large-v2` when `response_format` is `verbose_json`. Not returned by `openai/whisper-large-v3-turbo`.
     *
     * @var list<Segment>|null $segments
     */
    #[Optional(list: Segment::class)]
    public ?array $segments;

    /**
     * Word-level timestamps and optional speaker labels. Only returned by `deepgram/nova-3` when word-level output is enabled via `model_config`.
     *
     * @var list<Word>|null $words
     */
    #[Optional(list: Word::class)]
    public ?array $words;

    /**
     * `new AudioTranscribeResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudioTranscribeResponse::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudioTranscribeResponse)->withText(...)
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
     *
     * @param list<Segment|SegmentShape>|null $segments
     * @param list<Word|WordShape>|null $words
     */
    public static function with(
        string $text,
        ?float $duration = null,
        ?array $segments = null,
        ?array $words = null,
    ): self {
        $self = new self;

        $self['text'] = $text;

        null !== $duration && $self['duration'] = $duration;
        null !== $segments && $self['segments'] = $segments;
        null !== $words && $self['words'] = $words;

        return $self;
    }

    /**
     * The transcribed text for the audio file.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * The duration of the audio file in seconds. Returned by `distil-whisper/distil-large-v2` and `deepgram/nova-3` when `response_format` is `verbose_json`. Not returned by `openai/whisper-large-v3-turbo`.
     */
    public function withDuration(float $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * Segments of the transcribed text and their corresponding details. Returned by `distil-whisper/distil-large-v2` when `response_format` is `verbose_json`. Not returned by `openai/whisper-large-v3-turbo`.
     *
     * @param list<Segment|SegmentShape> $segments
     */
    public function withSegments(array $segments): self
    {
        $self = clone $this;
        $self['segments'] = $segments;

        return $self;
    }

    /**
     * Word-level timestamps and optional speaker labels. Only returned by `deepgram/nova-3` when word-level output is enabled via `model_config`.
     *
     * @param list<Word|WordShape> $words
     */
    public function withWords(array $words): self
    {
        $self = clone $this;
        $self['words'] = $words;

        return $self;
    }
}
