<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
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
    #[Api(list: DocServiceDocument::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   av_scan_status?: value-of<AvScanStatus>|null,
     *   content_type?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   filename?: string|null,
     *   record_type?: string|null,
     *   sha256?: string|null,
     *   size?: Size|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     *   av_scan_status?: value-of<AvScanStatus>|null,
     *   content_type?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   filename?: string|null,
     *   record_type?: string|null,
     *   sha256?: string|null,
     *   size?: Size|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
