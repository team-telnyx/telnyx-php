<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Comments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingOrdersCommentShape from \Telnyx\PortingOrders\Comments\PortingOrdersComment
 *
 * @phpstan-type CommentNewResponseShape = array{
 *   data?: null|PortingOrdersComment|PortingOrdersCommentShape
 * }
 */
final class CommentNewResponse implements BaseModel
{
    /** @use SdkModel<CommentNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingOrdersComment $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrdersComment|PortingOrdersCommentShape|null $data
     */
    public static function with(PortingOrdersComment|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingOrdersComment|PortingOrdersCommentShape $data
     */
    public function withData(PortingOrdersComment|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
