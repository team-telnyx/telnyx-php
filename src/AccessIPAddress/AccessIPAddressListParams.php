<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter;
use Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter\CreatedAt\DateRangeFilter;
use Telnyx\AccessIPAddress\AccessIPAddressListParams\Page;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List all Access IP Addresses.
 *
 * @see Telnyx\Services\AccessIPAddressService::list()
 *
 * @phpstan-type AccessIPAddressListParamsShape = array{
 *   filter?: Filter|array{
 *     createdAt?: null|\DateTimeInterface|DateRangeFilter,
 *     ipAddress?: string|null,
 *     ipSource?: string|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class AccessIPAddressListParams implements BaseModel
{
    /** @use SdkModel<AccessIPAddressListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[ip_source], filter[ip_address], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   createdAt?: \DateTimeInterface|DateRangeFilter|null,
     *   ipAddress?: string|null,
     *   ipSource?: string|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[ip_source], filter[ip_address], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     *
     * @param Filter|array{
     *   createdAt?: \DateTimeInterface|DateRangeFilter|null,
     *   ipAddress?: string|null,
     *   ipSource?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
