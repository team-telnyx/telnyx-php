<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification\Threshold\Unit;

/**
 * Data usage threshold that will trigger the notification.
 *
 * @phpstan-type ThresholdShape = array{
 *   amount?: string|null, unit?: value-of<Unit>|null
 * }
 */
final class Threshold implements BaseModel
{
    /** @use SdkModel<ThresholdShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $amount;

    /** @var value-of<Unit>|null $unit */
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
        ?string $amount = null,
        Unit|string|null $unit = null
    ): self {
        $obj = new self;

        null !== $amount && $obj->amount = $amount;
        null !== $unit && $obj['unit'] = $unit;

        return $obj;
    }

    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * @param Unit|value-of<Unit> $unit
     */
    public function withUnit(Unit|string $unit): self
    {
        $obj = clone $this;
        $obj['unit'] = $unit;

        return $obj;
    }
}
