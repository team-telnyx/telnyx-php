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
 * @phpstan-type filter_alias = array{
 *   documentType?: list<value-of<DocumentType>>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter additional documents by a list of document types.
     *
     * @var list<value-of<DocumentType>>|null $documentType
     */
    #[Api('document_type', list: DocumentType::class, optional: true)]
    public ?array $documentType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DocumentType|value-of<DocumentType>> $documentType
     */
    public static function with(?array $documentType = null): self
    {
        $obj = new self;

        null !== $documentType && $obj->documentType = array_map(fn ($v) => $v instanceof DocumentType ? $v->value : $v, $documentType);

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
        $obj->documentType = array_map(fn ($v) => $v instanceof DocumentType ? $v->value : $v, $documentType);

        return $obj;
    }
}
