<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document;

/**
 * Creates a list of supporting documents on a portout request.
 *
 * @see Telnyx\Services\Portouts\SupportingDocumentsService::create()
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document
 *
 * @phpstan-type SupportingDocumentCreateParamsShape = array{
 *   documents?: list<DocumentShape>|null
 * }
 */
final class SupportingDocumentCreateParams implements BaseModel
{
    /** @use SdkModel<SupportingDocumentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of supporting documents parameters.
     *
     * @var list<Document>|null $documents
     */
    #[Optional(list: Document::class)]
    public ?array $documents;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DocumentShape> $documents
     */
    public static function with(?array $documents = null): self
    {
        $self = new self;

        null !== $documents && $self['documents'] = $documents;

        return $self;
    }

    /**
     * List of supporting documents parameters.
     *
     * @param list<DocumentShape> $documents
     */
    public function withDocuments(array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }
}
