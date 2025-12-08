<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderActivationSettings\ActivationStatus;

/**
 * @phpstan-type PortingOrderActivationSettingsShape = array{
 *   activation_status?: value-of<ActivationStatus>|null,
 *   fast_port_eligible?: bool|null,
 *   foc_datetime_actual?: \DateTimeInterface|null,
 *   foc_datetime_requested?: \DateTimeInterface|null,
 * }
 */
final class PortingOrderActivationSettings implements BaseModel
{
    /** @use SdkModel<PortingOrderActivationSettingsShape> */
    use SdkModel;

    /**
     * Activation status.
     *
     * @var value-of<ActivationStatus>|null $activation_status
     */
    #[Optional(enum: ActivationStatus::class, nullable: true)]
    public ?string $activation_status;

    /**
     * Indicates whether this porting order is eligible for FastPort.
     */
    #[Optional]
    public ?bool $fast_port_eligible;

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    #[Optional(nullable: true)]
    public ?\DateTimeInterface $foc_datetime_actual;

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    #[Optional(nullable: true)]
    public ?\DateTimeInterface $foc_datetime_requested;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ActivationStatus|value-of<ActivationStatus>|null $activation_status
     */
    public static function with(
        ActivationStatus|string|null $activation_status = null,
        ?bool $fast_port_eligible = null,
        ?\DateTimeInterface $foc_datetime_actual = null,
        ?\DateTimeInterface $foc_datetime_requested = null,
    ): self {
        $obj = new self;

        null !== $activation_status && $obj['activation_status'] = $activation_status;
        null !== $fast_port_eligible && $obj['fast_port_eligible'] = $fast_port_eligible;
        null !== $foc_datetime_actual && $obj['foc_datetime_actual'] = $foc_datetime_actual;
        null !== $foc_datetime_requested && $obj['foc_datetime_requested'] = $foc_datetime_requested;

        return $obj;
    }

    /**
     * Activation status.
     *
     * @param ActivationStatus|value-of<ActivationStatus>|null $activationStatus
     */
    public function withActivationStatus(
        ActivationStatus|string|null $activationStatus
    ): self {
        $obj = clone $this;
        $obj['activation_status'] = $activationStatus;

        return $obj;
    }

    /**
     * Indicates whether this porting order is eligible for FastPort.
     */
    public function withFastPortEligible(bool $fastPortEligible): self
    {
        $obj = clone $this;
        $obj['fast_port_eligible'] = $fastPortEligible;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    public function withFocDatetimeActual(
        ?\DateTimeInterface $focDatetimeActual
    ): self {
        $obj = clone $this;
        $obj['foc_datetime_actual'] = $focDatetimeActual;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    public function withFocDatetimeRequested(
        ?\DateTimeInterface $focDatetimeRequested
    ): self {
        $obj = clone $this;
        $obj['foc_datetime_requested'] = $focDatetimeRequested;

        return $obj;
    }
}
