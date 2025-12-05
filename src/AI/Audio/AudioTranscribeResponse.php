<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio;

use Telnyx\AI\Audio\AudioTranscribeResponse\Segment;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AudioTranscribeResponseShape = array{
 *   text: string, duration?: float|null, segments?: list<Segment>|null
 * }
 */
final class AudioTranscribeResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AudioTranscribeResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The transcribed text for the audio file.
     */
    #[Api]
    public string $text;

    /**
     * The duration of the audio file in seconds. This is only included if `response_format` is set to `verbose_json`.
     */
    #[Api(optional: true)]
    public ?float $duration;

    /**
     * Segments of the transcribed text and their corresponding details. This is only included if `response_format` is set to `verbose_json`.
     *
     * @var list<Segment>|null $segments
     */
    #[Api(list: Segment::class, optional: true)]
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
     * @param list<Segment|array{
     *   id: float, end: float, start: float, text: string
     * }> $segments
     */
    public static function with(
        string $text,
        ?float $duration = null,
        ?array $segments = null
    ): self {
        $obj = new self;

        $obj['text'] = $text;

        null !== $duration && $obj['duration'] = $duration;
        null !== $segments && $obj['segments'] = $segments;

        return $obj;
    }

    /**
     * The transcribed text for the audio file.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }

    /**
     * The duration of the audio file in seconds. This is only included if `response_format` is set to `verbose_json`.
     */
    public function withDuration(float $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    /**
     * Segments of the transcribed text and their corresponding details. This is only included if `response_format` is set to `verbose_json`.
     *
     * @param list<Segment|array{
     *   id: float, end: float, start: float, text: string
     * }> $segments
     */
    public function withSegments(array $segments): self
    {
        $obj = clone $this;
        $obj['segments'] = $segments;

        return $obj;
    }
}
