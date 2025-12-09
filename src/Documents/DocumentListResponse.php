<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocServiceDocument\AvScanStatus;
use Telnyx\Documents\DocServiceDocument\Size;
use Telnyx\Documents\DocServiceDocument\Status;

/**
 * @phpstan-type DocumentListResponseShape = array{
 *   data?: list<DocServiceDocument>|null, meta?: PaginationMeta|null
 * }
 */
final class DocumentListResponse implements BaseModel
{
    /** @use SdkModel<DocumentListResponseShape> */
    use SdkModel;

    /** @var list<DocServiceDocument>|null $data */
    #[Optional(list: DocServiceDocument::class)]
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
     * @param list<DocServiceDocument|array{
     *   id?: string|null,
     *   avScanStatus?: value-of<AvScanStatus>|null,
     *   contentType?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   filename?: string|null,
     *   recordType?: string|null,
     *   sha256?: string|null,
     *   size?: Size|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<DocServiceDocument|array{
     *   id?: string|null,
     *   avScanStatus?: value-of<AvScanStatus>|null,
     *   contentType?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   filename?: string|null,
     *   recordType?: string|null,
     *   sha256?: string|null,
     *   size?: Size|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
