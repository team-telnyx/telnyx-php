<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingAdditionalDocumentShape from \Telnyx\PortingOrders\AdditionalDocuments\PortingAdditionalDocument
 *
 * @phpstan-type AdditionalDocumentNewResponseShape = array{
 *   data?: list<PortingAdditionalDocument|PortingAdditionalDocumentShape>|null
 * }
 */
final class AdditionalDocumentNewResponse implements BaseModel
{
    /** @use SdkModel<AdditionalDocumentNewResponseShape> */
    use SdkModel;

    /** @var list<PortingAdditionalDocument>|null $data */
    #[Optional(list: PortingAdditionalDocument::class)]
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
     * @param list<PortingAdditionalDocument|PortingAdditionalDocumentShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<PortingAdditionalDocument|PortingAdditionalDocumentShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
