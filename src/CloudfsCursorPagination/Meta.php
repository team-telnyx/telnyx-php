<?php

declare(strict_types=1);

namespace Telnyx\CloudfsCursorPagination;

use Telnyx\CloudfsCursorPagination\Meta\Cursors;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CursorsShape from \Telnyx\CloudfsCursorPagination\Meta\Cursors
 *
 * @phpstan-type MetaShape = array{cursors?: null|Cursors|CursorsShape}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Optional]
    public ?Cursors $cursors;

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
    public static function with(Cursors|array|null $cursors = null): self
    {
        $self = new self;

        null !== $cursors && $self['cursors'] = $cursors;

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
}
