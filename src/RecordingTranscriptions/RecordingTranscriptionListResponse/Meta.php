<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse\Meta\Cursors;

/**
 * @phpstan-import-type CursorsShape from \Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse\Meta\Cursors
 *
 * @phpstan-type MetaShape = array{
 *   cursors?: null|Cursors|CursorsShape,
 *   next?: string|null,
 *   previous?: string|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Optional]
    public ?Cursors $cursors;

    /**
     * Path to next page.
     */
    #[Optional]
    public ?string $next;

    /**
     * Path to previous page.
     */
    #[Optional]
    public ?string $previous;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Cursors|CursorsShape|null $cursors
     */
    public static function with(
        Cursors|array|null $cursors = null,
        ?string $next = null,
        ?string $previous = null
    ): self {
        $self = new self;

        null !== $cursors && $self['cursors'] = $cursors;
        null !== $next && $self['next'] = $next;
        null !== $previous && $self['previous'] = $previous;

        return $self;
    }

    /**
     * @param Cursors|CursorsShape $cursors
     */
    public function withCursors(Cursors|array $cursors): self
    {
        $self = clone $this;
        $self['cursors'] = $cursors;

        return $self;
    }

    /**
     * Path to next page.
     */
    public function withNext(string $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }

    /**
     * Path to previous page.
     */
    public function withPrevious(string $previous): self
    {
        $self = clone $this;
        $self['previous'] = $previous;

        return $self;
    }
}
