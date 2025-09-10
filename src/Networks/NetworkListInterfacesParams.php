<?php

declare(strict_types=1);

namespace Telnyx\Networks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\NetworkListInterfacesParams\Filter;
use Telnyx\Networks\NetworkListInterfacesParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new NetworkListInterfacesParams); // set properties as needed
 * $client->networks->listInterfaces(...$params->toArray());
 * ```
 * List all Interfaces for a Network.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->networks->listInterfaces(...$params->toArray());`
 *
 * @see Telnyx\Networks->listInterfaces
 *
 * @phpstan-type network_list_interfaces_params = array{
 *   filter?: Filter, page?: Page
 * }
 */
final class NetworkListInterfacesParams implements BaseModel
{
    /** @use SdkModel<network_list_interfaces_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status].
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
