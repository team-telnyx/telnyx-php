<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentUploadJsonParams\Document;

/**
 * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
 *
 * @see Telnyx\Services\DocumentsService::uploadJson()
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Documents\DocumentUploadJsonParams\Document
 *
 * @phpstan-type DocumentUploadJsonParamsShape = array{
 *   document: Document|DocumentShape
 * }
 */
final class DocumentUploadJsonParams implements BaseModel
{
    /** @use SdkModel<DocumentUploadJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Document $document;

    /**
     * `new DocumentUploadJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DocumentUploadJsonParams::with(document: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DocumentUploadJsonParams)->withDocument(...)
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
     * @param Document|DocumentShape $document
     */
    public static function with(Document|array $document): self
    {
        $self = new self;

        $self['document'] = $document;

        return $self;
    }

    /**
     * @param Document|DocumentShape $document
     */
    public function withDocument(Document|array $document): self
    {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }
}
