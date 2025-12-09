<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse\Data;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse\Data\DocumentType;

/**
 * @phpstan-type AdditionalDocumentListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class AdditionalDocumentListResponse implements BaseModel
{
    /** @use SdkModel<AdditionalDocumentListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

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
     *   contentType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentID?: string|null,
     *   documentType?: value-of<DocumentType>|null,
     *   filename?: string|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   contentType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentID?: string|null,
     *   documentType?: value-of<DocumentType>|null,
     *   filename?: string|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
