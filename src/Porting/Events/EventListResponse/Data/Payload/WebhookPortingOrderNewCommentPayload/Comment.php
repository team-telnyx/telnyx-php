<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderNewCommentPayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderNewCommentPayload\Comment\UserType;

/**
 * The comment that was added to the porting order.
 *
 * @phpstan-type CommentShape = array{
 *   id?: string|null,
 *   body?: string|null,
 *   insertedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
 *   userType?: value-of<UserType>|null,
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
    #[Optional('inserted_at')]
    public ?\DateTimeInterface $insertedAt;

    /**
     * Identifies the user that create the comment.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * Identifies the type of the user that created the comment.
     *
     * @var value-of<UserType>|null $userType
     */
    #[Optional('user_type', enum: UserType::class)]
    public ?string $userType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UserType|value-of<UserType> $userType
     */
    public static function with(
        ?string $id = null,
        ?string $body = null,
        ?\DateTimeInterface $insertedAt = null,
        ?string $userID = null,
        UserType|string|null $userType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $body && $obj['body'] = $body;
        null !== $insertedAt && $obj['insertedAt'] = $insertedAt;
        null !== $userID && $obj['userID'] = $userID;
        null !== $userType && $obj['userType'] = $userType;

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
        $obj['insertedAt'] = $insertedAt;

        return $obj;
    }

    /**
     * Identifies the user that create the comment.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

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
        $obj['userType'] = $userType;

        return $obj;
    }
}
