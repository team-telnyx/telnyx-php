<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams\Filter;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SubNumberOrderRetrieveParams); // set properties as needed
 * $client->subNumberOrders->retrieve(...$params->toArray());
 * ```
 * Get an existing sub number order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->subNumberOrders->retrieve(...$params->toArray());`
 *
 * @see Telnyx\SubNumberOrders->retrieve
 *
 * @phpstan-type sub_number_order_retrieve_params = array{filter?: Filter}
 */
final class SubNumberOrderRetrieveParams implements BaseModel
{
    /** @use SdkModel<sub_number_order_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
