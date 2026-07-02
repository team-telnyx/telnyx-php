<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs\Keys\KeyListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{cursor?: string|null, hasMore?: bool|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Opaque cursor for the next page; pass it back as the `cursor` query parameter. Omitted when there are no further results.
     */
    #[Optional]
    public ?string $cursor;

    /**
     * Whether more results are available on a following page.
     */
    #[Optional('has_more')]
    public ?bool $hasMore;

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
        ?string $cursor = null,
        ?bool $hasMore = null
    ): self {
        $self = new self;

        null !== $cursor && $self['cursor'] = $cursor;
        null !== $hasMore && $self['hasMore'] = $hasMore;

        return $self;
    }

    /**
     * Opaque cursor for the next page; pass it back as the `cursor` query parameter. Omitted when there are no further results.
     */
    public function withCursor(string $cursor): self
    {
        $self = clone $this;
        $self['cursor'] = $cursor;

        return $self;
    }

    /**
     * Whether more results are available on a following page.
     */
    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }
}
