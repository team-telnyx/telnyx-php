<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentUploadParams\Document\DocServiceDocumentUploadInline;
use Telnyx\Documents\DocumentUploadParams\Document\DocServiceDocumentUploadURL;

/**
 * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
 *
 * @see Telnyx\Services\DocumentsService::upload()
 *
 * @phpstan-type DocumentUploadParamsShape = array{
 *   document: DocServiceDocumentUploadURL|array{
 *     url: string, customerReference?: string|null, filename?: string|null
 *   }|DocServiceDocumentUploadInline|array{
 *     file: string, customerReference?: string|null, filename?: string|null
 *   },
 * }
 */
final class DocumentUploadParams implements BaseModel
{
    /** @use SdkModel<DocumentUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public DocServiceDocumentUploadURL|DocServiceDocumentUploadInline $document;

    /**
     * `new DocumentUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DocumentUploadParams::with(document: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DocumentUploadParams)->withDocument(...)
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
     * @param DocServiceDocumentUploadURL|array{
     *   url: string, customerReference?: string|null, filename?: string|null
     * }|DocServiceDocumentUploadInline|array{
     *   file: string, customerReference?: string|null, filename?: string|null
     * } $document
     */
    public static function with(
        DocServiceDocumentUploadURL|array|DocServiceDocumentUploadInline $document
    ): self {
        $self = new self;

        $self['document'] = $document;

        return $self;
    }

    /**
     * @param DocServiceDocumentUploadURL|array{
     *   url: string, customerReference?: string|null, filename?: string|null
     * }|DocServiceDocumentUploadInline|array{
     *   file: string, customerReference?: string|null, filename?: string|null
     * } $document
     */
    public function withDocument(
        DocServiceDocumentUploadURL|array|DocServiceDocumentUploadInline $document
    ): self {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }
}
