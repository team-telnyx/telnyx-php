<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a document.
 *
 * @see Telnyx\Services\DocumentsService::update()
 *
 * @phpstan-type DocumentUpdateParamsShape = array{
 *   customerReference?: string, filename?: string
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
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * The filename of the document.
     */
    #[Optional]
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
        ?string $customerReference = null,
        ?string $filename = null
    ): self {
        $obj = new self;

        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $filename && $obj['filename'] = $filename;

        return $obj;
    }

    /**
     * Optional reference string for customer tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

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
