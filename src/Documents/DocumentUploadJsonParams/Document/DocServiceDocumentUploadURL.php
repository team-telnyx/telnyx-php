<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentUploadJsonParams\Document;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DocServiceDocumentUploadURLShape = array{
 *   url: string, customer_reference?: string|null, filename?: string|null
 * }
 */
final class DocServiceDocumentUploadURL implements BaseModel
{
    /** @use SdkModel<DocServiceDocumentUploadURLShape> */
    use SdkModel;

    /**
     * If the file is already hosted publicly, you can provide a URL and have the documents service fetch it for you.
     */
    #[Api]
    public string $url;

    /**
     * Optional reference string for customer tracking.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * The filename of the document.
     */
    #[Api(optional: true)]
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
        ?string $customer_reference = null,
        ?string $filename = null
    ): self {
        $obj = new self;

        $obj->url = $url;

        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $filename && $obj->filename = $filename;

        return $obj;
    }

    /**
     * If the file is already hosted publicly, you can provide a URL and have the documents service fetch it for you.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * Optional reference string for customer tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

        return $obj;
    }

    /**
     * The filename of the document.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }
}
