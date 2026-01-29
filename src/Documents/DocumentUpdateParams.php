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
 *   customerReference?: string|null, filename?: string|null
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
        $self = new self;

        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $filename && $self['filename'] = $filename;

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
