<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkRoutes\NetappsCursorPaginationMeta\Cursors;

/**
 * @phpstan-import-type CursorsShape from \Telnyx\NetworkRoutes\NetappsCursorPaginationMeta\Cursors
 *
 * @phpstan-type NetappsCursorPaginationMetaShape = array{
 *   cursors?: null|Cursors|CursorsShape,
 *   next?: string|null,
 *   previous?: string|null,
 * }
 */
final class NetappsCursorPaginationMeta implements BaseModel
{
    /** @use SdkModel<NetappsCursorPaginationMetaShape> */
    use SdkModel;

    /**
     * Opaque cursors. Absent keys mean there is no such page.
     */
    #[Optional]
    public ?Cursors $cursors;

    /**
     * The path of the next page, with the same query parameters. Absent on the last page.
     */
    #[Optional]
    public ?string $next;

    /**
     * The path of the previous page. Present when the request used `page[after]`.
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
     * Opaque cursors. Absent keys mean there is no such page.
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
     * The path of the next page, with the same query parameters. Absent on the last page.
     */
    public function withNext(string $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }

    /**
     * The path of the previous page. Present when the request used `page[after]`.
     */
    public function withPrevious(string $previous): self
    {
        $self = clone $this;
        $self['previous'] = $previous;

        return $self;
    }
}
