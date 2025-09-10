<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DocumentUpdateParams); // set properties as needed
 * $client->documents->update(...$params->toArray());
 * ```
 * Update a document.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->documents->update(...$params->toArray());`
 *
 * @see Telnyx\Documents->update
 *
 * @phpstan-type document_update_params = array{
 *   customerReference?: string, filename?: string
 * }
 */
final class DocumentUpdateParams implements BaseModel
{
    /** @use SdkModel<document_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional reference string for customer tracking.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

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
        ?string $customerReference = null,
        ?string $filename = null
    ): self {
        $obj = new self;

        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $filename && $obj->filename = $filename;

        return $obj;
    }

    /**
     * Optional reference string for customer tracking.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

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
