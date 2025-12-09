<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument\DocumentType;

/**
 * @phpstan-type AdditionalDocumentShape = array{
 *   documentID?: string|null, documentType?: value-of<DocumentType>|null
 * }
 */
final class AdditionalDocument implements BaseModel
{
    /** @use SdkModel<AdditionalDocumentShape> */
    use SdkModel;

    /**
     * The document identification.
     */
    #[Optional('document_id')]
    public ?string $documentID;

    /**
     * The type of document being created.
     *
     * @var value-of<DocumentType>|null $documentType
     */
    #[Optional('document_type', enum: DocumentType::class)]
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
        $self = new self;

        null !== $documentID && $self['documentID'] = $documentID;
        null !== $documentType && $self['documentType'] = $documentType;

        return $self;
    }

    /**
     * The document identification.
     */
    public function withDocumentID(string $documentID): self
    {
        $self = clone $this;
        $self['documentID'] = $documentID;

        return $self;
    }

    /**
     * The type of document being created.
     *
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public function withDocumentType(DocumentType|string $documentType): self
    {
        $self = clone $this;
        $self['documentType'] = $documentType;

        return $self;
    }
}
