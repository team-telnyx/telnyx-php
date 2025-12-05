<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardOrders\SimCardOrderListParams\Filter;
use Telnyx\SimCardOrders\SimCardOrderListParams\Filter\Address;
use Telnyx\SimCardOrders\SimCardOrderListParams\Filter\Cost;
use Telnyx\SimCardOrders\SimCardOrderListParams\Page;

/**
 * Get all SIM card orders according to filters.
 *
 * @see Telnyx\Services\SimCardOrdersService::list()
 *
 * @phpstan-type SimCardOrderListParamsShape = array{
 *   filter?: Filter|array{
 *     address?: Address|null,
 *     cost?: Cost|null,
 *     created_at?: \DateTimeInterface|null,
 *     quantity?: int|null,
 *     updated_at?: \DateTimeInterface|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class SimCardOrderListParams implements BaseModel
{
    /** @use SdkModel<SimCardOrderListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for SIM card orders (deepObject style). Originally: filter[created_at], filter[updated_at], filter[quantity], filter[cost.amount], filter[cost.currency], filter[address.id], filter[address.street_address], filter[address.extended_address], filter[address.locality], filter[address.administrative_area], filter[address.country_code], filter[address.postal_code].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
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
     *   address?: Address|null,
     *   cost?: Cost|null,
     *   created_at?: \DateTimeInterface|null,
     *   quantity?: int|null,
     *   updated_at?: \DateTimeInterface|null,
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
     * Consolidated filter parameter for SIM card orders (deepObject style). Originally: filter[created_at], filter[updated_at], filter[quantity], filter[cost.amount], filter[cost.currency], filter[address.id], filter[address.street_address], filter[address.extended_address], filter[address.locality], filter[address.administrative_area], filter[address.country_code], filter[address.postal_code].
     *
     * @param Filter|array{
     *   address?: Address|null,
     *   cost?: Cost|null,
     *   created_at?: \DateTimeInterface|null,
     *   quantity?: int|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
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
