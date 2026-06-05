<?php

declare(strict_types=1);

namespace Telnyx\Dir\Comments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Post a customer comment on a DIR (for example, to respond to reviewer notes). Send only `content` (1–5000 chars) and an optional `parent_comment_id`; the server sets the comment type, visibility, and author automatically. The enterprise is resolved server-side from the DIR id.
 *
 * @see Telnyx\Services\Dir\CommentsService::create()
 *
 * @phpstan-type CommentCreateParamsShape = array{
 *   content: string, parentCommentID?: string|null
 * }
 */
final class CommentCreateParams implements BaseModel
{
    /** @use SdkModel<CommentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Comment body. 1–5000 characters.
     */
    #[Required]
    public string $content;

    /**
     * Optional parent comment id to thread this reply under.
     */
    #[Optional('parent_comment_id')]
    public ?string $parentCommentID;

    /**
     * `new CommentCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentCreateParams::with(content: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentCreateParams)->withContent(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $content,
        ?string $parentCommentID = null
    ): self {
        $self = new self;

        $self['content'] = $content;

        null !== $parentCommentID && $self['parentCommentID'] = $parentCommentID;

        return $self;
    }

    /**
     * Comment body. 1–5000 characters.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * Optional parent comment id to thread this reply under.
     */
    public function withParentCommentID(string $parentCommentID): self
    {
        $self = clone $this;
        $self['parentCommentID'] = $parentCommentID;

        return $self;
    }
}
