<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Enable emergency for a phone number.
 *
 * @see Telnyx\PhoneNumbers\Actions->enableEmergency
 *
 * @phpstan-type action_enable_emergency_params = array{
 *   emergencyAddressID: string, emergencyEnabled: bool
 * }
 */
final class ActionEnableEmergencyParams implements BaseModel
{
    /** @use SdkModel<action_enable_emergency_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the address to be used with emergency services.
     */
    #[Api('emergency_address_id')]
    public string $emergencyAddressID;

    /**
     * Indicates whether to enable emergency services on this number.
     */
    #[Api('emergency_enabled')]
    public bool $emergencyEnabled;

    /**
     * `new ActionEnableEmergencyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionEnableEmergencyParams::with(
     *   emergencyAddressID: ..., emergencyEnabled: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionEnableEmergencyParams)
     *   ->withEmergencyAddressID(...)
     *   ->withEmergencyEnabled(...)
     * ```
     */
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
        string $emergencyAddressID,
        bool $emergencyEnabled
    ): self {
        $obj = new self;

        $obj->emergencyAddressID = $emergencyAddressID;
        $obj->emergencyEnabled = $emergencyEnabled;

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
     * Indicates whether to enable emergency services on this number.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj->emergencyEnabled = $emergencyEnabled;

        return $obj;
    }
}
