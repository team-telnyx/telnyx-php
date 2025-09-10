<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SupportingDocumentCreateParams); // set properties as needed
 * $client->portouts.supportingDocuments->create(...$params->toArray());
 * ```
 * Creates a list of supporting documents on a portout request.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portouts.supportingDocuments->create(...$params->toArray());`
 *
 * @see Telnyx\Portouts\SupportingDocuments->create
 *
 * @phpstan-type supporting_document_create_params = array{
 *   documents?: list<Document>
 * }
 */
final class SupportingDocumentCreateParams implements BaseModel
{
    /** @use SdkModel<supporting_document_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * List of supporting documents parameters.
     *
     * @var list<Document>|null $documents
     */
    #[Api(list: Document::class, optional: true)]
    public ?array $documents;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Document> $documents
     */
    public static function with(?array $documents = null): self
    {
        $obj = new self;

        null !== $documents && $obj->documents = $documents;

        return $obj;
    }

    /**
     * List of supporting documents parameters.
     *
     * @param list<Document> $documents
     */
    public function withDocuments(array $documents): self
    {
        $obj = clone $this;
        $obj->documents = $documents;

        return $obj;
    }
}
