<?php

declare(strict_types=1);

namespace Telnyx\Tunnels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkRoutes\NetappsCursorPaginationMeta;

/**
 * @phpstan-import-type TunnelShape from \Telnyx\Tunnels\Tunnel
 * @phpstan-import-type NetappsCursorPaginationMetaShape from \Telnyx\NetworkRoutes\NetappsCursorPaginationMeta
 *
 * @phpstan-type TunnelListResponseShape = array{
 *   data?: list<Tunnel|TunnelShape>|null,
 *   meta?: null|NetappsCursorPaginationMeta|NetappsCursorPaginationMetaShape,
 * }
 */
final class TunnelListResponse implements BaseModel
{
    /** @use SdkModel<TunnelListResponseShape> */
    use SdkModel;

    /** @var list<Tunnel>|null $data */
    #[Optional(list: Tunnel::class)]
    public ?array $data;

    #[Optional]
    public ?NetappsCursorPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Tunnel|TunnelShape>|null $data
     * @param NetappsCursorPaginationMeta|NetappsCursorPaginationMetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        NetappsCursorPaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Tunnel|TunnelShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param NetappsCursorPaginationMeta|NetappsCursorPaginationMetaShape $meta
     */
    public function withMeta(NetappsCursorPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
