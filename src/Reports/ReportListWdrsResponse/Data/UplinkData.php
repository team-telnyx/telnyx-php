<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsResponse\Data\UplinkData\Unit;

/**
 * @phpstan-type UplinkDataShape = array{
 *   amount?: float|null, unit?: value-of<Unit>|null
 * }
 */
final class UplinkData implements BaseModel
{
    /** @use SdkModel<UplinkDataShape> */
    use SdkModel;

    /**
     * Uplink data.
     */
    #[Api(optional: true)]
    public ?float $amount;

    /**
     * Transmission unit.
     *
     * @var value-of<Unit>|null $unit
     */
    #[Api(enum: Unit::class, optional: true)]
    public ?string $unit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Unit|value-of<Unit> $unit
     */
    public static function with(
        ?float $amount = null,
        Unit|string|null $unit = null
    ): self {
        $obj = new self;

        null !== $amount && $obj->amount = $amount;
        null !== $unit && $obj['unit'] = $unit;

        return $obj;
    }

    /**
     * Uplink data.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Transmission unit.
     *
     * @param Unit|value-of<Unit> $unit
     */
    public function withUnit(Unit|string $unit): self
    {
        $obj = clone $this;
        $obj['unit'] = $unit;

        return $obj;
    }
}
