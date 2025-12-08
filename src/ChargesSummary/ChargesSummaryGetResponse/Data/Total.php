<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TotalShape = array{
 *   credits: string,
 *   existing_mrc: string,
 *   grand_total: string,
 *   ledger_adjustments: string,
 *   new_mrc: string,
 *   new_otc: string,
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
    #[Required]
    public string $existing_mrc;

    /**
     * Grand total of all charges as decimal string.
     */
    #[Required]
    public string $grand_total;

    /**
     * Ledger adjustments as decimal string.
     */
    #[Required]
    public string $ledger_adjustments;

    /**
     * Total new monthly recurring charges as decimal string.
     */
    #[Required]
    public string $new_mrc;

    /**
     * Total new one-time charges as decimal string.
     */
    #[Required]
    public string $new_otc;

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
     *   existing_mrc: ...,
     *   grand_total: ...,
     *   ledger_adjustments: ...,
     *   new_mrc: ...,
     *   new_otc: ...,
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
        string $existing_mrc,
        string $grand_total,
        string $ledger_adjustments,
        string $new_mrc,
        string $new_otc,
        string $other,
    ): self {
        $obj = new self;

        $obj['credits'] = $credits;
        $obj['existing_mrc'] = $existing_mrc;
        $obj['grand_total'] = $grand_total;
        $obj['ledger_adjustments'] = $ledger_adjustments;
        $obj['new_mrc'] = $new_mrc;
        $obj['new_otc'] = $new_otc;
        $obj['other'] = $other;

        return $obj;
    }

    /**
     * Total credits as decimal string.
     */
    public function withCredits(string $credits): self
    {
        $obj = clone $this;
        $obj['credits'] = $credits;

        return $obj;
    }

    /**
     * Total existing monthly recurring charges as decimal string.
     */
    public function withExistingMrc(string $existingMrc): self
    {
        $obj = clone $this;
        $obj['existing_mrc'] = $existingMrc;

        return $obj;
    }

    /**
     * Grand total of all charges as decimal string.
     */
    public function withGrandTotal(string $grandTotal): self
    {
        $obj = clone $this;
        $obj['grand_total'] = $grandTotal;

        return $obj;
    }

    /**
     * Ledger adjustments as decimal string.
     */
    public function withLedgerAdjustments(string $ledgerAdjustments): self
    {
        $obj = clone $this;
        $obj['ledger_adjustments'] = $ledgerAdjustments;

        return $obj;
    }

    /**
     * Total new monthly recurring charges as decimal string.
     */
    public function withNewMrc(string $newMrc): self
    {
        $obj = clone $this;
        $obj['new_mrc'] = $newMrc;

        return $obj;
    }

    /**
     * Total new one-time charges as decimal string.
     */
    public function withNewOtc(string $newOtc): self
    {
        $obj = clone $this;
        $obj['new_otc'] = $newOtc;

        return $obj;
    }

    /**
     * Other charges as decimal string.
     */
    public function withOther(string $other): self
    {
        $obj = clone $this;
        $obj['other'] = $other;

        return $obj;
    }
}
