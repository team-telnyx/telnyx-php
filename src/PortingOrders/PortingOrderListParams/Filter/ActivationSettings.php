<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings\FocDatetimeRequested;

/**
 * @phpstan-import-type FocDatetimeRequestedShape from \Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings\FocDatetimeRequested
 *
 * @phpstan-type ActivationSettingsShape = array{
 *   fastPortEligible?: bool|null,
 *   focDatetimeRequested?: null|FocDatetimeRequested|FocDatetimeRequestedShape,
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
     * @param FocDatetimeRequested|FocDatetimeRequestedShape|null $focDatetimeRequested
     */
    public static function with(
        ?bool $fastPortEligible = null,
        FocDatetimeRequested|array|null $focDatetimeRequested = null,
    ): self {
        $self = new self;

        null !== $fastPortEligible && $self['fastPortEligible'] = $fastPortEligible;
        null !== $focDatetimeRequested && $self['focDatetimeRequested'] = $focDatetimeRequested;

        return $self;
    }

    /**
     * Filter results by fast port eligible.
     */
    public function withFastPortEligible(bool $fastPortEligible): self
    {
        $self = clone $this;
        $self['fastPortEligible'] = $fastPortEligible;

        return $self;
    }

    /**
     * FOC datetime range filtering operations.
     *
     * @param FocDatetimeRequested|FocDatetimeRequestedShape $focDatetimeRequested
     */
    public function withFocDatetimeRequested(
        FocDatetimeRequested|array $focDatetimeRequested
    ): self {
        $self = clone $this;
        $self['focDatetimeRequested'] = $focDatetimeRequested;

        return $self;
    }
}
