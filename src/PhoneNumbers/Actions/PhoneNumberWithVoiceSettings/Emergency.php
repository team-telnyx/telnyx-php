<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency\EmergencyStatus;

/**
 * The emergency services settings for a phone number.
 *
 * @phpstan-type emergency_alias = array{
 *   emergencyAddressID?: string,
 *   emergencyEnabled?: bool,
 *   emergencyStatus?: value-of<EmergencyStatus>,
 * }
 */
final class Emergency implements BaseModel
{
    /** @use SdkModel<emergency_alias> */
    use SdkModel;

    /**
     * Identifies the address to be used with emergency services.
     */
    #[Api('emergency_address_id', optional: true)]
    public ?string $emergencyAddressID;

    /**
     * Allows you to enable or disable emergency services on the phone number. In order to enable emergency services, you must also set an emergency_address_id.
     */
    #[Api('emergency_enabled', optional: true)]
    public ?bool $emergencyEnabled;

    /**
     * Represents the state of the number regarding emergency activation.
     *
     * @var value-of<EmergencyStatus>|null $emergencyStatus
     */
    #[Api('emergency_status', enum: EmergencyStatus::class, optional: true)]
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
        $obj = new self;

        null !== $emergencyAddressID && $obj->emergencyAddressID = $emergencyAddressID;
        null !== $emergencyEnabled && $obj->emergencyEnabled = $emergencyEnabled;
        null !== $emergencyStatus && $obj->emergencyStatus = $emergencyStatus instanceof EmergencyStatus ? $emergencyStatus->value : $emergencyStatus;

        return $obj;
    }

    /**
     * Identifies the address to be used with emergency services.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj->emergencyAddressID = $emergencyAddressID;

        return $obj;
    }

    /**
     * Allows you to enable or disable emergency services on the phone number. In order to enable emergency services, you must also set an emergency_address_id.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj->emergencyEnabled = $emergencyEnabled;

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
        $obj->emergencyStatus = $emergencyStatus instanceof EmergencyStatus ? $emergencyStatus->value : $emergencyStatus;

        return $obj;
    }
}
