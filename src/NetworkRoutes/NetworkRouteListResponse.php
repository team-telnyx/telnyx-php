<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NetworkRouteShape from \Telnyx\NetworkRoutes\NetworkRoute
 * @phpstan-import-type NetappsCursorPaginationMetaShape from \Telnyx\NetworkRoutes\NetappsCursorPaginationMeta
 *
 * @phpstan-type NetworkRouteListResponseShape = array{
 *   data?: list<NetworkRoute|NetworkRouteShape>|null,
 *   meta?: null|NetappsCursorPaginationMeta|NetappsCursorPaginationMetaShape,
 * }
 */
final class NetworkRouteListResponse implements BaseModel
{
    /** @use SdkModel<NetworkRouteListResponseShape> */
    use SdkModel;

    /** @var list<NetworkRoute>|null $data */
    #[Optional(list: NetworkRoute::class)]
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
     * @param list<NetworkRoute|NetworkRouteShape>|null $data
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
     * @param list<NetworkRoute|NetworkRouteShape> $data
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
