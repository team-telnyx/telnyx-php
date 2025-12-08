<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams\Filter;

/**
 * Get an existing sub number order.
 *
 * @see Telnyx\Services\SubNumberOrdersService::retrieve()
 *
 * @phpstan-type SubNumberOrderRetrieveParamsShape = array{
 *   filter?: Filter|array{include_phone_numbers?: bool|null}
 * }
 */
final class SubNumberOrderRetrieveParams implements BaseModel
{
    /** @use SdkModel<SubNumberOrderRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers].
     */
    #[Optional]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{include_phone_numbers?: bool|null} $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers].
     *
     * @param Filter|array{include_phone_numbers?: bool|null} $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
