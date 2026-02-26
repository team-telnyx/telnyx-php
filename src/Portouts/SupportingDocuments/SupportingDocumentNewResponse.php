<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortOutSupportingDocumentShape from \Telnyx\Portouts\SupportingDocuments\PortOutSupportingDocument
 *
 * @phpstan-type SupportingDocumentNewResponseShape = array{
 *   data?: list<PortOutSupportingDocument|PortOutSupportingDocumentShape>|null
 * }
 */
final class SupportingDocumentNewResponse implements BaseModel
{
    /** @use SdkModel<SupportingDocumentNewResponseShape> */
    use SdkModel;

    /** @var list<PortOutSupportingDocument>|null $data */
    #[Optional(list: PortOutSupportingDocument::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortOutSupportingDocument|PortOutSupportingDocumentShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<PortOutSupportingDocument|PortOutSupportingDocumentShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
