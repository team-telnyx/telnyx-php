<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentUploadParams\Document;

/**
 * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
 *
 * @see Telnyx\Services\DocumentsService::upload()
 *
 * @phpstan-type DocumentUploadParamsShape = array{
 *   document: Document|array{
 *     customerReference?: string|null,
 *     file?: string|null,
 *     filename?: string|null,
 *     url?: string|null,
 *   },
 * }
 */
final class DocumentUploadParams implements BaseModel
{
    /** @use SdkModel<DocumentUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Document $document;

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
     * @param Document|array{
     *   customerReference?: string|null,
     *   file?: string|null,
     *   filename?: string|null,
     *   url?: string|null,
     * } $document
     */
    public static function with(Document|array $document): self
    {
        $self = new self;

        $self['document'] = $document;

        return $self;
    }

    /**
     * @param Document|array{
     *   customerReference?: string|null,
     *   file?: string|null,
     *   filename?: string|null,
     *   url?: string|null,
     * } $document
     */
    public function withDocument(Document|array $document): self
    {
        $self = clone $this;
        $self['document'] = $document;

        return $self;
    }
}
