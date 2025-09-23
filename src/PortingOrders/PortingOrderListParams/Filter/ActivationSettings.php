<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings\FocDatetimeRequested;

/**
 * @phpstan-type activation_settings = array{
 *   fastPortEligible?: bool, focDatetimeRequested?: FocDatetimeRequested
 * }
 */
final class ActivationSettings implements BaseModel
{
    /** @use SdkModel<activation_settings> */
    use SdkModel;

    /**
     * Filter results by fast port eligible.
     */
    #[Api('fast_port_eligible', optional: true)]
    public ?bool $fastPortEligible;

    /**
     * FOC datetime range filtering operations.
     */
    #[Api('foc_datetime_requested', optional: true)]
    public ?FocDatetimeRequested $focDatetimeRequested;

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
        ?bool $fastPortEligible = null,
        ?FocDatetimeRequested $focDatetimeRequested = null,
    ): self {
        $obj = new self;

        null !== $fastPortEligible && $obj->fastPortEligible = $fastPortEligible;
        null !== $focDatetimeRequested && $obj->focDatetimeRequested = $focDatetimeRequested;

        return $obj;
    }

    /**
     * Filter results by fast port eligible.
     */
    public function withFastPortEligible(bool $fastPortEligible): self
    {
        $obj = clone $this;
        $obj->fastPortEligible = $fastPortEligible;

        return $obj;
    }

    /**
     * FOC datetime range filtering operations.
     */
    public function withFocDatetimeRequested(
        FocDatetimeRequested $focDatetimeRequested
    ): self {
        $obj = clone $this;
        $obj->focDatetimeRequested = $focDatetimeRequested;

        return $obj;
    }
}
