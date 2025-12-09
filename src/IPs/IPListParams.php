<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IPs\IPListParams\Filter;
use Telnyx\IPs\IPListParams\Page;

/**
 * Get all IPs belonging to the user that match the given filters.
 *
 * @see Telnyx\Services\IPsService::list()
 *
 * @phpstan-type IPListParamsShape = array{
 *   filter?: Filter|array{
 *     connectionID?: string|null, ipAddress?: string|null, port?: int|null
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class IPListParams implements BaseModel
{
    /** @use SdkModel<IPListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
     *   connectionID?: string|null, ipAddress?: string|null, port?: int|null
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
     * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port].
     *
     * @param Filter|array{
     *   connectionID?: string|null, ipAddress?: string|null, port?: int|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
