<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\PortoutListParams\Filter;
use Telnyx\Portouts\PortoutListParams\Filter\InsertedAt;
use Telnyx\Portouts\PortoutListParams\Filter\PortedOutAt;
use Telnyx\Portouts\PortoutListParams\Filter\Status;
use Telnyx\Portouts\PortoutListParams\Filter\StatusIn;
use Telnyx\Portouts\PortoutListParams\Page;

/**
 * Returns the portout requests according to filters.
 *
 * @see Telnyx\Services\PortoutsService::list()
 *
 * @phpstan-type PortoutListParamsShape = array{
 *   filter?: Filter|array{
 *     carrier_name?: string|null,
 *     country_code?: string|null,
 *     country_code_in?: list<string>|null,
 *     foc_date?: \DateTimeInterface|null,
 *     inserted_at?: InsertedAt|null,
 *     phone_number?: string|null,
 *     pon?: string|null,
 *     ported_out_at?: PortedOutAt|null,
 *     spid?: string|null,
 *     status?: value-of<Status>|null,
 *     status_in?: list<value-of<StatusIn>>|null,
 *     support_key?: string|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class PortoutListParams implements BaseModel
{
    /** @use SdkModel<PortoutListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[carrier_name], filter[country_code], filter[country_code_in], filter[foc_date], filter[inserted_at], filter[phone_number], filter[pon], filter[ported_out_at], filter[spid], filter[status], filter[status_in], filter[support_key].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
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
     *   carrier_name?: string|null,
     *   country_code?: string|null,
     *   country_code_in?: list<string>|null,
     *   foc_date?: \DateTimeInterface|null,
     *   inserted_at?: InsertedAt|null,
     *   phone_number?: string|null,
     *   pon?: string|null,
     *   ported_out_at?: PortedOutAt|null,
     *   spid?: string|null,
     *   status?: value-of<Status>|null,
     *   status_in?: list<value-of<StatusIn>>|null,
     *   support_key?: string|null,
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
     * Consolidated filter parameter (deepObject style). Originally: filter[carrier_name], filter[country_code], filter[country_code_in], filter[foc_date], filter[inserted_at], filter[phone_number], filter[pon], filter[ported_out_at], filter[spid], filter[status], filter[status_in], filter[support_key].
     *
     * @param Filter|array{
     *   carrier_name?: string|null,
     *   country_code?: string|null,
     *   country_code_in?: list<string>|null,
     *   foc_date?: \DateTimeInterface|null,
     *   inserted_at?: InsertedAt|null,
     *   phone_number?: string|null,
     *   pon?: string|null,
     *   ported_out_at?: PortedOutAt|null,
     *   spid?: string|null,
     *   status?: value-of<Status>|null,
     *   status_in?: list<value-of<StatusIn>>|null,
     *   support_key?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
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
