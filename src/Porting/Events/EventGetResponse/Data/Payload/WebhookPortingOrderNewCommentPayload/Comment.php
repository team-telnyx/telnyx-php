<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderNewCommentPayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderNewCommentPayload\Comment\UserType;

/**
 * The comment that was added to the porting order.
 *
 * @phpstan-type CommentShape = array{
 *   id?: string|null,
 *   body?: string|null,
 *   inserted_at?: \DateTimeInterface|null,
 *   user_id?: string|null,
 *   user_type?: value-of<UserType>|null,
 * }
 */
final class Comment implements BaseModel
{
    /** @use SdkModel<CommentShape> */
    use SdkModel;

    /**
     * Identifies the comment.
     */
    #[Optional]
    public ?string $id;

    /**
     * The body of the comment.
     */
    #[Optional]
    public ?string $body;

    /**
     * ISO 8601 formatted date indicating when the comment was created.
     */
    #[Optional]
    public ?\DateTimeInterface $inserted_at;

    /**
     * Identifies the user that create the comment.
     */
    #[Optional]
    public ?string $user_id;

    /**
     * Identifies the type of the user that created the comment.
     *
     * @var value-of<UserType>|null $user_type
     */
    #[Optional(enum: UserType::class)]
    public ?string $user_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UserType|value-of<UserType> $user_type
     */
    public static function with(
        ?string $id = null,
        ?string $body = null,
        ?\DateTimeInterface $inserted_at = null,
        ?string $user_id = null,
        UserType|string|null $user_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $body && $obj['body'] = $body;
        null !== $inserted_at && $obj['inserted_at'] = $inserted_at;
        null !== $user_id && $obj['user_id'] = $user_id;
        null !== $user_type && $obj['user_type'] = $user_type;

        return $obj;
    }

    /**
     * Identifies the comment.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The body of the comment.
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj['body'] = $body;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the comment was created.
     */
    public function withInsertedAt(\DateTimeInterface $insertedAt): self
    {
        $obj = clone $this;
        $obj['inserted_at'] = $insertedAt;

        return $obj;
    }

    /**
     * Identifies the user that create the comment.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }

    /**
     * Identifies the type of the user that created the comment.
     *
     * @param UserType|value-of<UserType> $userType
     */
    public function withUserType(UserType|string $userType): self
    {
        $obj = clone $this;
        $obj['user_type'] = $userType;

        return $obj;
    }
}
