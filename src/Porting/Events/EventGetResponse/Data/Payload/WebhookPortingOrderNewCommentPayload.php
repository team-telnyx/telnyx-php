<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderNewCommentPayload\Comment;

/**
 * The webhook payload for the porting_order.new_comment event.
 *
 * @phpstan-type WebhookPortingOrderNewCommentPayloadShape = array{
 *   comment?: Comment, portingOrderID?: string, supportKey?: string
 * }
 */
final class WebhookPortingOrderNewCommentPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortingOrderNewCommentPayloadShape> */
    use SdkModel;

    /**
     * The comment that was added to the porting order.
     */
    #[Api(optional: true)]
    public ?Comment $comment;

    /**
     * Identifies the porting order that the comment was added to.
     */
    #[Api('porting_order_id', optional: true)]
    public ?string $portingOrderID;

    /**
     * Identifies the support key associated with the porting order.
     */
    #[Api('support_key', optional: true)]
    public ?string $supportKey;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?Comment $comment = null,
        ?string $portingOrderID = null,
        ?string $supportKey = null,
    ): self {
        $obj = new self;

        null !== $comment && $obj->comment = $comment;
        null !== $portingOrderID && $obj->portingOrderID = $portingOrderID;
        null !== $supportKey && $obj->supportKey = $supportKey;

        return $obj;
    }

    /**
     * The comment that was added to the porting order.
     */
    public function withComment(Comment $comment): self
    {
        $obj = clone $this;
        $obj->comment = $comment;

        return $obj;
    }

    /**
     * Identifies the porting order that the comment was added to.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the support key associated with the porting order.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj->supportKey = $supportKey;

        return $obj;
    }
}
