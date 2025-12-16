<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument;

/**
 * Creates a list of additional documents for a porting order.
 *
 * @see Telnyx\Services\PortingOrders\AdditionalDocumentsService::create()
 *
 * @phpstan-import-type AdditionalDocumentShape from \Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument
 *
 * @phpstan-type AdditionalDocumentCreateParamsShape = array{
 *   additionalDocuments?: list<AdditionalDocumentShape>|null
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
     * @param list<AdditionalDocumentShape> $additionalDocuments
     */
    public static function with(?array $additionalDocuments = null): self
    {
        $self = new self;

        null !== $additionalDocuments && $self['additionalDocuments'] = $additionalDocuments;

        return $self;
    }

    /**
     * @param list<AdditionalDocumentShape> $additionalDocuments
     */
    public function withAdditionalDocuments(array $additionalDocuments): self
    {
        $self = clone $this;
        $self['additionalDocuments'] = $additionalDocuments;

        return $self;
    }
}
