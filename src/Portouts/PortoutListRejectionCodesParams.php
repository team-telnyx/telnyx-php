<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\PortoutListRejectionCodesParams\Filter;

/**
 * Given a port-out ID, list rejection codes that are eligible for that port-out.
 *
 * @see Telnyx\Services\PortoutsService::listRejectionCodes()
 *
 * @phpstan-type PortoutListRejectionCodesParamsShape = array{filter?: Filter}
 */
final class PortoutListRejectionCodesParams implements BaseModel
{
    /** @use SdkModel<PortoutListRejectionCodesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
