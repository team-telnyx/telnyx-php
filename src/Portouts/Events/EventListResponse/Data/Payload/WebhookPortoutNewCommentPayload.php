<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The webhook payload for the portout.new_comment event.
 *
 * @phpstan-type webhook_portout_new_comment_payload = array{
 *   id?: string, comment?: string, portoutID?: string, userID?: string
 * }
 */
final class WebhookPortoutNewCommentPayload implements BaseModel
{
    /** @use SdkModel<webhook_portout_new_comment_payload> */
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
    #[Api('portout_id', optional: true)]
    public ?string $portoutID;

    /**
     * Identifies the user that added the comment.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

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
        ?string $portoutID = null,
        ?string $userID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $comment && $obj->comment = $comment;
        null !== $portoutID && $obj->portoutID = $portoutID;
        null !== $userID && $obj->userID = $userID;

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
        $obj->portoutID = $portoutID;

        return $obj;
    }

    /**
     * Identifies the user that added the comment.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
