<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession\Config;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Detection settings. Enabling audio or video detection is currently unsupported.
 *
 * @phpstan-type DeepfakeDetectionShape = array{audio: bool, video: bool}
 */
final class DeepfakeDetection implements BaseModel
{
    /** @use SdkModel<DeepfakeDetectionShape> */
    use SdkModel;

    #[Required]
    public bool $audio;

    #[Required]
    public bool $video;

    /**
     * `new DeepfakeDetection()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeepfakeDetection::with(audio: ..., video: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeepfakeDetection)->withAudio(...)->withVideo(...)
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
    public static function with(bool $audio, bool $video): self
    {
        $self = new self;

        $self['audio'] = $audio;
        $self['video'] = $video;

        return $self;
    }

    public function withAudio(bool $audio): self
    {
        $self = clone $this;
        $self['audio'] = $audio;

        return $self;
    }

    public function withVideo(bool $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}
