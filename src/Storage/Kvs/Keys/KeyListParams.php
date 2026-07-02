<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs\Keys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists the keys in a namespace. Returns key names and metadata only, never values. Results are paginated with `limit` and an opaque `cursor`.
 *
 * @see Telnyx\Services\Storage\Kvs\KeysService::list()
 *
 * @phpstan-type KeyListParamsShape = array{
 *   cursor?: string|null, limit?: int|null, prefix?: string|null
 * }
 */
final class KeyListParams implements BaseModel
{
    /** @use SdkModel<KeyListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Opaque pagination cursor from a previous response's `meta.cursor`.
     */
    #[Optional]
    public ?string $cursor;

    /**
     * Maximum number of keys to return. Values above 1000 are treated as 1000.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Return only keys that start with this prefix.
     */
    #[Optional]
    public ?string $prefix;

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
        ?int $limit = null,
        ?string $prefix = null
    ): self {
        $self = new self;

        null !== $cursor && $self['cursor'] = $cursor;
        null !== $limit && $self['limit'] = $limit;
        null !== $prefix && $self['prefix'] = $prefix;

        return $self;
    }

    /**
     * Opaque pagination cursor from a previous response's `meta.cursor`.
     */
    public function withCursor(string $cursor): self
    {
        $self = clone $this;
        $self['cursor'] = $cursor;

        return $self;
    }

    /**
     * Maximum number of keys to return. Values above 1000 are treated as 1000.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Return only keys that start with this prefix.
     */
    public function withPrefix(string $prefix): self
    {
        $self = clone $this;
        $self['prefix'] = $prefix;

        return $self;
    }
}
