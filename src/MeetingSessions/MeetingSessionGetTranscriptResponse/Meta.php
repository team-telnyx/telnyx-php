<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{nextAfter: int|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Cursor to pass as `after` on the next request, or null when the response contains no segments.
     */
    #[Required('next_after')]
    public ?int $nextAfter;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(nextAfter: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)->withNextAfter(...)
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
    public static function with(?int $nextAfter): self
    {
        $self = new self;

        $self['nextAfter'] = $nextAfter;

        return $self;
    }

    /**
     * Cursor to pass as `after` on the next request, or null when the response contains no segments.
     */
    public function withNextAfter(?int $nextAfter): self
    {
        $self = clone $this;
        $self['nextAfter'] = $nextAfter;

        return $self;
    }
}
