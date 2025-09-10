<?php

declare(strict_types=1);

namespace Telnyx\RoomCompositions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter;
use Telnyx\RoomCompositions\RoomCompositionListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RoomCompositionListParams); // set properties as needed
 * $client->roomCompositions->list(...$params->toArray());
 * ```
 * View a list of room compositions.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->roomCompositions->list(...$params->toArray());`
 *
 * @see Telnyx\RoomCompositions->list
 *
 * @phpstan-type room_composition_list_params = array{filter?: Filter, page?: Page}
 */
final class RoomCompositionListParams implements BaseModel
{
    /** @use SdkModel<room_composition_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[session_id], filter[status].
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
     */
    public static function with(?Filter $filter = null, ?Page $page = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[session_id], filter[status].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
