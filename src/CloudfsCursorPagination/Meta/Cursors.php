<?php

declare(strict_types=1);

namespace Telnyx\CloudfsCursorPagination\Meta;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CursorsShape = array{after?: string|null}
 */
final class Cursors implements BaseModel
{
    /** @use SdkModel<CursorsShape> */
    use SdkModel;

    #[Optional]
    public ?string $after;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $after = null): self
    {
        $self = new self;

        null !== $after && $self['after'] = $after;

        return $self;
    }

    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }
}
