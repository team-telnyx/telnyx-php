<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List all Access IP Addresses.
 *
 * @see Telnyx\Services\AccessIPAddressService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter
 *
 * @phpstan-type AccessIPAddressListParamsShape = array{
 *   filter?: null|Filter|FilterShape, pageNumber?: int|null, pageSize?: int|null
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
     * Consolidated filter parameter (deepObject style). Originally: filter[ip_source], filter[ip_address], filter[created_at]. Supports complex bracket operations for dynamic filtering.
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
