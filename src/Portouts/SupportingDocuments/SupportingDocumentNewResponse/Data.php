<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse\Data\Type;

/**
 * @phpstan-type data_alias = array{
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
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api]
    public string $id;

    /**
     * Supporting document creation timestamp in ISO 8601 format.
     */
    #[Api('created_at')]
    public string $createdAt;

    /**
     * Identifies the associated document.
     */
    #[Api('document_id')]
    public string $documentID;

    /**
     * Identifies the associated port request.
     */
    #[Api('portout_id')]
    public string $portoutID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type')]
    public string $recordType;

    /**
     * Identifies the type of the document.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * Supporting document last changed timestamp in ISO 8601 format.
     */
    #[Api('updated_at')]
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
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->documentID = $documentID;
        $obj->portoutID = $portoutID;
        $obj->recordType = $recordType;
        $obj['type'] = $type;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Supporting document creation timestamp in ISO 8601 format.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Identifies the associated document.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj->documentID = $documentID;

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

    /**
     * Identifies the type of the document.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Supporting document last changed timestamp in ISO 8601 format.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
