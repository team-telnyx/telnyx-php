<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentUploadParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DocumentShape = array{
 *   customerReference?: string|null,
 *   file?: string|null,
 *   filename?: string|null,
 *   url?: string|null,
 * }
 */
final class Document implements BaseModel
{
    /** @use SdkModel<DocumentShape> */
    use SdkModel;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Alternatively, instead of the URL you can provide the Base64 encoded contents of the file you are uploading.
     */
    #[Optional]
    public ?string $file;

    /**
     * The filename of the document.
     */
    #[Optional]
    public ?string $filename;

    /**
     * If the file is already hosted publicly, you can provide a URL and have the documents service fetch it for you.
     */
    #[Optional]
    public ?string $url;

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
        ?string $customerReference = null,
        ?string $file = null,
        ?string $filename = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $file && $self['file'] = $file;
        null !== $filename && $self['filename'] = $filename;
        null !== $url && $self['url'] = $url;

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
     * Alternatively, instead of the URL you can provide the Base64 encoded contents of the file you are uploading.
     */
    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

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

    /**
     * If the file is already hosted publicly, you can provide a URL and have the documents service fetch it for you.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
