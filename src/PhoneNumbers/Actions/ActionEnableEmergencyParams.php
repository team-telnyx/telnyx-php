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
 * @see Telnyx\Services\PhoneNumbers\ActionsService::enableEmergency()
 *
 * @phpstan-type ActionEnableEmergencyParamsShape = array{
 *   emergency_address_id: string, emergency_enabled: bool
 * }
 */
final class ActionEnableEmergencyParams implements BaseModel
{
    /** @use SdkModel<ActionEnableEmergencyParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the address to be used with emergency services.
     */
    #[Api]
    public string $emergency_address_id;

    /**
     * Indicates whether to enable emergency services on this number.
     */
    #[Api]
    public bool $emergency_enabled;

    /**
     * `new ActionEnableEmergencyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionEnableEmergencyParams::with(
     *   emergency_address_id: ..., emergency_enabled: ...
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
        string $emergency_address_id,
        bool $emergency_enabled
    ): self {
        $obj = new self;

        $obj['emergency_address_id'] = $emergency_address_id;
        $obj['emergency_enabled'] = $emergency_enabled;

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
     * Indicates whether to enable emergency services on this number.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj['emergency_enabled'] = $emergencyEnabled;

        return $obj;
    }
}
