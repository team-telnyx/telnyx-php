<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs\CloudfListResponse\Meta;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Opaque cursors for the adjacent pages. Empty when there are no adjacent pages.
 *
 * @phpstan-type CursorsShape = array{after?: string|null, before?: string|null}
 */
final class Cursors implements BaseModel
{
    /** @use SdkModel<CursorsShape> */
    use SdkModel;

    /**
     * Cursor for the next page; pass it as `page[after]`. Omitted on the last page.
     */
    #[Optional]
    public ?string $after;

    /**
     * Cursor for the previous page; pass it as `page[before]`. Omitted on the first page.
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
     * Cursor for the next page; pass it as `page[after]`. Omitted on the last page.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Cursor for the previous page; pass it as `page[before]`. Omitted on the first page.
     */
    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }
}
