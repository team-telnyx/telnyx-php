<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Comments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new comment for a porting order.
 *
 * @see Telnyx\Services\PortingOrders\CommentsService::create()
 *
 * @phpstan-type CommentCreateParamsShape = array{body?: string|null}
 */
final class CommentCreateParams implements BaseModel
{
    /** @use SdkModel<CommentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
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
        $self = new self;

        null !== $body && $self['body'] = $body;

        return $self;
    }

    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
