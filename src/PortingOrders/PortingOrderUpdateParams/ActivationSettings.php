<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActivationSettingsShape = array{
 *   foc_datetime_requested?: \DateTimeInterface|null
 * }
 */
final class ActivationSettings implements BaseModel
{
    /** @use SdkModel<ActivationSettingsShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    #[Optional]
    public ?\DateTimeInterface $foc_datetime_requested;

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
        ?\DateTimeInterface $foc_datetime_requested = null
    ): self {
        $obj = new self;

        null !== $foc_datetime_requested && $obj['foc_datetime_requested'] = $foc_datetime_requested;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    public function withFocDatetimeRequested(
        \DateTimeInterface $focDatetimeRequested
    ): self {
        $obj = clone $this;
        $obj['foc_datetime_requested'] = $focDatetimeRequested;

        return $obj;
    }
}
