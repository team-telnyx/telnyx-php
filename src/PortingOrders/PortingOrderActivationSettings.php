<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderActivationSettings\ActivationStatus;

/**
 * @phpstan-type PortingOrderActivationSettingsShape = array{
 *   activationStatus?: value-of<ActivationStatus>|null,
 *   fastPortEligible?: bool|null,
 *   focDatetimeActual?: \DateTimeInterface|null,
 *   focDatetimeRequested?: \DateTimeInterface|null,
 * }
 */
final class PortingOrderActivationSettings implements BaseModel
{
    /** @use SdkModel<PortingOrderActivationSettingsShape> */
    use SdkModel;

    /**
     * Activation status.
     *
     * @var value-of<ActivationStatus>|null $activationStatus
     */
    #[Optional(
        'activation_status',
        enum: ActivationStatus::class,
        nullable: true
    )]
    public ?string $activationStatus;

    /**
     * Indicates whether this porting order is eligible for FastPort.
     */
    #[Optional('fast_port_eligible')]
    public ?bool $fastPortEligible;

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    #[Optional('foc_datetime_actual', nullable: true)]
    public ?\DateTimeInterface $focDatetimeActual;

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    #[Optional('foc_datetime_requested', nullable: true)]
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
     * @param ActivationStatus|value-of<ActivationStatus>|null $activationStatus
     */
    public static function with(
        ActivationStatus|string|null $activationStatus = null,
        ?bool $fastPortEligible = null,
        ?\DateTimeInterface $focDatetimeActual = null,
        ?\DateTimeInterface $focDatetimeRequested = null,
    ): self {
        $obj = new self;

        null !== $activationStatus && $obj['activationStatus'] = $activationStatus;
        null !== $fastPortEligible && $obj['fastPortEligible'] = $fastPortEligible;
        null !== $focDatetimeActual && $obj['focDatetimeActual'] = $focDatetimeActual;
        null !== $focDatetimeRequested && $obj['focDatetimeRequested'] = $focDatetimeRequested;

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
        $obj['activationStatus'] = $activationStatus;

        return $obj;
    }

    /**
     * Indicates whether this porting order is eligible for FastPort.
     */
    public function withFastPortEligible(bool $fastPortEligible): self
    {
        $obj = clone $this;
        $obj['fastPortEligible'] = $fastPortEligible;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    public function withFocDatetimeActual(
        ?\DateTimeInterface $focDatetimeActual
    ): self {
        $obj = clone $this;
        $obj['focDatetimeActual'] = $focDatetimeActual;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time requested for the FOC date.
     */
    public function withFocDatetimeRequested(
        ?\DateTimeInterface $focDatetimeRequested
    ): self {
        $obj = clone $this;
        $obj['focDatetimeRequested'] = $focDatetimeRequested;

        return $obj;
    }
}
