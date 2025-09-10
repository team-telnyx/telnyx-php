<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PortingOrderRetrieveRequirementsParams); // set properties as needed
 * $client->portingOrders->retrieveRequirements(...$params->toArray());
 * ```
 * Returns a list of all requirements based on country/number type for this porting order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders->retrieveRequirements(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders->retrieveRequirements
 *
 * @phpstan-type porting_order_retrieve_requirements_params = array{page?: Page}
 */
final class PortingOrderRetrieveRequirementsParams implements BaseModel
{
    /** @use SdkModel<porting_order_retrieve_requirements_params> */
    use SdkModel;
    use SdkParams;

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
    public static function with(?Page $page = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;

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
