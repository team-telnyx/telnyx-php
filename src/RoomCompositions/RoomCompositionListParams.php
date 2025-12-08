<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter\DateCreatedAt;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter\Status;
use Telnyx\RoomCompositions\RoomCompositionListParams\Page;

/**
 * View a list of room compositions.
 *
 * @see Telnyx\Services\RoomCompositionsService::list()
 *
 * @phpstan-type RoomCompositionListParamsShape = array{
 *   filter?: Filter|array{
 *     date_created_at?: DateCreatedAt|null,
 *     session_id?: string|null,
 *     status?: value-of<Status>|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class RoomCompositionListParams implements BaseModel
{
    /** @use SdkModel<RoomCompositionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[session_id], filter[status].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
     *   date_created_at?: DateCreatedAt|null,
     *   session_id?: string|null,
     *   status?: value-of<Status>|null,
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
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[session_id], filter[status].
     *
     * @param Filter|array{
     *   date_created_at?: DateCreatedAt|null,
     *   session_id?: string|null,
     *   status?: value-of<Status>|null,
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
