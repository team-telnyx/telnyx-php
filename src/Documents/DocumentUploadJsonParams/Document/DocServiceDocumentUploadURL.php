<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentUploadJsonParams\Document;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DocServiceDocumentUploadURLShape = array{
 *   url: string, customerReference?: string|null, filename?: string|null
 * }
 */
final class DocServiceDocumentUploadURL implements BaseModel
{
    /** @use SdkModel<DocServiceDocumentUploadURLShape> */
    use SdkModel;

    /**
     * If the file is already hosted publicly, you can provide a URL and have the documents service fetch it for you.
     */
    #[Required]
    public string $url;

    /**
     * Optional reference string for customer tracking.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * The filename of the document.
     */
    #[Optional]
    public ?string $filename;

    /**
     * `new DocServiceDocumentUploadURL()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DocServiceDocumentUploadURL::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DocServiceDocumentUploadURL)->withURL(...)
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
        string $url,
        ?string $customerReference = null,
        ?string $filename = null
    ): self {
        $self = new self;

        $self['url'] = $url;

        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $filename && $self['filename'] = $filename;

        return $self;
    }

    /**
     * If the file is already hosted publicly, you can provide a URL and have the documents service fetch it for you.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Optional reference string for customer tracking.
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
