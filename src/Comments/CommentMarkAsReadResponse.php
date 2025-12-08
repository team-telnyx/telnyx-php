<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\Comments\CommentMarkAsReadResponse\Data;
use Telnyx\Comments\CommentMarkAsReadResponse\Data\CommenterType;
use Telnyx\Comments\CommentMarkAsReadResponse\Data\CommentRecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CommentMarkAsReadResponseShape = array{data?: Data|null}
 */
final class CommentMarkAsReadResponse implements BaseModel
{
    /** @use SdkModel<CommentMarkAsReadResponseShape> */
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
     *   comment_record_id?: string|null,
     *   comment_record_type?: value-of<CommentRecordType>|null,
     *   commenter?: string|null,
     *   commenter_type?: value-of<CommenterType>|null,
     *   created_at?: \DateTimeInterface|null,
     *   read_at?: \DateTimeInterface|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   body?: string|null,
     *   comment_record_id?: string|null,
     *   comment_record_type?: value-of<CommentRecordType>|null,
     *   commenter?: string|null,
     *   commenter_type?: value-of<CommenterType>|null,
     *   created_at?: \DateTimeInterface|null,
     *   read_at?: \DateTimeInterface|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
