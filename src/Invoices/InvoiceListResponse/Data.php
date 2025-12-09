<?php

declare(strict_types=1);

namespace Telnyx\Invoices\InvoiceListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   fileID?: string|null,
 *   invoiceID?: string|null,
 *   paid?: bool|null,
 *   periodEnd?: \DateTimeInterface|null,
 *   periodStart?: \DateTimeInterface|null,
 *   url?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('file_id')]
    public ?string $fileID;

    #[Optional('invoice_id')]
    public ?string $invoiceID;

    #[Optional]
    public ?bool $paid;

    #[Optional('period_end')]
    public ?\DateTimeInterface $periodEnd;

    #[Optional('period_start')]
    public ?\DateTimeInterface $periodStart;

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
        ?\DateTimeInterface $periodEnd = null,
        ?\DateTimeInterface $periodStart = null,
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

    public function withPeriodEnd(\DateTimeInterface $periodEnd): self
    {
        $self = clone $this;
        $self['periodEnd'] = $periodEnd;

        return $self;
    }

    public function withPeriodStart(\DateTimeInterface $periodStart): self
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
