<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\Comments\CommentListParams\Filter;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CommentListParams); // set properties as needed
 * $client->comments->list(...$params->toArray());
 * ```
 * Retrieve all comments.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->comments->list(...$params->toArray());`
 *
 * @see Telnyx\Comments->list
 *
 * @phpstan-type comment_list_params = array{filter?: Filter}
 */
final class CommentListParams implements BaseModel
{
    /** @use SdkModel<comment_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
