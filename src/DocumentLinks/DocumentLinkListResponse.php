<?php

declare(strict_types=1);

namespace Telnyx\DocumentLinks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type DocumentLinkListResponseShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   document_id?: string|null,
 *   linked_record_type?: string|null,
 *   linked_resource_id?: string|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class DocumentLinkListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DocumentLinkListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Identifies the associated document.
     */
    #[Api(optional: true)]
    public ?string $document_id;

    /**
     * The linked resource's record type.
     */
    #[Api(optional: true)]
    public ?string $linked_record_type;

    /**
     * Identifies the linked resource.
     */
    #[Api(optional: true)]
    public ?string $linked_resource_id;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

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
        ?string $id = null,
        ?string $created_at = null,
        ?string $document_id = null,
        ?string $linked_record_type = null,
        ?string $linked_resource_id = null,
        ?string $record_type = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $document_id && $obj->document_id = $document_id;
        null !== $linked_record_type && $obj->linked_record_type = $linked_record_type;
        null !== $linked_resource_id && $obj->linked_resource_id = $linked_resource_id;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Identifies the associated document.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj->document_id = $documentID;

        return $obj;
    }

    /**
     * The linked resource's record type.
     */
    public function withLinkedRecordType(string $linkedRecordType): self
    {
        $obj = clone $this;
        $obj->linked_record_type = $linkedRecordType;

        return $obj;
    }

    /**
     * Identifies the linked resource.
     */
    public function withLinkedResourceID(string $linkedResourceID): self
    {
        $obj = clone $this;
        $obj->linked_resource_id = $linkedResourceID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
