<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a document.
 *
 * @see Telnyx\Services\DocumentsService::update()
 *
 * @phpstan-type DocumentUpdateParamsShape = array{
 *   customer_reference?: string, filename?: string
 * }
 */
final class DocumentUpdateParams implements BaseModel
{
    /** @use SdkModel<DocumentUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?string $customer_reference = null,
        ?string $filename = null
    ): self {
        $obj = new self;

        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $filename && $obj['filename'] = $filename;

        return $obj;
    }

    /**
     * Optional reference string for customer tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * The filename of the document.
     */
    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj['filename'] = $filename;

        return $obj;
    }
}
