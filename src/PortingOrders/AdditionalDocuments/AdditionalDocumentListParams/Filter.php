<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Filter\DocumentType;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[document_type].
 *
 * @phpstan-type FilterShape = array{
 *   document_type?: list<value-of<DocumentType>>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter additional documents by a list of document types.
     *
     * @var list<value-of<DocumentType>>|null $document_type
     */
    #[Api(list: DocumentType::class, optional: true)]
    public ?array $document_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DocumentType|value-of<DocumentType>> $document_type
     */
    public static function with(?array $document_type = null): self
    {
        $obj = new self;

        null !== $document_type && $obj['document_type'] = $document_type;

        return $obj;
    }

    /**
     * Filter additional documents by a list of document types.
     *
     * @param list<DocumentType|value-of<DocumentType>> $documentType
     */
    public function withDocumentType(array $documentType): self
    {
        $obj = clone $this;
        $obj['document_type'] = $documentType;

        return $obj;
    }
}
