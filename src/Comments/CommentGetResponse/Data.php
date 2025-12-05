<?php

declare(strict_types=1);

namespace Telnyx\Comments\CommentGetResponse;

use Telnyx\Comments\CommentGetResponse\Data\CommenterType;
use Telnyx\Comments\CommentGetResponse\Data\CommentRecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   body?: string|null,
 *   comment_record_id?: string|null,
 *   comment_record_type?: value-of<CommentRecordType>|null,
 *   commenter?: string|null,
 *   commenter_type?: value-of<CommenterType>|null,
 *   created_at?: \DateTimeInterface|null,
 *   read_at?: \DateTimeInterface|null,
 *   updated_at?: \DateTimeInterface|null,
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

    #[Api(optional: true)]
    public ?string $comment_record_id;

    /** @var value-of<CommentRecordType>|null $comment_record_type */
    #[Api(enum: CommentRecordType::class, optional: true)]
    public ?string $comment_record_type;

    #[Api(optional: true)]
    public ?string $commenter;

    /** @var value-of<CommenterType>|null $commenter_type */
    #[Api(enum: CommenterType::class, optional: true)]
    public ?string $commenter_type;

    /**
     * An ISO 8901 datetime string denoting when the comment was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * An ISO 8901 datetime string for when the comment was read.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $read_at;

    /**
     * An ISO 8901 datetime string for when the comment was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CommentRecordType|value-of<CommentRecordType> $comment_record_type
     * @param CommenterType|value-of<CommenterType> $commenter_type
     */
    public static function with(
        ?string $id = null,
        ?string $body = null,
        ?string $comment_record_id = null,
        CommentRecordType|string|null $comment_record_type = null,
        ?string $commenter = null,
        CommenterType|string|null $commenter_type = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $read_at = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $body && $obj['body'] = $body;
        null !== $comment_record_id && $obj['comment_record_id'] = $comment_record_id;
        null !== $comment_record_type && $obj['comment_record_type'] = $comment_record_type;
        null !== $commenter && $obj['commenter'] = $commenter;
        null !== $commenter_type && $obj['commenter_type'] = $commenter_type;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $read_at && $obj['read_at'] = $read_at;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj['body'] = $body;

        return $obj;
    }

    public function withCommentRecordID(string $commentRecordID): self
    {
        $obj = clone $this;
        $obj['comment_record_id'] = $commentRecordID;

        return $obj;
    }

    /**
     * @param CommentRecordType|value-of<CommentRecordType> $commentRecordType
     */
    public function withCommentRecordType(
        CommentRecordType|string $commentRecordType
    ): self {
        $obj = clone $this;
        $obj['comment_record_type'] = $commentRecordType;

        return $obj;
    }

    public function withCommenter(string $commenter): self
    {
        $obj = clone $this;
        $obj['commenter'] = $commenter;

        return $obj;
    }

    /**
     * @param CommenterType|value-of<CommenterType> $commenterType
     */
    public function withCommenterType(CommenterType|string $commenterType): self
    {
        $obj = clone $this;
        $obj['commenter_type'] = $commenterType;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string denoting when the comment was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string for when the comment was read.
     */
    public function withReadAt(\DateTimeInterface $readAt): self
    {
        $obj = clone $this;
        $obj['read_at'] = $readAt;

        return $obj;
    }

    /**
     * An ISO 8901 datetime string for when the comment was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
