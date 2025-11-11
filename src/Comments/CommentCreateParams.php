<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\Comments\CommentCreateParams\CommentRecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a comment.
 *
 * @see Telnyx\Comments->create
 *
 * @phpstan-type CommentCreateParamsShape = array{
 *   body?: string,
 *   comment_record_id?: string,
 *   comment_record_type?: CommentRecordType|value-of<CommentRecordType>,
 * }
 */
final class CommentCreateParams implements BaseModel
{
    /** @use SdkModel<CommentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $body;

    #[Api(optional: true)]
    public ?string $comment_record_id;

    /** @var value-of<CommentRecordType>|null $comment_record_type */
    #[Api(enum: CommentRecordType::class, optional: true)]
    public ?string $comment_record_type;

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
     */
    public static function with(
        ?string $body = null,
        ?string $comment_record_id = null,
        CommentRecordType|string|null $comment_record_type = null,
    ): self {
        $obj = new self;

        null !== $body && $obj->body = $body;
        null !== $comment_record_id && $obj->comment_record_id = $comment_record_id;
        null !== $comment_record_type && $obj['comment_record_type'] = $comment_record_type;

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
        $obj->comment_record_id = $commentRecordID;

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
}
