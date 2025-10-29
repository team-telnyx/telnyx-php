<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams\Filter;

/**
 * Get an existing sub number order.
 *
 * @see Telnyx\SubNumberOrders->retrieve
 *
 * @phpstan-type SubNumberOrderRetrieveParamsShape = array{filter?: Filter}
 */
final class SubNumberOrderRetrieveParams implements BaseModel
{
    /** @use SdkModel<SubNumberOrderRetrieveParamsShape> */
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
