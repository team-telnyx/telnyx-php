<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetappsCursorPaginationMeta;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Opaque cursors. Absent keys mean there is no such page.
 *
 * @phpstan-type CursorsShape = array{after?: string|null, before?: string|null}
 */
final class Cursors implements BaseModel
{
    /** @use SdkModel<CursorsShape> */
    use SdkModel;

    /**
     * Pass as `page[after]` to fetch the next page. Absent on the last page.
     */
    #[Optional]
    public ?string $after;

    /**
     * The cursor of the previous page. Present when the request used `page[after]`.
     */
    #[Optional]
    public ?string $before;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $after = null,
        ?string $before = null
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $before && $self['before'] = $before;

        return $self;
    }

    /**
     * Pass as `page[after]` to fetch the next page. Absent on the last page.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * The cursor of the previous page. Present when the request used `page[after]`.
     */
    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }
}
