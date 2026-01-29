<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent\Payload\Comment\UserType;

/**
 * The comment that was added to the porting order.
 *
 * @phpstan-type CommentShape = array{
 *   id?: string|null,
 *   body?: string|null,
 *   insertedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
 *   userType?: null|UserType|value-of<UserType>,
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
     * @param UserType|value-of<UserType>|null $userType
     */
    public static function with(
        ?string $id = null,
        ?string $body = null,
        ?\DateTimeInterface $insertedAt = null,
        ?string $userID = null,
        UserType|string|null $userType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $body && $self['body'] = $body;
        null !== $insertedAt && $self['insertedAt'] = $insertedAt;
        null !== $userID && $self['userID'] = $userID;
        null !== $userType && $self['userType'] = $userType;

        return $self;
    }

    /**
     * Identifies the comment.
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
    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the comment was created.
     */
    public function withInsertedAt(\DateTimeInterface $insertedAt): self
    {
        $self = clone $this;
        $self['insertedAt'] = $insertedAt;

        return $self;
    }

    /**
     * Identifies the user that create the comment.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Identifies the type of the user that created the comment.
     *
     * @param UserType|value-of<UserType> $userType
     */
    public function withUserType(UserType|string $userType): self
    {
        $self = clone $this;
        $self['userType'] = $userType;

        return $self;
    }
}
