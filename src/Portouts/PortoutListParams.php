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
 *     carrierName?: string|null,
 *     countryCode?: string|null,
 *     countryCodeIn?: list<string>|null,
 *     focDate?: \DateTimeInterface|null,
 *     insertedAt?: InsertedAt|null,
 *     phoneNumber?: string|null,
 *     pon?: string|null,
 *     portedOutAt?: PortedOutAt|null,
 *     spid?: string|null,
 *     status?: value-of<Status>|null,
 *     statusIn?: list<value-of<StatusIn>>|null,
 *     supportKey?: string|null,
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
     *   carrierName?: string|null,
     *   countryCode?: string|null,
     *   countryCodeIn?: list<string>|null,
     *   focDate?: \DateTimeInterface|null,
     *   insertedAt?: InsertedAt|null,
     *   phoneNumber?: string|null,
     *   pon?: string|null,
     *   portedOutAt?: PortedOutAt|null,
     *   spid?: string|null,
     *   status?: value-of<Status>|null,
     *   statusIn?: list<value-of<StatusIn>>|null,
     *   supportKey?: string|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[carrier_name], filter[country_code], filter[country_code_in], filter[foc_date], filter[inserted_at], filter[phone_number], filter[pon], filter[ported_out_at], filter[spid], filter[status], filter[status_in], filter[support_key].
     *
     * @param Filter|array{
     *   carrierName?: string|null,
     *   countryCode?: string|null,
     *   countryCodeIn?: list<string>|null,
     *   focDate?: \DateTimeInterface|null,
     *   insertedAt?: InsertedAt|null,
     *   phoneNumber?: string|null,
     *   pon?: string|null,
     *   portedOutAt?: PortedOutAt|null,
     *   spid?: string|null,
     *   status?: value-of<Status>|null,
     *   statusIn?: list<value-of<StatusIn>>|null,
     *   supportKey?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
