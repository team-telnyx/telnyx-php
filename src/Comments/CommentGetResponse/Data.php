<?php

declare(strict_types=1);

namespace Telnyx\Comments\CommentGetResponse;

use Telnyx\Comments\CommentGetResponse\Data\CommenterType;
use Telnyx\Comments\CommentGetResponse\Data\CommentRecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   body?: string|null,
 *   commentRecordID?: string|null,
 *   commentRecordType?: null|CommentRecordType|value-of<CommentRecordType>,
 *   commenter?: string|null,
 *   commenterType?: null|CommenterType|value-of<CommenterType>,
 *   createdAt?: \DateTimeInterface|null,
 *   readAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $body;

    #[Optional('comment_record_id')]
    public ?string $commentRecordID;

    /** @var value-of<CommentRecordType>|null $commentRecordType */
    #[Optional('comment_record_type', enum: CommentRecordType::class)]
    public ?string $commentRecordType;

    #[Optional]
    public ?string $commenter;

    /** @var value-of<CommenterType>|null $commenterType */
    #[Optional('commenter_type', enum: CommenterType::class)]
    public ?string $commenterType;

    /**
     * An ISO 8901 datetime string denoting when the comment was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * An ISO 8901 datetime string for when the comment was read.
     */
    #[Optional('read_at')]
    public ?\DateTimeInterface $readAt;

    /**
     * An ISO 8901 datetime string for when the comment was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CommentRecordType|value-of<CommentRecordType> $commentRecordType
     * @param CommenterType|value-of<CommenterType> $commenterType
     */
    public static function with(
        ?string $id = null,
        ?string $body = null,
        ?string $commentRecordID = null,
        CommentRecordType|string|null $commentRecordType = null,
        ?string $commenter = null,
        CommenterType|string|null $commenterType = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $readAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $body && $self['body'] = $body;
        null !== $commentRecordID && $self['commentRecordID'] = $commentRecordID;
        null !== $commentRecordType && $self['commentRecordType'] = $commentRecordType;
        null !== $commenter && $self['commenter'] = $commenter;
        null !== $commenterType && $self['commenterType'] = $commenterType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $readAt && $self['readAt'] = $readAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    public function withCommentRecordID(string $commentRecordID): self
    {
        $self = clone $this;
        $self['commentRecordID'] = $commentRecordID;

        return $self;
    }

    /**
     * @param CommentRecordType|value-of<CommentRecordType> $commentRecordType
     */
    public function withCommentRecordType(
        CommentRecordType|string $commentRecordType
    ): self {
        $self = clone $this;
        $self['commentRecordType'] = $commentRecordType;

        return $self;
    }

    public function withCommenter(string $commenter): self
    {
        $self = clone $this;
        $self['commenter'] = $commenter;

        return $self;
    }

    /**
     * @param CommenterType|value-of<CommenterType> $commenterType
     */
    public function withCommenterType(CommenterType|string $commenterType): self
    {
        $self = clone $this;
        $self['commenterType'] = $commenterType;

        return $self;
    }

    /**
     * An ISO 8901 datetime string denoting when the comment was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * An ISO 8901 datetime string for when the comment was read.
     */
    public function withReadAt(\DateTimeInterface $readAt): self
    {
        $self = clone $this;
        $self['readAt'] = $readAt;

        return $self;
    }

    /**
     * An ISO 8901 datetime string for when the comment was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
