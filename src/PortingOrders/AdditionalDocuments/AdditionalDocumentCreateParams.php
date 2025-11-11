<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument;

/**
 * Creates a list of additional documents for a porting order.
 *
 * @see Telnyx\PortingOrders\AdditionalDocuments->create
 *
 * @phpstan-type AdditionalDocumentCreateParamsShape = array{
 *   additional_documents?: list<AdditionalDocument>
 * }
 */
final class AdditionalDocumentCreateParams implements BaseModel
{
    /** @use SdkModel<AdditionalDocumentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<AdditionalDocument>|null $additional_documents */
    #[Api(list: AdditionalDocument::class, optional: true)]
    public ?array $additional_documents;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AdditionalDocument> $additional_documents
     */
    public static function with(?array $additional_documents = null): self
    {
        $obj = new self;

        null !== $additional_documents && $obj->additional_documents = $additional_documents;

        return $obj;
    }

    /**
     * @param list<AdditionalDocument> $additionalDocuments
     */
    public function withAdditionalDocuments(array $additionalDocuments): self
    {
        $obj = clone $this;
        $obj->additional_documents = $additionalDocuments;

        return $obj;
    }
}
