<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Comments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CommentCreateParams); // set properties as needed
 * $client->portouts.comments->create(...$params->toArray());
 * ```
 * Creates a comment on a portout request.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portouts.comments->create(...$params->toArray());`
 *
 * @see Telnyx\Portouts\Comments->create
 *
 * @phpstan-type comment_create_params = array{body?: string}
 */
final class CommentCreateParams implements BaseModel
{
    /** @use SdkModel<comment_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Comment to post on this portout request.
     */
    #[Api(optional: true)]
    public ?string $body;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $body = null): self
    {
        $obj = new self;

        null !== $body && $obj->body = $body;

        return $obj;
    }

    /**
     * Comment to post on this portout request.
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
