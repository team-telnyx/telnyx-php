<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Adjustment;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\Comparative;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\Simple;
use Telnyx\ChargesSummary\MonthDetail;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryShape = array{
 *   adjustments: list<Adjustment>, lines: list<Comparative|Simple>
 * }
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    /**
     * List of billing adjustments.
     *
     * @var list<Adjustment> $adjustments
     */
    #[Required(list: Adjustment::class)]
    public array $adjustments;

    /**
     * List of charge summary lines.
     *
     * @var list<Comparative|Simple> $lines
     */
    #[Required(list: Line::class)]
    public array $lines;

    /**
     * `new Summary()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Summary::with(adjustments: ..., lines: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Summary)->withAdjustments(...)->withLines(...)
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
     *
     * @param list<Adjustment|array{
     *   amount: string, description: string, event_date: \DateTimeInterface
     * }> $adjustments
     * @param list<Comparative|array{
     *   alias: string,
     *   existing_this_month: MonthDetail,
     *   name: string,
     *   new_this_month: MonthDetail,
     *   type: 'comparative',
     * }|Simple|array{
     *   alias: string, amount: string, name: string, quantity: int, type: 'simple'
     * }> $lines
     */
    public static function with(array $adjustments, array $lines): self
    {
        $obj = new self;

        $obj['adjustments'] = $adjustments;
        $obj['lines'] = $lines;

        return $obj;
    }

    /**
     * List of billing adjustments.
     *
     * @param list<Adjustment|array{
     *   amount: string, description: string, event_date: \DateTimeInterface
     * }> $adjustments
     */
    public function withAdjustments(array $adjustments): self
    {
        $obj = clone $this;
        $obj['adjustments'] = $adjustments;

        return $obj;
    }

    /**
     * List of charge summary lines.
     *
     * @param list<Comparative|array{
     *   alias: string,
     *   existing_this_month: MonthDetail,
     *   name: string,
     *   new_this_month: MonthDetail,
     *   type: 'comparative',
     * }|Simple|array{
     *   alias: string, amount: string, name: string, quantity: int, type: 'simple'
     * }> $lines
     */
    public function withLines(array $lines): self
    {
        $obj = clone $this;
        $obj['lines'] = $lines;

        return $obj;
    }
}
