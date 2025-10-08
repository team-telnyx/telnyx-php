<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventListParams\Filter;
use Telnyx\Portouts\Events\EventListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EventListParams); // set properties as needed
 * $client->portouts.events->list(...$params->toArray());
 * ```
 * Returns a list of all port-out events.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portouts.events->list(...$params->toArray());`
 *
 * @see Telnyx\Portouts\Events->list
 *
 * @phpstan-type event_list_params = array{filter?: Filter, page?: Page}
 */
final class EventListParams implements BaseModel
{
    /** @use SdkModel<event_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
