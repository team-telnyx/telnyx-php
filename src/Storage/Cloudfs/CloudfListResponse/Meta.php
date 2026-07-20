<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs\CloudfListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Cloudfs\CloudfListResponse\Meta\Cursors;

/**
 * @phpstan-import-type CursorsShape from \Telnyx\Storage\Cloudfs\CloudfListResponse\Meta\Cursors
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

    /**
     * Opaque cursors for the adjacent pages. Empty when there are no adjacent pages.
     */
    #[Optional]
    public ?Cursors $cursors;

    /**
     * Relative URL (path and query) of the next page. Omitted when there are no further results.
     */
    #[Optional]
    public ?string $next;

    /**
     * Relative URL (path and query) of the previous page. Omitted on the first page.
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
     * Opaque cursors for the adjacent pages. Empty when there are no adjacent pages.
     *
     * @param Cursors|CursorsShape $cursors
     */
    public function withCursors(Cursors|array $cursors): self
    {
        $self = clone $this;
        $self['cursors'] = $cursors;

        return $self;
    }

    /**
     * Relative URL (path and query) of the next page. Omitted when there are no further results.
     */
    public function withNext(string $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }

    /**
     * Relative URL (path and query) of the previous page. Omitted on the first page.
     */
    public function withPrevious(string $previous): self
    {
        $self = clone $this;
        $self['previous'] = $previous;

        return $self;
    }
}
