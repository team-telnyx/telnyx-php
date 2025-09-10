<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Filter;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DynamicEmergencyAddressListParams); // set properties as needed
 * $client->dynamicEmergencyAddresses->list(...$params->toArray());
 * ```
 * Returns the dynamic emergency addresses according to filters.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->dynamicEmergencyAddresses->list(...$params->toArray());`
 *
 * @see Telnyx\DynamicEmergencyAddresses->list
 *
 * @phpstan-type dynamic_emergency_address_list_params = array{
 *   filter?: Filter, page?: Page
 * }
 */
final class DynamicEmergencyAddressListParams implements BaseModel
{
    /** @use SdkModel<dynamic_emergency_address_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
