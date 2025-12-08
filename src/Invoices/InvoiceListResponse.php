<?php

declare(strict_types=1);

namespace Telnyx\Invoices;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Invoices\InvoiceListResponse\Data;
use Telnyx\Invoices\InvoiceListResponse\Meta;

/**
 * @phpstan-type InvoiceListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class InvoiceListResponse implements BaseModel
{
    /** @use SdkModel<InvoiceListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

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
     *   file_id?: string|null,
     *   invoice_id?: string|null,
     *   paid?: bool|null,
     *   period_end?: \DateTimeInterface|null,
     *   period_start?: \DateTimeInterface|null,
     *   url?: string|null,
     * }> $data
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   file_id?: string|null,
     *   invoice_id?: string|null,
     *   paid?: bool|null,
     *   period_end?: \DateTimeInterface|null,
     *   period_start?: \DateTimeInterface|null,
     *   url?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
