<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\FaxListParams\Filter;
use Telnyx\Faxes\FaxListParams\Filter\CreatedAt;
use Telnyx\Faxes\FaxListParams\Filter\Direction;
use Telnyx\Faxes\FaxListParams\Filter\From;
use Telnyx\Faxes\FaxListParams\Filter\To;
use Telnyx\Faxes\FaxListParams\Page;

/**
 * View a list of faxes.
 *
 * @see Telnyx\Services\FaxesService::list()
 *
 * @phpstan-type FaxListParamsShape = array{
 *   filter?: Filter|array{
 *     createdAt?: CreatedAt|null,
 *     direction?: Direction|null,
 *     from?: From|null,
 *     to?: To|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class FaxListParams implements BaseModel
{
    /** @use SdkModel<FaxListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[size], page[number].
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
     *   createdAt?: CreatedAt|null,
     *   direction?: Direction|null,
     *   from?: From|null,
     *   to?: To|null,
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
     * Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq].
     *
     * @param Filter|array{
     *   createdAt?: CreatedAt|null,
     *   direction?: Direction|null,
     *   from?: From|null,
     *   to?: To|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[size], page[number].
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
