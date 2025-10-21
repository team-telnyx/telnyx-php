<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Comments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new comment for a porting order.
 *
 * @see Telnyx\PortingOrders\Comments->create
 *
 * @phpstan-type comment_create_params = array{body?: string}
 */
final class CommentCreateParams implements BaseModel
{
    /** @use SdkModel<comment_create_params> */
    use SdkModel;
    use SdkParams;

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

    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
