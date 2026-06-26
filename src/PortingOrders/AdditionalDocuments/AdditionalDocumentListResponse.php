<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse\DocumentType;

/**
 * @phpstan-type AdditionalDocumentListResponseShape = array{
 *   id?: string|null,
 *   contentType?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   documentID?: string|null,
 *   documentType?: null|DocumentType|value-of<DocumentType>,
 *   filename?: string|null,
 *   portingOrderID?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class AdditionalDocumentListResponse implements BaseModel
{
    /** @use SdkModel<AdditionalDocumentListResponseShape> */
    use SdkModel;

    /**
     * Uniquely identifies this additional document.
     */
    #[Optional]
    public ?string $id;

    /**
     * The content type of the related document.
     */
    #[Optional('content_type')]
    public ?string $contentType;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Identifies the associated document.
     */
    #[Optional('document_id')]
    public ?string $documentID;

    /**
     * Identifies the type of additional document.
     *
     * @var value-of<DocumentType>|null $documentType
     */
    #[Optional('document_type', enum: DocumentType::class)]
    public ?string $documentType;

    /**
     * The filename of the related document.
     */
    #[Optional]
    public ?string $filename;

    /**
     * Identifies the associated porting order.
     */
    #[Optional('porting_order_id')]
    public ?string $portingOrderID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocumentType|value-of<DocumentType>|null $documentType
     */
    public static function with(
        ?string $id = null,
        ?string $contentType = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $documentID = null,
        DocumentType|string|null $documentType = null,
        ?string $filename = null,
        ?string $portingOrderID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $contentType && $self['contentType'] = $contentType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $documentID && $self['documentID'] = $documentID;
        null !== $documentType && $self['documentType'] = $documentType;
        null !== $filename && $self['filename'] = $filename;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies this additional document.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The content type of the related document.
     */
    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
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
     * Identifies the type of additional document.
     *
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public function withDocumentType(DocumentType|string $documentType): self
    {
        $self = clone $this;
        $self['documentType'] = $documentType;

        return $self;
    }

    /**
     * The filename of the related document.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    /**
     * Identifies the associated porting order.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
