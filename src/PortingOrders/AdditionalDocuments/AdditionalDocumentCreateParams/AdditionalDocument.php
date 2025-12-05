<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument\DocumentType;

/**
 * @phpstan-type AdditionalDocumentShape = array{
 *   document_id?: string|null, document_type?: value-of<DocumentType>|null
 * }
 */
final class AdditionalDocument implements BaseModel
{
    /** @use SdkModel<AdditionalDocumentShape> */
    use SdkModel;

    /**
     * The document identification.
     */
    #[Api(optional: true)]
    public ?string $document_id;

    /**
     * The type of document being created.
     *
     * @var value-of<DocumentType>|null $document_type
     */
    #[Api(enum: DocumentType::class, optional: true)]
    public ?string $document_type;

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
        ?string $document_id = null,
        DocumentType|string|null $document_type = null
    ): self {
        $obj = new self;

        null !== $document_id && $obj['document_id'] = $document_id;
        null !== $document_type && $obj['document_type'] = $document_type;

        return $obj;
    }

    /**
     * The document identification.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj['document_id'] = $documentID;

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
        $obj['document_type'] = $documentType;

        return $obj;
    }
}
