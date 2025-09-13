<?php

declare(strict_types=1);

namespace Telnyx\Comments\CommentListParams;

use Telnyx\Comments\CommentListParams\Filter\CommentRecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[comment_record_type], filter[comment_record_id].
 *
 * @phpstan-type filter_alias = array{
 *   commentRecordID?: string, commentRecordType?: value-of<CommentRecordType>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * ID of the record the comments relate to.
     */
    #[Api('comment_record_id', optional: true)]
    public ?string $commentRecordID;

    /**
     * Record type that the comment relates to.
     *
     * @var value-of<CommentRecordType>|null $commentRecordType
     */
    #[Api('comment_record_type', enum: CommentRecordType::class, optional: true)]
    public ?string $commentRecordType;

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
     */
    public static function with(
        ?string $commentRecordID = null,
        CommentRecordType|string|null $commentRecordType = null,
    ): self {
        $obj = new self;

        null !== $commentRecordID && $obj->commentRecordID = $commentRecordID;
        null !== $commentRecordType && $obj->commentRecordType = $commentRecordType instanceof CommentRecordType ? $commentRecordType->value : $commentRecordType;

        return $obj;
    }

    /**
     * ID of the record the comments relate to.
     */
    public function withCommentRecordID(string $commentRecordID): self
    {
        $obj = clone $this;
        $obj->commentRecordID = $commentRecordID;

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
        $obj->commentRecordType = $commentRecordType instanceof CommentRecordType ? $commentRecordType->value : $commentRecordType;

        return $obj;
    }
}
