<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AdditionalDocumentDeleteParams); // set properties as needed
 * $client->portingOrders.additionalDocuments->delete(...$params->toArray());
 * ```
 * Deletes an additional document for a porting order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.additionalDocuments->delete(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\AdditionalDocuments->delete
 *
 * @phpstan-type additional_document_delete_params = array{id: string}
 */
final class AdditionalDocumentDeleteParams implements BaseModel
{
    /** @use SdkModel<additional_document_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * `new AdditionalDocumentDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AdditionalDocumentDeleteParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AdditionalDocumentDeleteParams)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
