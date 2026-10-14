<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VisionToolParamsShape = array{maxFrameAgeSecs?: int|null}
 */
final class VisionToolParams implements BaseModel
{
    /** @use SdkModel<VisionToolParamsShape> */
    use SdkModel;

    /**
     * Frames received longer ago than this many seconds are not shown to the assistant, so it never describes a frozen or disconnected camera as live.
     */
    #[Optional('max_frame_age_secs')]
    public ?int $maxFrameAgeSecs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $maxFrameAgeSecs = null): self
    {
        $self = new self;

        null !== $maxFrameAgeSecs && $self['maxFrameAgeSecs'] = $maxFrameAgeSecs;

        return $self;
    }

    /**
     * Frames received longer ago than this many seconds are not shown to the assistant, so it never describes a frozen or disconnected camera as live.
     */
    public function withMaxFrameAgeSecs(int $maxFrameAgeSecs): self
    {
        $self = clone $this;
        $self['maxFrameAgeSecs'] = $maxFrameAgeSecs;

        return $self;
    }
}
