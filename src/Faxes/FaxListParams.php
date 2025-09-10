<?php

declare(strict_types=1);

namespace Telnyx\Faxes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\FaxListParams\Filter;
use Telnyx\Faxes\FaxListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FaxListParams); // set properties as needed
 * $client->faxes->list(...$params->toArray());
 * ```
 * View a list of faxes.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->faxes->list(...$params->toArray());`
 *
 * @see Telnyx\Faxes->list
 *
 * @phpstan-type fax_list_params = array{filter?: Filter, page?: Page}
 */
final class FaxListParams implements BaseModel
{
    /** @use SdkModel<fax_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[size], page[number].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
