<?php

declare(strict_types=1);

namespace Telnyx\Invoices;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InvoiceListResponseShape = array{
 *   fileID?: string|null,
 *   invoiceID?: string|null,
 *   paid?: bool|null,
 *   periodEnd?: string|null,
 *   periodStart?: string|null,
 *   url?: string|null,
 * }
 */
final class InvoiceListResponse implements BaseModel
{
    /** @use SdkModel<InvoiceListResponseShape> */
    use SdkModel;

    #[Optional('file_id')]
    public ?string $fileID;

    #[Optional('invoice_id')]
    public ?string $invoiceID;

    #[Optional]
    public ?bool $paid;

    #[Optional('period_end')]
    public ?string $periodEnd;

    #[Optional('period_start')]
    public ?string $periodStart;

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
        ?string $fileID = null,
        ?string $invoiceID = null,
        ?bool $paid = null,
        ?string $periodEnd = null,
        ?string $periodStart = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $fileID && $self['fileID'] = $fileID;
        null !== $invoiceID && $self['invoiceID'] = $invoiceID;
        null !== $paid && $self['paid'] = $paid;
        null !== $periodEnd && $self['periodEnd'] = $periodEnd;
        null !== $periodStart && $self['periodStart'] = $periodStart;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withFileID(string $fileID): self
    {
        $self = clone $this;
        $self['fileID'] = $fileID;

        return $self;
    }

    public function withInvoiceID(string $invoiceID): self
    {
        $self = clone $this;
        $self['invoiceID'] = $invoiceID;

        return $self;
    }

    public function withPaid(bool $paid): self
    {
        $self = clone $this;
        $self['paid'] = $paid;

        return $self;
    }

    public function withPeriodEnd(string $periodEnd): self
    {
        $self = clone $this;
        $self['periodEnd'] = $periodEnd;

        return $self;
    }

    public function withPeriodStart(string $periodStart): self
    {
        $self = clone $this;
        $self['periodStart'] = $periodStart;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
