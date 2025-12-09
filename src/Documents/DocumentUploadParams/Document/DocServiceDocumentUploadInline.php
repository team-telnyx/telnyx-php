<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentUploadParams\Document;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DocServiceDocumentUploadInlineShape = array{
 *   file: string, customerReference?: string|null, filename?: string|null
 * }
 */
final class DocServiceDocumentUploadInline implements BaseModel
{
    /** @use SdkModel<DocServiceDocumentUploadInlineShape> */
    use SdkModel;

    /**
     * The Base64 encoded contents of the file you are uploading.
     */
    #[Required]
    public string $file;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * The filename of the document.
     */
    #[Optional]
    public ?string $filename;

    /**
     * `new DocServiceDocumentUploadInline()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DocServiceDocumentUploadInline::with(file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DocServiceDocumentUploadInline)->withFile(...)
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
        string $file,
        ?string $customerReference = null,
        ?string $filename = null
    ): self {
        $self = new self;

        $self['file'] = $file;

        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $filename && $self['filename'] = $filename;

        return $self;
    }

    /**
     * The Base64 encoded contents of the file you are uploading.
     */
    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * The filename of the document.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }
}
