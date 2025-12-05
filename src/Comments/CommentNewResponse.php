<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\Comments\CommentNewResponse\Data;
use Telnyx\Comments\CommentNewResponse\Data\CommenterType;
use Telnyx\Comments\CommentNewResponse\Data\CommentRecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CommentNewResponseShape = array{data?: Data|null}
 */
final class CommentNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CommentNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
