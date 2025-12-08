<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Comments\CommentNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   body: string,
 *   created_at: string,
 *   user_id: string,
 *   portout_id?: string|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * Comment body.
     */
    #[Required]
    public string $body;

    /**
     * Comment creation timestamp in ISO 8601 format.
     */
    #[Required]
    public string $created_at;

    /**
     * Identifies the user who created the comment. Will be null if created by Telnyx Admin.
     */
    #[Required]
    public string $user_id;

    /**
     * Identifies the associated port request.
     */
    #[Optional]
    public ?string $portout_id;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., body: ..., created_at: ..., user_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withBody(...)->withCreatedAt(...)->withUserID(...)
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
        string $id,
        string $body,
        string $created_at,
        string $user_id,
        ?string $portout_id = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['body'] = $body;
        $obj['created_at'] = $created_at;
        $obj['user_id'] = $user_id;

        null !== $portout_id && $obj['portout_id'] = $portout_id;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Comment body.
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj['body'] = $body;

        return $obj;
    }

    /**
     * Comment creation timestamp in ISO 8601 format.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the user who created the comment. Will be null if created by Telnyx Admin.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }

    /**
     * Identifies the associated port request.
     */
    public function withPortoutID(string $portoutID): self
    {
        $obj = clone $this;
        $obj['portout_id'] = $portoutID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
