<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio\AudioTranscribeResponse;

use Telnyx\AI\Audio\AudioTranscriptionResponseWord;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AudioTranscriptionResponseWordShape from \Telnyx\AI\Audio\AudioTranscriptionResponseWord
 *
 * @phpstan-type SegmentShape = array{
 *   id: float,
 *   end: float,
 *   start: float,
 *   text: string,
 *   channel?: int|null,
 *   speakers?: list<int>|null,
 *   words?: list<AudioTranscriptionResponseWord|AudioTranscriptionResponseWordShape>|null,
 * }
 */
final class Segment implements BaseModel
{
    /** @use SdkModel<SegmentShape> */
    use SdkModel;

    /**
     * Unique identifier of the segment.
     */
    #[Required]
    public float $id;

    /**
     * End time of the segment in seconds.
     */
    #[Required]
    public float $end;

    /**
     * Start time of the segment in seconds.
     */
    #[Required]
    public float $start;

    /**
     * Text content of the segment.
     */
    #[Required]
    public string $text;

    /**
     * Zero-indexed audio channel of this segment. Returned by the `deepgram/*` models when `multichannel` is enabled via `model_config` and the file has more than one channel. Segments from all channels are merged in one list ordered by start time.
     */
    #[Optional]
    public ?int $channel;

    /**
     * Speaker indices heard in this segment. Returned by the `deepgram/*` models and `reson8/prerecorded` when `diarize` is enabled via `model_config`. With `multichannel`, speakers are numbered per channel from 0, so identify a speaker by (`channel`, speaker).
     *
     * @var list<int>|null $speakers
     */
    #[Optional(list: 'int')]
    public ?array $speakers;

    /**
     * Word-level timing detail for this segment. Returned by the `deepgram/*` models when word-level output is enabled via `model_config`, and by `reson8/prerecorded`.
     *
     * @var list<AudioTranscriptionResponseWord>|null $words
     */
    #[Optional(list: AudioTranscriptionResponseWord::class)]
    public ?array $words;

    /**
     * `new Segment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Segment::with(id: ..., end: ..., start: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Segment)->withID(...)->withEnd(...)->withStart(...)->withText(...)
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
     * @param list<int>|null $speakers
     * @param list<AudioTranscriptionResponseWord|AudioTranscriptionResponseWordShape>|null $words
     */
    public static function with(
        float $id,
        float $end,
        float $start,
        string $text,
        ?int $channel = null,
        ?array $speakers = null,
        ?array $words = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['end'] = $end;
        $self['start'] = $start;
        $self['text'] = $text;

        null !== $channel && $self['channel'] = $channel;
        null !== $speakers && $self['speakers'] = $speakers;
        null !== $words && $self['words'] = $words;

        return $self;
    }

    /**
     * Unique identifier of the segment.
     */
    public function withID(float $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * End time of the segment in seconds.
     */
    public function withEnd(float $end): self
    {
        $self = clone $this;
        $self['end'] = $end;

        return $self;
    }

    /**
     * Start time of the segment in seconds.
     */
    public function withStart(float $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }

    /**
     * Text content of the segment.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Zero-indexed audio channel of this segment. Returned by the `deepgram/*` models when `multichannel` is enabled via `model_config` and the file has more than one channel. Segments from all channels are merged in one list ordered by start time.
     */
    public function withChannel(int $channel): self
    {
        $self = clone $this;
        $self['channel'] = $channel;

        return $self;
    }

    /**
     * Speaker indices heard in this segment. Returned by the `deepgram/*` models and `reson8/prerecorded` when `diarize` is enabled via `model_config`. With `multichannel`, speakers are numbered per channel from 0, so identify a speaker by (`channel`, speaker).
     *
     * @param list<int> $speakers
     */
    public function withSpeakers(array $speakers): self
    {
        $self = clone $this;
        $self['speakers'] = $speakers;

        return $self;
    }

    /**
     * Word-level timing detail for this segment. Returned by the `deepgram/*` models when word-level output is enabled via `model_config`, and by `reson8/prerecorded`.
     *
     * @param list<AudioTranscriptionResponseWord|AudioTranscriptionResponseWordShape> $words
     */
    public function withWords(array $words): self
    {
        $self = clone $this;
        $self['words'] = $words;

        return $self;
    }
}
