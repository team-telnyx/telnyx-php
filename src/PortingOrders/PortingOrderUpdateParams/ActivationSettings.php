<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActivationSettingsShape = array{
 *   focDatetimeRequested?: \DateTimeInterface|null
 * }
 */
final class ActivationSettings implements BaseModel
{
    /** @use SdkModel<ActivationSettingsShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    #[Optional('foc_datetime_requested')]
    public ?\DateTimeInterface $focDatetimeRequested;

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
        ?\DateTimeInterface $focDatetimeRequested = null
    ): self {
        $obj = new self;

        null !== $focDatetimeRequested && $obj['focDatetimeRequested'] = $focDatetimeRequested;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    public function withFocDatetimeRequested(
        \DateTimeInterface $focDatetimeRequested
    ): self {
        $obj = clone $this;
        $obj['focDatetimeRequested'] = $focDatetimeRequested;

        return $obj;
    }
}
