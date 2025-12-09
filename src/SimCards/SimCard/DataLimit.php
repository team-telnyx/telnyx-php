<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCard;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCard\DataLimit\Unit;

/**
 * The SIM card individual data limit configuration.
 *
 * @phpstan-type DataLimitShape = array{
 *   amount?: string|null, unit?: value-of<Unit>|null
 * }
 */
final class DataLimit implements BaseModel
{
    /** @use SdkModel<DataLimitShape> */
    use SdkModel;

    #[Optional]
    public ?string $amount;

    /** @var value-of<Unit>|null $unit */
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
     * @param Unit|value-of<Unit> $unit
     */
    public static function with(
        ?string $amount = null,
        Unit|string|null $unit = null
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $unit && $self['unit'] = $unit;

        return $self;
    }

    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * @param Unit|value-of<Unit> $unit
     */
    public function withUnit(Unit|string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }
}
