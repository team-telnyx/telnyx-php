<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListResponse\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The webhook payload for the portout.new_comment event.
 *
 * @phpstan-type WebhookPortoutNewCommentPayloadShape = array{
 *   id?: string|null,
 *   comment?: string|null,
 *   portout_id?: string|null,
 *   user_id?: string|null,
 * }
 */
final class WebhookPortoutNewCommentPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortoutNewCommentPayloadShape> */
    use SdkModel;

    /**
     * Identifies the comment that was added to the port-out order.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The body of the comment.
     */
    #[Api(optional: true)]
    public ?string $comment;

    /**
     * Identifies the port-out order that the comment was added to.
     */
    #[Api(optional: true)]
    public ?string $portout_id;

    /**
     * Identifies the user that added the comment.
     */
    #[Api(optional: true)]
    public ?string $user_id;

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
        ?string $id = null,
        ?string $comment = null,
        ?string $portout_id = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $comment && $obj->comment = $comment;
        null !== $portout_id && $obj->portout_id = $portout_id;
        null !== $user_id && $obj->user_id = $user_id;

        return $obj;
    }

    /**
     * Identifies the comment that was added to the port-out order.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The body of the comment.
     */
    public function withComment(string $comment): self
    {
        $obj = clone $this;
        $obj->comment = $comment;

        return $obj;
    }

    /**
     * Identifies the port-out order that the comment was added to.
     */
    public function withPortoutID(string $portoutID): self
    {
        $obj = clone $this;
        $obj->portout_id = $portoutID;

        return $obj;
    }

    /**
     * Identifies the user that added the comment.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->user_id = $userID;

        return $obj;
    }
}
