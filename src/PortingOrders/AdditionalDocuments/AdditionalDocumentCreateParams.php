<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AdditionalDocumentCreateParams); // set properties as needed
 * $client->portingOrders.additionalDocuments->create(...$params->toArray());
 * ```
 * Creates a list of additional documents for a porting order.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.additionalDocuments->create(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\AdditionalDocuments->create
 *
 * @phpstan-type additional_document_create_params = array{
 *   additionalDocuments?: list<AdditionalDocument>
 * }
 */
final class AdditionalDocumentCreateParams implements BaseModel
{
    /** @use SdkModel<additional_document_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<AdditionalDocument>|null $additionalDocuments */
    #[Api(
        'additional_documents',
        list: AdditionalDocument::class,
        optional: true
    )]
    public ?array $additionalDocuments;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AdditionalDocument> $additionalDocuments
     */
    public static function with(?array $additionalDocuments = null): self
    {
        $obj = new self;

        null !== $additionalDocuments && $obj->additionalDocuments = $additionalDocuments;

        return $obj;
    }

    /**
     * @param list<AdditionalDocument> $additionalDocuments
     */
    public function withAdditionalDocuments(array $additionalDocuments): self
    {
        $obj = clone $this;
        $obj->additionalDocuments = $additionalDocuments;

        return $obj;
    }
}
