<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TotalShape = array{
 *   credits: string,
 *   existingMrc: string,
 *   grandTotal: string,
 *   ledgerAdjustments: string,
 *   newMrc: string,
 *   newOtc: string,
 *   other: string,
 * }
 */
final class Total implements BaseModel
{
    /** @use SdkModel<TotalShape> */
    use SdkModel;

    /**
     * Total credits as decimal string.
     */
    #[Required]
    public string $credits;

    /**
     * Total existing monthly recurring charges as decimal string.
     */
    #[Required('existing_mrc')]
    public string $existingMrc;

    /**
     * Grand total of all charges as decimal string.
     */
    #[Required('grand_total')]
    public string $grandTotal;

    /**
     * Ledger adjustments as decimal string.
     */
    #[Required('ledger_adjustments')]
    public string $ledgerAdjustments;

    /**
     * Total new monthly recurring charges as decimal string.
     */
    #[Required('new_mrc')]
    public string $newMrc;

    /**
     * Total new one-time charges as decimal string.
     */
    #[Required('new_otc')]
    public string $newOtc;

    /**
     * Other charges as decimal string.
     */
    #[Required]
    public string $other;

    /**
     * `new Total()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Total::with(
     *   credits: ...,
     *   existingMrc: ...,
     *   grandTotal: ...,
     *   ledgerAdjustments: ...,
     *   newMrc: ...,
     *   newOtc: ...,
     *   other: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Total)
     *   ->withCredits(...)
     *   ->withExistingMrc(...)
     *   ->withGrandTotal(...)
     *   ->withLedgerAdjustments(...)
     *   ->withNewMrc(...)
     *   ->withNewOtc(...)
     *   ->withOther(...)
     * ```
     */
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
        string $credits,
        string $existingMrc,
        string $grandTotal,
        string $ledgerAdjustments,
        string $newMrc,
        string $newOtc,
        string $other,
    ): self {
        $self = new self;

        $self['credits'] = $credits;
        $self['existingMrc'] = $existingMrc;
        $self['grandTotal'] = $grandTotal;
        $self['ledgerAdjustments'] = $ledgerAdjustments;
        $self['newMrc'] = $newMrc;
        $self['newOtc'] = $newOtc;
        $self['other'] = $other;

        return $self;
    }

    /**
     * Total credits as decimal string.
     */
    public function withCredits(string $credits): self
    {
        $self = clone $this;
        $self['credits'] = $credits;

        return $self;
    }

    /**
     * Total existing monthly recurring charges as decimal string.
     */
    public function withExistingMrc(string $existingMrc): self
    {
        $self = clone $this;
        $self['existingMrc'] = $existingMrc;

        return $self;
    }

    /**
     * Grand total of all charges as decimal string.
     */
    public function withGrandTotal(string $grandTotal): self
    {
        $self = clone $this;
        $self['grandTotal'] = $grandTotal;

        return $self;
    }

    /**
     * Ledger adjustments as decimal string.
     */
    public function withLedgerAdjustments(string $ledgerAdjustments): self
    {
        $self = clone $this;
        $self['ledgerAdjustments'] = $ledgerAdjustments;

        return $self;
    }

    /**
     * Total new monthly recurring charges as decimal string.
     */
    public function withNewMrc(string $newMrc): self
    {
        $self = clone $this;
        $self['newMrc'] = $newMrc;

        return $self;
    }

    /**
     * Total new one-time charges as decimal string.
     */
    public function withNewOtc(string $newOtc): self
    {
        $self = clone $this;
        $self['newOtc'] = $newOtc;

        return $self;
    }

    /**
     * Other charges as decimal string.
     */
    public function withOther(string $other): self
    {
        $self = clone $this;
        $self['other'] = $other;

        return $self;
    }
}
