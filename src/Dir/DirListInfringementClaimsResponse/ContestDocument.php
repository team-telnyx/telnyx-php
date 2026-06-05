<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirListInfringementClaimsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirListInfringementClaimsResponse\ContestDocument\DocumentType;

/**
 * @phpstan-type ContestDocumentShape = array{
 *   documentID: string,
 *   documentType: DocumentType|value-of<DocumentType>,
 *   description?: string|null,
 * }
 */
final class ContestDocument implements BaseModel
{
    /** @use SdkModel<ContestDocumentShape> */
    use SdkModel;

    /**
     * Id returned by the Telnyx Documents API after you upload the file (upload via `POST /v2/documents`; see https://developers.telnyx.com/api/documents).
     */
    #[Required('document_id')]
    public string $documentID;

    /**
     * Type of supporting document. Pick the closest match to what the file actually contains; `other` triggers manual vetting and may slow approval. The matching short_name reference list is at `GET /v2/dir/document_types`.
     *
     * @var value-of<DocumentType> $documentType
     */
    #[Required('document_type', enum: DocumentType::class)]
    public string $documentType;

    #[Optional]
    public ?string $description;

    /**
     * `new ContestDocument()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContestDocument::with(documentID: ..., documentType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContestDocument)->withDocumentID(...)->withDocumentType(...)
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
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public static function with(
        string $documentID,
        DocumentType|string $documentType,
        ?string $description = null,
    ): self {
        $self = new self;

        $self['documentID'] = $documentID;
        $self['documentType'] = $documentType;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * Id returned by the Telnyx Documents API after you upload the file (upload via `POST /v2/documents`; see https://developers.telnyx.com/api/documents).
     */
    public function withDocumentID(string $documentID): self
    {
        $self = clone $this;
        $self['documentID'] = $documentID;

        return $self;
    }

    /**
     * Type of supporting document. Pick the closest match to what the file actually contains; `other` triggers manual vetting and may slow approval. The matching short_name reference list is at `GET /v2/dir/document_types`.
     *
     * @param DocumentType|value-of<DocumentType> $documentType
     */
    public function withDocumentType(DocumentType|string $documentType): self
    {
        $self = clone $this;
        $self['documentType'] = $documentType;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
