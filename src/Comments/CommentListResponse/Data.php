<?php

declare(strict_types=1);

namespace Telnyx\Comments\CommentListResponse;

use Telnyx\Comments\CommentListResponse\Data\CommenterType;
use Telnyx\Comments\CommentListResponse\Data\CommentRecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   body?: string,
 *   commentRecordID?: string,
 *   commentRecordType?: value-of<CommentRecordType>,
 *   commenter?: string,
 *   commenterType?: value-of<CommenterType>,
 *   createdAt?: \DateTimeInterface,
 *   readAt?: \DateTimeInterface,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $body;

    #[Api('comment_record_id', optional: true)]
    public ?string $commentRecordID;

    /** @var value-of<CommentRecordType>|null $commentRecordType */
    #[Api('comment_record_type', enum: CommentRecordType::class, optional: true)]
    public ?string $commentRecordType;

    #[Api(optional: true)]
    public ?string $commenter;

    /** @var value-of<CommenterType>|null $commenterType */
    #[Api('commenter_type', enum: CommenterType::class, optional: true)]
    public ?string $commenterType;

    /**
     * An ISO 8901 datetime string denoting when the comment was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * An ISO 8901 datetime string for when the comment was read.
     */
    #[Api('read_at', optional: true)]
    public ?\DateTimeInterface $readAt;

    /**
     * An ISO 8901 datetime string for when the comment was updated.
     */
    #[Api('updated_at', optional: true)]
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $body && $obj->body = $body;
        null !== $commentRecordID && $obj->commentRecordID = $commentRecordID;
        null !== $commentRecordType && $obj['commentRecordType'] = $commentRecordType;
        null !== $commenter && $obj->commenter = $commenter;
        null !== $commenterType && $obj['commenterType'] = $commenterType;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $readAt && $obj->readAt = $readAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }

    public function withCommentRecordID(string $commentRecordID): self
    {
        $obj = clone $this;
        $obj->commentRecordID = $commentRecordID;

        return $obj;
    }

    /**
     * @param CommentRecordType|value-of<CommentRecordType> $commentRecordType
     */
    public function withCommentRecordType(
        CommentRecordType|string $commentRecordType
    ): self {
        $obj = clone $this;
        $obj['commentRecordType'] = $commentRecordType;

        return $obj;
    }

    public function withCommenter(string $commenter): self
    {
        $obj = clone $this;
        $obj->commenter = $commenter;

        return $obj;
    }

    /**
     * @param CommenterType|value-of<CommenterType> $commenterType
     */
    public function withCommenterType(CommenterType|string $commenterType): self
    {
        $obj = clone $this;
        $obj['commenterType'] = $commenterType;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string denoting when the comment was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string for when the comment was read.
     */
    public function withReadAt(\DateTimeInterface $readAt): self
    {
        $obj = clone $this;
        $obj->readAt = $readAt;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string for when the comment was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
