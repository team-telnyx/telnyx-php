<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document\Type;

/**
 * @phpstan-type DocumentShape = array{document_id: string, type: value-of<Type>}
 */
final class Document implements BaseModel
{
    /** @use SdkModel<DocumentShape> */
    use SdkModel;

    /**
     * Identifies the associated document.
     */
    #[Api]
    public string $document_id;

    /**
     * Identifies the type of the document.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new Document()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Document::with(document_id: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Document)->withDocumentID(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(string $document_id, Type|string $type): self
    {
        $obj = new self;

        $obj['document_id'] = $document_id;
        $obj['type'] = $type;

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
     * Identifies the type of the document.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
