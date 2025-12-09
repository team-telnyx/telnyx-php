<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventGetResponse\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The webhook payload for the portout.new_comment event.
 *
 * @phpstan-type WebhookPortoutNewCommentPayloadShape = array{
 *   id?: string|null,
 *   comment?: string|null,
 *   portoutID?: string|null,
 *   userID?: string|null,
 * }
 */
final class WebhookPortoutNewCommentPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortoutNewCommentPayloadShape> */
    use SdkModel;

    /**
     * Identifies the comment that was added to the port-out order.
     */
    #[Optional]
    public ?string $id;

    /**
     * The body of the comment.
     */
    #[Optional]
    public ?string $comment;

    /**
     * Identifies the port-out order that the comment was added to.
     */
    #[Optional('portout_id')]
    public ?string $portoutID;

    /**
     * Identifies the user that added the comment.
     */
    #[Optional('user_id')]
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $comment && $self['comment'] = $comment;
        null !== $portoutID && $self['portoutID'] = $portoutID;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * Identifies the comment that was added to the port-out order.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The body of the comment.
     */
    public function withComment(string $comment): self
    {
        $self = clone $this;
        $self['comment'] = $comment;

        return $self;
    }

    /**
     * Identifies the port-out order that the comment was added to.
     */
    public function withPortoutID(string $portoutID): self
    {
        $self = clone $this;
        $self['portoutID'] = $portoutID;

        return $self;
    }

    /**
     * Identifies the user that added the comment.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
