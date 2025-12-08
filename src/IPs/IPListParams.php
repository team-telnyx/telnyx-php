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
 *     connection_id?: string|null, ip_address?: string|null, port?: int|null
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
     *   connection_id?: string|null, ip_address?: string|null, port?: int|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[ip_address], filter[port].
     *
     * @param Filter|array{
     *   connection_id?: string|null, ip_address?: string|null, port?: int|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
