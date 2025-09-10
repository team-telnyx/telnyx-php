<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Page;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AccessIPRangeListParams); // set properties as needed
 * $client->accessIPRanges->list(...$params->toArray());
 * ```
 * List all Access IP Ranges.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->accessIPRanges->list(...$params->toArray());`
 *
 * @see Telnyx\AccessIPRanges->list
 *
 * @phpstan-type access_ip_range_list_params = array{filter?: Filter, page?: Page}
 */
final class AccessIPRangeListParams implements BaseModel
{
    /** @use SdkModel<access_ip_range_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[cidr_block], filter[cidr_block][startswith], filter[cidr_block][endswith], filter[cidr_block][contains], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null, ?Page $page = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[cidr_block], filter[cidr_block][startswith], filter[cidr_block][endswith], filter[cidr_block][contains], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
