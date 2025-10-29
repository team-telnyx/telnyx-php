<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data;

use Telnyx\Core\Attributes\Api;
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
    #[Api]
    public string $credits;

    /**
     * Total existing monthly recurring charges as decimal string.
     */
    #[Api('existing_mrc')]
    public string $existingMrc;

    /**
     * Grand total of all charges as decimal string.
     */
    #[Api('grand_total')]
    public string $grandTotal;

    /**
     * Ledger adjustments as decimal string.
     */
    #[Api('ledger_adjustments')]
    public string $ledgerAdjustments;

    /**
     * Total new monthly recurring charges as decimal string.
     */
    #[Api('new_mrc')]
    public string $newMrc;

    /**
     * Total new one-time charges as decimal string.
     */
    #[Api('new_otc')]
    public string $newOtc;

    /**
     * Other charges as decimal string.
     */
    #[Api]
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
        $obj = new self;

        $obj->credits = $credits;
        $obj->existingMrc = $existingMrc;
        $obj->grandTotal = $grandTotal;
        $obj->ledgerAdjustments = $ledgerAdjustments;
        $obj->newMrc = $newMrc;
        $obj->newOtc = $newOtc;
        $obj->other = $other;

        return $obj;
    }

    /**
     * Total credits as decimal string.
     */
    public function withCredits(string $credits): self
    {
        $obj = clone $this;
        $obj->credits = $credits;

        return $obj;
    }

    /**
     * Total existing monthly recurring charges as decimal string.
     */
    public function withExistingMrc(string $existingMrc): self
    {
        $obj = clone $this;
        $obj->existingMrc = $existingMrc;

        return $obj;
    }

    /**
     * Grand total of all charges as decimal string.
     */
    public function withGrandTotal(string $grandTotal): self
    {
        $obj = clone $this;
        $obj->grandTotal = $grandTotal;

        return $obj;
    }

    /**
     * Ledger adjustments as decimal string.
     */
    public function withLedgerAdjustments(string $ledgerAdjustments): self
    {
        $obj = clone $this;
        $obj->ledgerAdjustments = $ledgerAdjustments;

        return $obj;
    }

    /**
     * Total new monthly recurring charges as decimal string.
     */
    public function withNewMrc(string $newMrc): self
    {
        $obj = clone $this;
        $obj->newMrc = $newMrc;

        return $obj;
    }

    /**
     * Total new one-time charges as decimal string.
     */
    public function withNewOtc(string $newOtc): self
    {
        $obj = clone $this;
        $obj->newOtc = $newOtc;

        return $obj;
    }

    /**
     * Other charges as decimal string.
     */
    public function withOther(string $other): self
    {
        $obj = clone $this;
        $obj->other = $other;

        return $obj;
    }
}
