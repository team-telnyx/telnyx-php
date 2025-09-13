<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderActivationSettings\ActivationStatus;

/**
 * @phpstan-type porting_order_activation_settings = array{
 *   activationStatus?: value-of<ActivationStatus>,
 *   fastPortEligible?: bool,
 *   focDatetimeActual?: \DateTimeInterface,
 *   focDatetimeRequested?: \DateTimeInterface,
 * }
 */
final class PortingOrderActivationSettings implements BaseModel
{
    /** @use SdkModel<porting_order_activation_settings> */
    use SdkModel;

    /**
     * Activation status.
     *
     * @var value-of<ActivationStatus>|null $activationStatus
     */
    #[Api('activation_status', enum: ActivationStatus::class, optional: true)]
    public ?string $activationStatus;

    /**
     * Indicates whether this porting order is eligible for FastPort.
     */
    #[Api('fast_port_eligible', optional: true)]
    public ?bool $fastPortEligible;

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    #[Api('foc_datetime_actual', optional: true)]
    public ?\DateTimeInterface $focDatetimeActual;

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
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activationStatus
     */
    public static function with(
        ActivationStatus|string|null $activationStatus = null,
        ?bool $fastPortEligible = null,
        ?\DateTimeInterface $focDatetimeActual = null,
        ?\DateTimeInterface $focDatetimeRequested = null,
    ): self {
        $obj = new self;

        null !== $activationStatus && $obj->activationStatus = $activationStatus instanceof ActivationStatus ? $activationStatus->value : $activationStatus;
        null !== $fastPortEligible && $obj->fastPortEligible = $fastPortEligible;
        null !== $focDatetimeActual && $obj->focDatetimeActual = $focDatetimeActual;
        null !== $focDatetimeRequested && $obj->focDatetimeRequested = $focDatetimeRequested;

        return $obj;
    }

    /**
     * Activation status.
     *
     * @param ActivationStatus|value-of<ActivationStatus> $activationStatus
     */
    public function withActivationStatus(
        ActivationStatus|string $activationStatus
    ): self {
        $obj = clone $this;
        $obj->activationStatus = $activationStatus instanceof ActivationStatus ? $activationStatus->value : $activationStatus;

        return $obj;
    }

    /**
     * Indicates whether this porting order is eligible for FastPort.
     */
    public function withFastPortEligible(bool $fastPortEligible): self
    {
        $obj = clone $this;
        $obj->fastPortEligible = $fastPortEligible;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    public function withFocDatetimeActual(
        \DateTimeInterface $focDatetimeActual
    ): self {
        $obj = clone $this;
        $obj->focDatetimeActual = $focDatetimeActual;

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
