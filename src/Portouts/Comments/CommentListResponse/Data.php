<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Comments\CommentListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   id: string,
 *   body: string,
 *   createdAt: string,
 *   userID: string,
 *   portoutID?: string,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api]
    public string $id;

    /**
     * Comment body.
     */
    #[Api]
    public string $body;

    /**
     * Comment creation timestamp in ISO 8601 format.
     */
    #[Api('created_at')]
    public string $createdAt;

    /**
     * Identifies the user who created the comment. Will be null if created by Telnyx Admin.
     */
    #[Api('user_id')]
    public string $userID;

    /**
     * Identifies the associated port request.
     */
    #[Api('portout_id', optional: true)]
    public ?string $portoutID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., body: ..., createdAt: ..., userID: ...)
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
        string $createdAt,
        string $userID,
        ?string $portoutID = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->body = $body;
        $obj->createdAt = $createdAt;
        $obj->userID = $userID;

        null !== $portoutID && $obj->portoutID = $portoutID;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Comment body.
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }

    /**
     * Comment creation timestamp in ISO 8601 format.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Identifies the user who created the comment. Will be null if created by Telnyx Admin.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    /**
     * Identifies the associated port request.
     */
    public function withPortoutID(string $portoutID): self
    {
        $obj = clone $this;
        $obj->portoutID = $portoutID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
