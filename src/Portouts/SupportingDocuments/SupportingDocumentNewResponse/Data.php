<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse\Data\Type;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   createdAt: string,
 *   documentID: string,
 *   portoutID: string,
 *   recordType: string,
 *   type: value-of<Type>,
 *   updatedAt: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * Supporting document creation timestamp in ISO 8601 format.
     */
    #[Required('created_at')]
    public string $createdAt;

    /**
     * Identifies the associated document.
     */
    #[Required('document_id')]
    public string $documentID;

    /**
     * Identifies the associated port request.
     */
    #[Required('portout_id')]
    public string $portoutID;

    /**
     * Identifies the type of the resource.
     */
    #[Required('record_type')]
    public string $recordType;

    /**
     * Identifies the type of the document.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Supporting document last changed timestamp in ISO 8601 format.
     */
    #[Required('updated_at')]
    public string $updatedAt;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   createdAt: ...,
     *   documentID: ...,
     *   portoutID: ...,
     *   recordType: ...,
     *   type: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDocumentID(...)
     *   ->withPortoutID(...)
     *   ->withRecordType(...)
     *   ->withType(...)
     *   ->withUpdatedAt(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        string $createdAt,
        string $documentID,
        string $portoutID,
        string $recordType,
        Type|string $type,
        string $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['documentID'] = $documentID;
        $self['portoutID'] = $portoutID;
        $self['recordType'] = $recordType;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Supporting document creation timestamp in ISO 8601 format.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Identifies the associated document.
     */
    public function withDocumentID(string $documentID): self
    {
        $self = clone $this;
        $self['documentID'] = $documentID;

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

    /**
     * Identifies the type of the document.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Supporting document last changed timestamp in ISO 8601 format.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
