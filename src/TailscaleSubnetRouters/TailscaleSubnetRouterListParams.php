<?php

declare(strict_types=1);

namespace Telnyx\TailscaleSubnetRouters;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams\Filter;

/**
 * Returns a paginated list of the Tailscale Subnet Routers on the account, with support for filtering by Network.
 *
 * @see Telnyx\Services\TailscaleSubnetRoutersService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams\Filter
 *
 * @phpstan-type TailscaleSubnetRouterListParamsShape = array{
 *   filter?: null|Filter|FilterShape, pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class TailscaleSubnetRouterListParams implements BaseModel
{
    /** @use SdkModel<TailscaleSubnetRouterListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[network_id].
     */
    #[Optional]
    public ?Filter $filter;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[network_id].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
