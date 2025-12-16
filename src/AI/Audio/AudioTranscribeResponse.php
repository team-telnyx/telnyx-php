<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio;

use Telnyx\AI\Audio\AudioTranscribeResponse\Segment;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SegmentShape from \Telnyx\AI\Audio\AudioTranscribeResponse\Segment
 *
 * @phpstan-type AudioTranscribeResponseShape = array{
 *   text: string, duration?: float|null, segments?: list<SegmentShape>|null
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
     * The duration of the audio file in seconds. This is only included if `response_format` is set to `verbose_json`.
     */
    #[Optional]
    public ?float $duration;

    /**
     * Segments of the transcribed text and their corresponding details. This is only included if `response_format` is set to `verbose_json`.
     *
     * @var list<Segment>|null $segments
     */
    #[Optional(list: Segment::class)]
    public ?array $segments;

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
     * @param list<SegmentShape> $segments
     */
    public static function with(
        string $text,
        ?float $duration = null,
        ?array $segments = null
    ): self {
        $self = new self;

        $self['text'] = $text;

        null !== $duration && $self['duration'] = $duration;
        null !== $segments && $self['segments'] = $segments;

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
     * The duration of the audio file in seconds. This is only included if `response_format` is set to `verbose_json`.
     */
    public function withDuration(float $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * Segments of the transcribed text and their corresponding details. This is only included if `response_format` is set to `verbose_json`.
     *
     * @param list<SegmentShape> $segments
     */
    public function withSegments(array $segments): self
    {
        $self = clone $this;
        $self['segments'] = $segments;

        return $self;
    }
}
