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
 *   comment?: Comment|null,
 *   porting_order_id?: string|null,
 *   support_key?: string|null,
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
    #[Api(optional: true)]
    public ?string $porting_order_id;

    /**
     * Identifies the support key associated with the porting order.
     */
    #[Api(optional: true)]
    public ?string $support_key;

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
        ?string $porting_order_id = null,
        ?string $support_key = null,
    ): self {
        $obj = new self;

        null !== $comment && $obj->comment = $comment;
        null !== $porting_order_id && $obj->porting_order_id = $porting_order_id;
        null !== $support_key && $obj->support_key = $support_key;

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
        $obj->porting_order_id = $portingOrderID;

        return $obj;
    }

    /**
     * Identifies the support key associated with the porting order.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj->support_key = $supportKey;

        return $obj;
    }
}
