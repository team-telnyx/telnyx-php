<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument\DocumentType;

/**
 * @phpstan-type additional_document = array{
 *   documentID?: string, documentType?: value-of<DocumentType>
 * }
 */
final class AdditionalDocument implements BaseModel
{
    /** @use SdkModel<additional_document> */
    use SdkModel;

    /**
     * The document identification.
     */
    #[Api('document_id', optional: true)]
    public ?string $documentID;

    /**
     * The type of document being created.
     *
     * @var value-of<DocumentType>|null $documentType
     */
    #[Api('document_type', enum: DocumentType::class, optional: true)]
    public ?string $documentType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public static function with(
        ?string $documentID = null,
        DocumentType|string|null $documentType = null
    ): self {
        $obj = new self;

        null !== $documentID && $obj->documentID = $documentID;
        null !== $documentType && $obj->documentType = $documentType instanceof DocumentType ? $documentType->value : $documentType;

        return $obj;
    }

    /**
     * The document identification.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj->documentID = $documentID;

        return $obj;
    }

    /**
     * The type of document being created.
     *
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public function withDocumentType(DocumentType|string $documentType): self
    {
        $obj = clone $this;
        $obj->documentType = $documentType instanceof DocumentType ? $documentType->value : $documentType;

        return $obj;
    }
}
