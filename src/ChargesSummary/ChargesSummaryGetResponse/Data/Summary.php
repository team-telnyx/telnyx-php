<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Adjustment;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\ComparativeLine;
use Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line\SimpleLine;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AdjustmentShape from \Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Adjustment
 * @phpstan-import-type LineShape from \Telnyx\ChargesSummary\ChargesSummaryGetResponse\Data\Summary\Line
 *
 * @phpstan-type SummaryShape = array{
 *   adjustments: list<AdjustmentShape>, lines: list<LineShape>
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
     * @var list<ComparativeLine|SimpleLine> $lines
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
     * @param list<AdjustmentShape> $adjustments
     * @param list<LineShape> $lines
     */
    public static function with(array $adjustments, array $lines): self
    {
        $self = new self;

        $self['adjustments'] = $adjustments;
        $self['lines'] = $lines;

        return $self;
    }

    /**
     * List of billing adjustments.
     *
     * @param list<AdjustmentShape> $adjustments
     */
    public function withAdjustments(array $adjustments): self
    {
        $self = clone $this;
        $self['adjustments'] = $adjustments;

        return $self;
    }

    /**
     * List of charge summary lines.
     *
     * @param list<LineShape> $lines
     */
    public function withLines(array $lines): self
    {
        $self = clone $this;
        $self['lines'] = $lines;

        return $self;
    }
}
