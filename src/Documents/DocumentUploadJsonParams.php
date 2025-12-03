<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentUploadJsonParams\Document\DocServiceDocumentUploadInline;
use Telnyx\Documents\DocumentUploadJsonParams\Document\DocServiceDocumentUploadURL;

/**
 * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
 *
 * @see Telnyx\Services\DocumentsService::uploadJson()
 *
 * @phpstan-type DocumentUploadJsonParamsShape = array{
 *   document: DocServiceDocumentUploadURL|DocServiceDocumentUploadInline
 * }
 */
final class DocumentUploadJsonParams implements BaseModel
{
    /** @use SdkModel<DocumentUploadJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public DocServiceDocumentUploadURL|DocServiceDocumentUploadInline $document;

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
     */
    public static function with(
        DocServiceDocumentUploadURL|DocServiceDocumentUploadInline $document
    ): self {
        $obj = new self;

        $obj->document = $document;

        return $obj;
    }

    public function withDocument(
        DocServiceDocumentUploadURL|DocServiceDocumentUploadInline $document
    ): self {
        $obj = clone $this;
        $obj->document = $document;

        return $obj;
    }
}
