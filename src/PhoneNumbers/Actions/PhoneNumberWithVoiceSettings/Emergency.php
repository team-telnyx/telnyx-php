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
 *   emergency_address_id?: string|null,
 *   emergency_enabled?: bool|null,
 *   emergency_status?: value-of<EmergencyStatus>|null,
 * }
 */
final class Emergency implements BaseModel
{
    /** @use SdkModel<EmergencyShape> */
    use SdkModel;

    /**
     * Identifies the address to be used with emergency services.
     */
    #[Optional]
    public ?string $emergency_address_id;

    /**
     * Allows you to enable or disable emergency services on the phone number. In order to enable emergency services, you must also set an emergency_address_id.
     */
    #[Optional]
    public ?bool $emergency_enabled;

    /**
     * Represents the state of the number regarding emergency activation.
     *
     * @var value-of<EmergencyStatus>|null $emergency_status
     */
    #[Optional(enum: EmergencyStatus::class)]
    public ?string $emergency_status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EmergencyStatus|value-of<EmergencyStatus> $emergency_status
     */
    public static function with(
        ?string $emergency_address_id = null,
        ?bool $emergency_enabled = null,
        EmergencyStatus|string|null $emergency_status = null,
    ): self {
        $obj = new self;

        null !== $emergency_address_id && $obj['emergency_address_id'] = $emergency_address_id;
        null !== $emergency_enabled && $obj['emergency_enabled'] = $emergency_enabled;
        null !== $emergency_status && $obj['emergency_status'] = $emergency_status;

        return $obj;
    }

    /**
     * Identifies the address to be used with emergency services.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj['emergency_address_id'] = $emergencyAddressID;

        return $obj;
    }

    /**
     * Allows you to enable or disable emergency services on the phone number. In order to enable emergency services, you must also set an emergency_address_id.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj['emergency_enabled'] = $emergencyEnabled;

        return $obj;
    }

    /**
     * Represents the state of the number regarding emergency activation.
     *
     * @param EmergencyStatus|value-of<EmergencyStatus> $emergencyStatus
     */
    public function withEmergencyStatus(
        EmergencyStatus|string $emergencyStatus
    ): self {
        $obj = clone $this;
        $obj['emergency_status'] = $emergencyStatus;

        return $obj;
    }
}
