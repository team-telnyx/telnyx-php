<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type activation_settings = array{
 *   focDatetimeRequested?: \DateTimeInterface
 * }
 */
final class ActivationSettings implements BaseModel
{
    /** @use SdkModel<activation_settings> */
    use SdkModel;

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    #[Api('foc_datetime_requested', optional: true)]
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

        null !== $focDatetimeRequested && $obj->focDatetimeRequested = $focDatetimeRequested;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    public function withFocDatetimeRequested(
        \DateTimeInterface $focDatetimeRequested
    ): self {
        $obj = clone $this;
        $obj->focDatetimeRequested = $focDatetimeRequested;

        return $obj;
    }
}
