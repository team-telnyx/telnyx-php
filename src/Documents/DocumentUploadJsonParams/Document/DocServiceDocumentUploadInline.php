<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentUploadJsonParams\Document;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DocServiceDocumentUploadInlineShape = array{
 *   file: string, customer_reference?: string|null, filename?: string|null
 * }
 */
final class DocServiceDocumentUploadInline implements BaseModel
{
    /** @use SdkModel<DocServiceDocumentUploadInlineShape> */
    use SdkModel;

    /**
     * The Base64 encoded contents of the file you are uploading.
     */
    #[Api]
    public string $file;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * The filename of the document.
     */
    #[Api(optional: true)]
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
        ?string $customer_reference = null,
        ?string $filename = null
    ): self {
        $obj = new self;

        $obj->file = $file;

        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $filename && $obj->filename = $filename;

        return $obj;
    }

    /**
     * The Base64 encoded contents of the file you are uploading.
     */
    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
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
