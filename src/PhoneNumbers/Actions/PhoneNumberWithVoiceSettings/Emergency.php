<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency\EmergencyStatus;

/**
 * The emergency services settings for a phone number.
 *
 * @phpstan-type EmergencyShape = array{
 *   emergencyAddressID?: string|null,
 *   emergencyEnabled?: bool|null,
 *   emergencyStatus?: value-of<EmergencyStatus>|null,
 * }
 */
final class Emergency implements BaseModel
{
    /** @use SdkModel<EmergencyShape> */
    use SdkModel;

    /**
     * Identifies the address to be used with emergency services.
     */
    #[Optional('emergency_address_id')]
    public ?string $emergencyAddressID;

    /**
     * Allows you to enable or disable emergency services on the phone number. In order to enable emergency services, you must also set an emergency_address_id.
     */
    #[Optional('emergency_enabled')]
    public ?bool $emergencyEnabled;

    /**
     * Represents the state of the number regarding emergency activation.
     *
     * @var value-of<EmergencyStatus>|null $emergencyStatus
     */
    #[Optional('emergency_status', enum: EmergencyStatus::class)]
    public ?string $emergencyStatus;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EmergencyStatus|value-of<EmergencyStatus> $emergencyStatus
     */
    public static function with(
        ?string $emergencyAddressID = null,
        ?bool $emergencyEnabled = null,
        EmergencyStatus|string|null $emergencyStatus = null,
    ): self {
        $self = new self;

        null !== $emergencyAddressID && $self['emergencyAddressID'] = $emergencyAddressID;
        null !== $emergencyEnabled && $self['emergencyEnabled'] = $emergencyEnabled;
        null !== $emergencyStatus && $self['emergencyStatus'] = $emergencyStatus;

        return $self;
    }

    /**
     * Identifies the address to be used with emergency services.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $self = clone $this;
        $self['emergencyAddressID'] = $emergencyAddressID;

        return $self;
    }

    /**
     * Allows you to enable or disable emergency services on the phone number. In order to enable emergency services, you must also set an emergency_address_id.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $self = clone $this;
        $self['emergencyEnabled'] = $emergencyEnabled;

        return $self;
    }

    /**
     * Represents the state of the number regarding emergency activation.
     *
     * @param EmergencyStatus|value-of<EmergencyStatus> $emergencyStatus
     */
    public function withEmergencyStatus(
        EmergencyStatus|string $emergencyStatus
    ): self {
        $self = clone $this;
        $self['emergencyStatus'] = $emergencyStatus;

        return $self;
    }
}
