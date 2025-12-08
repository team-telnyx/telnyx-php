<?php

declare(strict_types=1);

namespace Telnyx\Invoices\InvoiceListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   file_id?: string|null,
 *   invoice_id?: string|null,
 *   paid?: bool|null,
 *   period_end?: \DateTimeInterface|null,
 *   period_start?: \DateTimeInterface|null,
 *   url?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $file_id;

    #[Optional]
    public ?string $invoice_id;

    #[Optional]
    public ?bool $paid;

    #[Optional]
    public ?\DateTimeInterface $period_end;

    #[Optional]
    public ?\DateTimeInterface $period_start;

    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $file_id = null,
        ?string $invoice_id = null,
        ?bool $paid = null,
        ?\DateTimeInterface $period_end = null,
        ?\DateTimeInterface $period_start = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $file_id && $obj['file_id'] = $file_id;
        null !== $invoice_id && $obj['invoice_id'] = $invoice_id;
        null !== $paid && $obj['paid'] = $paid;
        null !== $period_end && $obj['period_end'] = $period_end;
        null !== $period_start && $obj['period_start'] = $period_start;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    public function withFileID(string $fileID): self
    {
        $obj = clone $this;
        $obj['file_id'] = $fileID;

        return $obj;
    }

    public function withInvoiceID(string $invoiceID): self
    {
        $obj = clone $this;
        $obj['invoice_id'] = $invoiceID;

        return $obj;
    }

    public function withPaid(bool $paid): self
    {
        $obj = clone $this;
        $obj['paid'] = $paid;

        return $obj;
    }

    public function withPeriodEnd(\DateTimeInterface $periodEnd): self
    {
        $obj = clone $this;
        $obj['period_end'] = $periodEnd;

        return $obj;
    }

    public function withPeriodStart(\DateTimeInterface $periodStart): self
    {
        $obj = clone $this;
        $obj['period_start'] = $periodStart;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
