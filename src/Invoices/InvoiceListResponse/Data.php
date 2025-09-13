<?php

declare(strict_types=1);

namespace Telnyx\Invoices\InvoiceListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   fileID?: string,
 *   invoiceID?: string,
 *   paid?: bool,
 *   periodEnd?: \DateTimeInterface,
 *   periodStart?: \DateTimeInterface,
 *   url?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('file_id', optional: true)]
    public ?string $fileID;

    #[Api('invoice_id', optional: true)]
    public ?string $invoiceID;

    #[Api(optional: true)]
    public ?bool $paid;

    #[Api('period_end', optional: true)]
    public ?\DateTimeInterface $periodEnd;

    #[Api('period_start', optional: true)]
    public ?\DateTimeInterface $periodStart;

    #[Api(optional: true)]
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
        ?string $fileID = null,
        ?string $invoiceID = null,
        ?bool $paid = null,
        ?\DateTimeInterface $periodEnd = null,
        ?\DateTimeInterface $periodStart = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $fileID && $obj->fileID = $fileID;
        null !== $invoiceID && $obj->invoiceID = $invoiceID;
        null !== $paid && $obj->paid = $paid;
        null !== $periodEnd && $obj->periodEnd = $periodEnd;
        null !== $periodStart && $obj->periodStart = $periodStart;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    public function withFileID(string $fileID): self
    {
        $obj = clone $this;
        $obj->fileID = $fileID;

        return $obj;
    }

    public function withInvoiceID(string $invoiceID): self
    {
        $obj = clone $this;
        $obj->invoiceID = $invoiceID;

        return $obj;
    }

    public function withPaid(bool $paid): self
    {
        $obj = clone $this;
        $obj->paid = $paid;

        return $obj;
    }

    public function withPeriodEnd(\DateTimeInterface $periodEnd): self
    {
        $obj = clone $this;
        $obj->periodEnd = $periodEnd;

        return $obj;
    }

    public function withPeriodStart(\DateTimeInterface $periodStart): self
    {
        $obj = clone $this;
        $obj->periodStart = $periodStart;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
