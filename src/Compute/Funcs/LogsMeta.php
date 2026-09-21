<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LogsMetaShape = array{hasMore?: bool|null, partial?: bool|null}
 */
final class LogsMeta implements BaseModel
{
    /** @use SdkModel<LogsMetaShape> */
    use SdkModel;

    #[Optional('has_more')]
    public ?bool $hasMore;

    #[Optional]
    public ?bool $partial;

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
        ?bool $hasMore = null,
        ?bool $partial = null
    ): self {
        $self = new self;

        null !== $hasMore && $self['hasMore'] = $hasMore;
        null !== $partial && $self['partial'] = $partial;

        return $self;
    }

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    public function withPartial(bool $partial): self
    {
        $self = clone $this;
        $self['partial'] = $partial;

        return $self;
    }
}
