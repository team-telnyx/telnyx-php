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
 *   pageNumber?: int,
 *   pageSize?: int,
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

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

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
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

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

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
