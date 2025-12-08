<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse\Data;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse\Data\DocumentType;

/**
 * @phpstan-type AdditionalDocumentNewResponseShape = array{data?: list<Data>|null}
 */
final class AdditionalDocumentNewResponse implements BaseModel
{
    /** @use SdkModel<AdditionalDocumentNewResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
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
     * @param list<Data|array{
     *   id?: string|null,
     *   content_type?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_id?: string|null,
     *   document_type?: value-of<DocumentType>|null,
     *   filename?: string|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   content_type?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   document_id?: string|null,
     *   document_type?: value-of<DocumentType>|null,
     *   filename?: string|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
