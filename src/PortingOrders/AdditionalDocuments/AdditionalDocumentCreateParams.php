<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument\DocumentType;

/**
 * Creates a list of additional documents for a porting order.
 *
 * @see Telnyx\Services\PortingOrders\AdditionalDocumentsService::create()
 *
 * @phpstan-type AdditionalDocumentCreateParamsShape = array{
 *   additionalDocuments?: list<AdditionalDocument|array{
 *     documentID?: string|null, documentType?: value-of<DocumentType>|null
 *   }>,
 * }
 */
final class AdditionalDocumentCreateParams implements BaseModel
{
    /** @use SdkModel<AdditionalDocumentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<AdditionalDocument>|null $additionalDocuments */
    #[Optional('additional_documents', list: AdditionalDocument::class)]
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
     * @param list<AdditionalDocument|array{
     *   documentID?: string|null, documentType?: value-of<DocumentType>|null
     * }> $additionalDocuments
     */
    public static function with(?array $additionalDocuments = null): self
    {
        $obj = new self;

        null !== $additionalDocuments && $obj['additionalDocuments'] = $additionalDocuments;

        return $obj;
    }

    /**
     * @param list<AdditionalDocument|array{
     *   documentID?: string|null, documentType?: value-of<DocumentType>|null
     * }> $additionalDocuments
     */
    public function withAdditionalDocuments(array $additionalDocuments): self
    {
        $obj = clone $this;
        $obj['additionalDocuments'] = $additionalDocuments;

        return $obj;
    }
}
