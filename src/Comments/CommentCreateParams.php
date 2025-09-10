<?php

declare(strict_types=1);

namespace Telnyx\Comments;

use Telnyx\Comments\CommentCreateParams\CommentRecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CommentCreateParams); // set properties as needed
 * $client->comments->create(...$params->toArray());
 * ```
 * Create a comment.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->comments->create(...$params->toArray());`
 *
 * @see Telnyx\Comments->create
 *
 * @phpstan-type comment_create_params = array{
 *   body?: string,
 *   commentRecordID?: string,
 *   commentRecordType?: CommentRecordType|value-of<CommentRecordType>,
 * }
 */
final class CommentCreateParams implements BaseModel
{
    /** @use SdkModel<comment_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $body;

    #[Api('comment_record_id', optional: true)]
    public ?string $commentRecordID;

    /** @var value-of<CommentRecordType>|null $commentRecordType */
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
        ?string $body = null,
        ?string $commentRecordID = null,
        CommentRecordType|string|null $commentRecordType = null,
    ): self {
        $obj = new self;

        null !== $body && $obj->body = $body;
        null !== $commentRecordID && $obj->commentRecordID = $commentRecordID;
        null !== $commentRecordType && $obj->commentRecordType = $commentRecordType instanceof CommentRecordType ? $commentRecordType->value : $commentRecordType;

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
        $obj->commentRecordID = $commentRecordID;

        return $obj;
    }

    /**
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
