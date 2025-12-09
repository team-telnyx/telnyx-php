<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Comments\CommentListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   body: string,
 *   createdAt: string,
 *   userID: string,
 *   portoutID?: string|null,
 *   recordType?: string|null,
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
    #[Required('created_at')]
    public string $createdAt;

    /**
     * Identifies the user who created the comment. Will be null if created by Telnyx Admin.
     */
    #[Required('user_id')]
    public string $userID;

    /**
     * Identifies the associated port request.
     */
    #[Optional('portout_id')]
    public ?string $portoutID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
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
        $self = new self;

        $self['id'] = $id;
        $self['body'] = $body;
        $self['createdAt'] = $createdAt;
        $self['userID'] = $userID;

        null !== $portoutID && $self['portoutID'] = $portoutID;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Comment body.
     */
    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * Comment creation timestamp in ISO 8601 format.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Identifies the user who created the comment. Will be null if created by Telnyx Admin.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Identifies the associated port request.
     */
    public function withPortoutID(string $portoutID): self
    {
        $self = clone $this;
        $self['portoutID'] = $portoutID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
