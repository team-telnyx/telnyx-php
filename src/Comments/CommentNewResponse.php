<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\Comments\CommentNewResponse\Data;
use Telnyx\Comments\CommentNewResponse\Data\CommenterType;
use Telnyx\Comments\CommentNewResponse\Data\CommentRecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CommentNewResponseShape = array{data?: Data|null}
 */
final class CommentNewResponse implements BaseModel
{
    /** @use SdkModel<CommentNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   body?: string|null,
     *   commentRecordID?: string|null,
     *   commentRecordType?: value-of<CommentRecordType>|null,
     *   commenter?: string|null,
     *   commenterType?: value-of<CommenterType>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   readAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   body?: string|null,
     *   commentRecordID?: string|null,
     *   commentRecordType?: value-of<CommentRecordType>|null,
     *   commenter?: string|null,
     *   commenterType?: value-of<CommenterType>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   readAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
