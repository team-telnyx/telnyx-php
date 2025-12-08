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
 *   created_at: string,
 *   document_id: string,
 *   portout_id: string,
 *   record_type: string,
 *   type: value-of<Type>,
 *   updated_at: string,
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
    #[Required]
    public string $created_at;

    /**
     * Identifies the associated document.
     */
    #[Required]
    public string $document_id;

    /**
     * Identifies the associated port request.
     */
    #[Required]
    public string $portout_id;

    /**
     * Identifies the type of the resource.
     */
    #[Required]
    public string $record_type;

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
    #[Required]
    public string $updated_at;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   created_at: ...,
     *   document_id: ...,
     *   portout_id: ...,
     *   record_type: ...,
     *   type: ...,
     *   updated_at: ...,
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
        string $created_at,
        string $document_id,
        string $portout_id,
        string $record_type,
        Type|string $type,
        string $updated_at,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created_at'] = $created_at;
        $obj['document_id'] = $document_id;
        $obj['portout_id'] = $portout_id;
        $obj['record_type'] = $record_type;
        $obj['type'] = $type;
        $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Supporting document creation timestamp in ISO 8601 format.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the associated document.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj['document_id'] = $documentID;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
