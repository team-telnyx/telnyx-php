<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a background job to update the emergency settings of a collection of phone numbers. At most one thousand numbers can be updated per API call.
 *
 * @see Telnyx\Services\PhoneNumbers\JobsService::updateEmergencySettingsBatch()
 *
 * @phpstan-type JobUpdateEmergencySettingsBatchParamsShape = array{
 *   emergencyEnabled: bool,
 *   phoneNumbers: list<string>,
 *   emergencyAddressID?: string|null,
 * }
 */
final class JobUpdateEmergencySettingsBatchParams implements BaseModel
{
    /** @use SdkModel<JobUpdateEmergencySettingsBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Indicates whether to enable or disable emergency services on the numbers.
     */
    #[Required('emergency_enabled')]
    public bool $emergencyEnabled;

    /** @var list<string> $phoneNumbers */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * Identifies the address to be used with emergency services. Required if emergency_enabled is true, must be null or omitted if emergency_enabled is false.
     */
    #[Optional('emergency_address_id', nullable: true)]
    public ?string $emergencyAddressID;

    /**
     * `new JobUpdateEmergencySettingsBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobUpdateEmergencySettingsBatchParams::with(
     *   emergencyEnabled: ..., phoneNumbers: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JobUpdateEmergencySettingsBatchParams)
     *   ->withEmergencyEnabled(...)
     *   ->withPhoneNumbers(...)
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
     *
     * @param list<string> $phoneNumbers
     */
    public static function with(
        bool $emergencyEnabled,
        array $phoneNumbers,
        ?string $emergencyAddressID = null,
    ): self {
        $obj = new self;

        $obj['emergencyEnabled'] = $emergencyEnabled;
        $obj['phoneNumbers'] = $phoneNumbers;

        null !== $emergencyAddressID && $obj['emergencyAddressID'] = $emergencyAddressID;

        return $obj;
    }

    /**
     * Indicates whether to enable or disable emergency services on the numbers.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj['emergencyEnabled'] = $emergencyEnabled;

        return $obj;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Identifies the address to be used with emergency services. Required if emergency_enabled is true, must be null or omitted if emergency_enabled is false.
     */
    public function withEmergencyAddressID(?string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj['emergencyAddressID'] = $emergencyAddressID;

        return $obj;
    }
}
