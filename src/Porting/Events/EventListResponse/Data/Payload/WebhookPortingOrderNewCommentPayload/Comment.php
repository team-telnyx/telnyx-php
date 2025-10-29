<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderNewCommentPayload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderNewCommentPayload\Comment\UserType;

/**
 * The comment that was added to the porting order.
 *
 * @phpstan-type CommentShape = array{
 *   id?: string,
 *   body?: string,
 *   insertedAt?: \DateTimeInterface,
 *   userID?: string,
 *   userType?: value-of<UserType>,
 * }
 */
final class Comment implements BaseModel
{
    /** @use SdkModel<CommentShape> */
    use SdkModel;

    /**
     * Identifies the comment.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The body of the comment.
     */
    #[Api(optional: true)]
    public ?string $body;

    /**
     * ISO 8601 formatted date indicating when the comment was created.
     */
    #[Api('inserted_at', optional: true)]
    public ?\DateTimeInterface $insertedAt;

    /**
     * Identifies the user that create the comment.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

    /**
     * Identifies the type of the user that created the comment.
     *
     * @var value-of<UserType>|null $userType
     */
    #[Api('user_type', enum: UserType::class, optional: true)]
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

        null !== $id && $obj->id = $id;
        null !== $body && $obj->body = $body;
        null !== $insertedAt && $obj->insertedAt = $insertedAt;
        null !== $userID && $obj->userID = $userID;
        null !== $userType && $obj['userType'] = $userType;

        return $obj;
    }

    /**
     * Identifies the comment.
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
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the comment was created.
     */
    public function withInsertedAt(\DateTimeInterface $insertedAt): self
    {
        $obj = clone $this;
        $obj->insertedAt = $insertedAt;

        return $obj;
    }

    /**
     * Identifies the user that create the comment.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

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
