<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings\FocDatetimeRequested;

/**
 * @phpstan-type ActivationSettingsShape = array{
 *   fast_port_eligible?: bool|null,
 *   foc_datetime_requested?: FocDatetimeRequested|null,
 * }
 */
final class ActivationSettings implements BaseModel
{
    /** @use SdkModel<ActivationSettingsShape> */
    use SdkModel;

    /**
     * Filter results by fast port eligible.
     */
    #[Api(optional: true)]
    public ?bool $fast_port_eligible;

    /**
     * FOC datetime range filtering operations.
     */
    #[Api(optional: true)]
    public ?FocDatetimeRequested $foc_datetime_requested;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FocDatetimeRequested|array{
     *   gt?: string|null, lt?: string|null
     * } $foc_datetime_requested
     */
    public static function with(
        ?bool $fast_port_eligible = null,
        FocDatetimeRequested|array|null $foc_datetime_requested = null,
    ): self {
        $obj = new self;

        null !== $fast_port_eligible && $obj['fast_port_eligible'] = $fast_port_eligible;
        null !== $foc_datetime_requested && $obj['foc_datetime_requested'] = $foc_datetime_requested;

        return $obj;
    }

    /**
     * Filter results by fast port eligible.
     */
    public function withFastPortEligible(bool $fastPortEligible): self
    {
        $obj = clone $this;
        $obj['fast_port_eligible'] = $fastPortEligible;

        return $obj;
    }

    /**
     * FOC datetime range filtering operations.
     *
     * @param FocDatetimeRequested|array{
     *   gt?: string|null, lt?: string|null
     * } $focDatetimeRequested
     */
    public function withFocDatetimeRequested(
        FocDatetimeRequested|array $focDatetimeRequested
    ): self {
        $obj = clone $this;
        $obj['foc_datetime_requested'] = $focDatetimeRequested;

        return $obj;
    }
}
