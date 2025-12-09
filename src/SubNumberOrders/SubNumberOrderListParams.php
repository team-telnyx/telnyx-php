<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Optional;
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
 *     countryCode?: string|null,
 *     orderRequestID?: string|null,
 *     phoneNumberType?: string|null,
 *     phoneNumbersCount?: int|null,
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
     * @param Filter|array{
     *   countryCode?: string|null,
     *   orderRequestID?: string|null,
     *   phoneNumberType?: string|null,
     *   phoneNumbersCount?: int|null,
     *   status?: string|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count].
     *
     * @param Filter|array{
     *   countryCode?: string|null,
     *   orderRequestID?: string|null,
     *   phoneNumberType?: string|null,
     *   phoneNumbersCount?: int|null,
     *   status?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
