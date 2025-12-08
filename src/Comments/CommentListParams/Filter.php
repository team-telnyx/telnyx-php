<?php

declare(strict_types=1);

namespace Telnyx\Comments\CommentListParams;

use Telnyx\Comments\CommentListParams\Filter\CommentRecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id].
 *
 * @phpstan-type FilterShape = array{
 *   comment_record_id?: string|null,
 *   comment_record_type?: value-of<CommentRecordType>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * ID of the record the comments relate to.
     */
    #[Optional]
    public ?string $comment_record_id;

    /**
     * Record type that the comment relates to.
     *
     * @var value-of<CommentRecordType>|null $comment_record_type
     */
    #[Optional(enum: CommentRecordType::class)]
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
        ?string $comment_record_id = null,
        CommentRecordType|string|null $comment_record_type = null,
    ): self {
        $obj = new self;

        null !== $comment_record_id && $obj['comment_record_id'] = $comment_record_id;
        null !== $comment_record_type && $obj['comment_record_type'] = $comment_record_type;

        return $obj;
    }

    /**
     * ID of the record the comments relate to.
     */
    public function withCommentRecordID(string $commentRecordID): self
    {
        $obj = clone $this;
        $obj['comment_record_id'] = $commentRecordID;

        return $obj;
    }

    /**
     * Record type that the comment relates to.
     *
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
