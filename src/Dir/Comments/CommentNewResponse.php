<?php

declare(strict_types=1);

namespace Telnyx\Dir\Comments;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DirCommentShape from \Telnyx\Dir\Comments\DirComment
 *
 * @phpstan-type CommentNewResponseShape = array{data: DirComment|DirCommentShape}
 */
final class CommentNewResponse implements BaseModel
{
    /** @use SdkModel<CommentNewResponseShape> */
    use SdkModel;

    #[Required]
    public DirComment $data;

    /**
     * `new CommentNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentNewResponse)->withData(...)
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
     *
     * @param DirComment|DirCommentShape $data
     */
    public static function with(DirComment|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param DirComment|DirCommentShape $data
     */
    public function withData(DirComment|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
