<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter;

/**
 * Get a paginated list of sub number orders.
 *
 * @see Telnyx\Services\SubNumberOrdersService::list()
 *
 * @phpstan-type SubNumberOrderListParamsShape = array{
 *   filter?: Filter|array{
 *     country_code?: string|null,
 *     order_request_id?: string|null,
 *     phone_number_type?: string|null,
 *     phone_numbers_count?: int|null,
 *     status?: string|null,
 *   },
 * }
 */
final class SubNumberOrderListParams implements BaseModel
{
    /** @use SdkModel<SubNumberOrderListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count].
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
     *
     * @param Filter|array{
     *   country_code?: string|null,
     *   order_request_id?: string|null,
     *   phone_number_type?: string|null,
     *   phone_numbers_count?: int|null,
     *   status?: string|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count].
     *
     * @param Filter|array{
     *   country_code?: string|null,
     *   order_request_id?: string|null,
     *   phone_number_type?: string|null,
     *   phone_numbers_count?: int|null,
     *   status?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
