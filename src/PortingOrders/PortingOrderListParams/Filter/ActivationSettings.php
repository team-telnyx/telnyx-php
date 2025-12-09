<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings\FocDatetimeRequested;

/**
 * @phpstan-type ActivationSettingsShape = array{
 *   fastPortEligible?: bool|null, focDatetimeRequested?: FocDatetimeRequested|null
 * }
 */
final class ActivationSettings implements BaseModel
{
    /** @use SdkModel<ActivationSettingsShape> */
    use SdkModel;

    /**
     * Filter results by fast port eligible.
     */
    #[Optional('fast_port_eligible')]
    public ?bool $fastPortEligible;

    /**
     * FOC datetime range filtering operations.
     */
    #[Optional('foc_datetime_requested')]
    public ?FocDatetimeRequested $focDatetimeRequested;

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
     * } $focDatetimeRequested
     */
    public static function with(
        ?bool $fastPortEligible = null,
        FocDatetimeRequested|array|null $focDatetimeRequested = null,
    ): self {
        $obj = new self;

        null !== $fastPortEligible && $obj['fastPortEligible'] = $fastPortEligible;
        null !== $focDatetimeRequested && $obj['focDatetimeRequested'] = $focDatetimeRequested;

        return $obj;
    }

    /**
     * Filter results by fast port eligible.
     */
    public function withFastPortEligible(bool $fastPortEligible): self
    {
        $obj = clone $this;
        $obj['fastPortEligible'] = $fastPortEligible;

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
        $obj['focDatetimeRequested'] = $focDatetimeRequested;

        return $obj;
    }
}
