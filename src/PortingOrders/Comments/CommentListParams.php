<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Comments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Comments\CommentListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CommentListParams); // set properties as needed
 * $client->portingOrders.comments->list(...$params->toArray());
 * ```
 * Returns a list of all comments of a porting order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.comments->list(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\Comments->list
 *
 * @phpstan-type comment_list_params = array{page?: Page}
 */
final class CommentListParams implements BaseModel
{
    /** @use SdkModel<comment_list_params> */
    use SdkModel;
    use SdkParams;

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
    public static function with(?Page $page = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;

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
