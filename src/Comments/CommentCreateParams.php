<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\Comments\CommentCreateParams\CommentRecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a comment.
 *
 * @see Telnyx\Services\CommentsService::create()
 *
 * @phpstan-type CommentCreateParamsShape = array{
 *   body?: string|null,
 *   commentRecordID?: string|null,
 *   commentRecordType?: null|CommentRecordType|value-of<CommentRecordType>,
 * }
 */
final class CommentCreateParams implements BaseModel
{
    /** @use SdkModel<CommentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $body;

    #[Optional('comment_record_id')]
    public ?string $commentRecordID;

    /** @var value-of<CommentRecordType>|null $commentRecordType */
    #[Optional('comment_record_type', enum: CommentRecordType::class)]
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
     * @param CommentRecordType|value-of<CommentRecordType>|null $commentRecordType
     */
    public static function with(
        ?string $body = null,
        ?string $commentRecordID = null,
        CommentRecordType|string|null $commentRecordType = null,
    ): self {
        $self = new self;

        null !== $body && $self['body'] = $body;
        null !== $commentRecordID && $self['commentRecordID'] = $commentRecordID;
        null !== $commentRecordType && $self['commentRecordType'] = $commentRecordType;

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
}
