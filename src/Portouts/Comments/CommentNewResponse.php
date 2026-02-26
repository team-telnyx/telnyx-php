<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Comments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortoutCommentShape from \Telnyx\Portouts\Comments\PortoutComment
 *
 * @phpstan-type CommentNewResponseShape = array{
 *   data?: null|PortoutComment|PortoutCommentShape
 * }
 */
final class CommentNewResponse implements BaseModel
{
    /** @use SdkModel<CommentNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortoutComment $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortoutComment|PortoutCommentShape|null $data
     */
    public static function with(PortoutComment|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortoutComment|PortoutCommentShape $data
     */
    public function withData(PortoutComment|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
