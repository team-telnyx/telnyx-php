<?php

declare(strict_types=1);

namespace Telnyx\Invoices;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Invoices\InvoiceGetResponse\Data;

/**
 * @phpstan-type InvoiceGetResponseShape = array{data?: Data|null}
 */
final class InvoiceGetResponse implements BaseModel
{
    /** @use SdkModel<InvoiceGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   download_url?: string|null,
     *   file_id?: string|null,
     *   invoice_id?: string|null,
     *   paid?: bool|null,
     *   period_end?: \DateTimeInterface|null,
     *   period_start?: \DateTimeInterface|null,
     *   url?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   download_url?: string|null,
     *   file_id?: string|null,
     *   invoice_id?: string|null,
     *   paid?: bool|null,
     *   period_end?: \DateTimeInterface|null,
     *   period_start?: \DateTimeInterface|null,
     *   url?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
