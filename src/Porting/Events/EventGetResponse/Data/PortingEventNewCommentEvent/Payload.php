<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent\Payload\Comment;

/**
 * The webhook payload for the porting_order.new_comment event.
 *
 * @phpstan-import-type CommentShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent\Payload\Comment
 *
 * @phpstan-type PayloadShape = array{
 *   comment?: null|Comment|CommentShape,
 *   portingOrderID?: string|null,
 *   supportKey?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * The comment that was added to the porting order.
     */
    #[Optional]
    public ?Comment $comment;

    /**
     * Identifies the porting order that the comment was added to.
     */
    #[Optional('porting_order_id')]
    public ?string $portingOrderID;

    /**
     * Identifies the support key associated with the porting order.
     */
    #[Optional('support_key')]
    public ?string $supportKey;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Comment|CommentShape|null $comment
     */
    public static function with(
        Comment|array|null $comment = null,
        ?string $portingOrderID = null,
        ?string $supportKey = null,
    ): self {
        $self = new self;

        null !== $comment && $self['comment'] = $comment;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;
        null !== $supportKey && $self['supportKey'] = $supportKey;

        return $self;
    }

    /**
     * The comment that was added to the porting order.
     *
     * @param Comment|CommentShape $comment
     */
    public function withComment(Comment|array $comment): self
    {
        $self = clone $this;
        $self['comment'] = $comment;

        return $self;
    }

    /**
     * Identifies the porting order that the comment was added to.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    /**
     * Identifies the support key associated with the porting order.
     */
    public function withSupportKey(string $supportKey): self
    {
        $self = clone $this;
        $self['supportKey'] = $supportKey;

        return $self;
    }
}
