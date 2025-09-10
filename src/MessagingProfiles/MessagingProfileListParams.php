<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\MessagingProfileListParams\Filter;
use Telnyx\MessagingProfiles\MessagingProfileListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessagingProfileListParams); // set properties as needed
 * $client->messagingProfiles->list(...$params->toArray());
 * ```
 * List messaging profiles.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messagingProfiles->list(...$params->toArray());`
 *
 * @see Telnyx\MessagingProfiles->list
 *
 * @phpstan-type messaging_profile_list_params = array{
 *   filter?: Filter, page?: Page
 * }
 */
final class MessagingProfileListParams implements BaseModel
{
    /** @use SdkModel<messaging_profile_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[name].
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
     * Consolidated filter parameter (deepObject style). Originally: filter[name].
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
