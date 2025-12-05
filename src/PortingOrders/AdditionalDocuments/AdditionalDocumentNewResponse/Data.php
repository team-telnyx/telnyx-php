<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse\Data\DocumentType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   content_type?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   document_id?: string|null,
 *   document_type?: value-of<DocumentType>|null,
 *   filename?: string|null,
 *   porting_order_id?: string|null,
 *   record_type?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies this additional document.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The content type of the related document.
     */
    #[Api(optional: true)]
    public ?string $content_type;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Identifies the associated document.
     */
    #[Api(optional: true)]
    public ?string $document_id;

    /**
     * Identifies the type of additional document.
     *
     * @var value-of<DocumentType>|null $document_type
     */
    #[Api(enum: DocumentType::class, optional: true)]
    public ?string $document_type;

    /**
     * The filename of the related document.
     */
    #[Api(optional: true)]
    public ?string $filename;

    /**
     * Identifies the associated porting order.
     */
    #[Api(optional: true)]
    public ?string $porting_order_id;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocumentType|value-of<DocumentType> $document_type
     */
    public static function with(
        ?string $id = null,
        ?string $content_type = null,
        ?\DateTimeInterface $created_at = null,
        ?string $document_id = null,
        DocumentType|string|null $document_type = null,
        ?string $filename = null,
        ?string $porting_order_id = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $content_type && $obj['content_type'] = $content_type;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $document_id && $obj['document_id'] = $document_id;
        null !== $document_type && $obj['document_type'] = $document_type;
        null !== $filename && $obj['filename'] = $filename;
        null !== $porting_order_id && $obj['porting_order_id'] = $porting_order_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies this additional document.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The content type of the related document.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj['content_type'] = $contentType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
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
     * Identifies the type of additional document.
     *
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public function withDocumentType(DocumentType|string $documentType): self
    {
        $obj = clone $this;
        $obj['document_type'] = $documentType;

        return $obj;
    }

    /**
     * The filename of the related document.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj['filename'] = $filename;

        return $obj;
    }

    /**
     * Identifies the associated porting order.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj['porting_order_id'] = $portingOrderID;

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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
