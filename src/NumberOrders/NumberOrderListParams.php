<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderListParams\Filter;
use Telnyx\NumberOrders\NumberOrderListParams\Filter\CreatedAt;
use Telnyx\NumberOrders\NumberOrderListParams\Page;

/**
 * Get a paginated list of number orders.
 *
 * @see Telnyx\Services\NumberOrdersService::list()
 *
 * @phpstan-type NumberOrderListParamsShape = array{
 *   filter?: Filter|array{
 *     created_at?: CreatedAt|null,
 *     customer_reference?: string|null,
 *     phone_numbers_count?: string|null,
 *     requirements_met?: bool|null,
 *     status?: string|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class NumberOrderListParams implements BaseModel
{
    /** @use SdkModel<NumberOrderListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers_count], filter[customer_reference], filter[requirements_met].
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
     *
     * @param Filter|array{
     *   created_at?: CreatedAt|null,
     *   customer_reference?: string|null,
     *   phone_numbers_count?: string|null,
     *   requirements_met?: bool|null,
     *   status?: string|null,
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
     * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers_count], filter[customer_reference], filter[requirements_met].
     *
     * @param Filter|array{
     *   created_at?: CreatedAt|null,
     *   customer_reference?: string|null,
     *   phone_numbers_count?: string|null,
     *   requirements_met?: bool|null,
     *   status?: string|null,
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
