<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsResponse\DownlinkData\Unit;

/**
 * @phpstan-type DownlinkDataShape = array{
 *   amount?: float|null, unit?: null|Unit|value-of<Unit>
 * }
 */
final class DownlinkData implements BaseModel
{
    /** @use SdkModel<DownlinkDataShape> */
    use SdkModel;

    /**
     * Downlink data.
     */
    #[Optional]
    public ?float $amount;

    /**
     * Transmission unit.
     *
     * @var value-of<Unit>|null $unit
     */
    #[Optional(enum: Unit::class)]
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
     * @param Unit|value-of<Unit>|null $unit
     */
    public static function with(
        ?float $amount = null,
        Unit|string|null $unit = null
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $unit && $self['unit'] = $unit;

        return $self;
    }

    /**
     * Downlink data.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Transmission unit.
     *
     * @param Unit|value-of<Unit> $unit
     */
    public function withUnit(Unit|string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }
}
