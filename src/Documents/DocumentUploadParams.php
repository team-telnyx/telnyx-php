<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
 *
 * @see Telnyx\DocumentsService::upload()
 *
 * @phpstan-type DocumentUploadParamsShape = array{
 *   url: string, customer_reference?: string, filename?: string, file: string
 * }
 */
final class DocumentUploadParams implements BaseModel
{
    /** @use SdkModel<DocumentUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * If the file is already hosted publicly, you can provide a URL and have the documents service fetch it for you.
     */
    #[Api]
    public string $url;

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
     * The Base64 encoded contents of the file you are uploading.
     */
    #[Api]
    public string $file;

    /**
     * `new DocumentUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DocumentUploadParams::with(url: ..., file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DocumentUploadParams)->withURL(...)->withFile(...)
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
        string $file,
        ?string $customer_reference = null,
        ?string $filename = null,
    ): self {
        $obj = new self;

        $obj->url = $url;
        $obj->file = $file;

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

    /**
     * The Base64 encoded contents of the file you are uploading.
     */
    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }
}
