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
 *   emergency_enabled: bool,
 *   phone_numbers: list<string>,
 *   emergency_address_id?: string|null,
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
    #[Required]
    public bool $emergency_enabled;

    /** @var list<string> $phone_numbers */
    #[Required(list: 'string')]
    public array $phone_numbers;

    /**
     * Identifies the address to be used with emergency services. Required if emergency_enabled is true, must be null or omitted if emergency_enabled is false.
     */
    #[Optional(nullable: true)]
    public ?string $emergency_address_id;

    /**
     * `new JobUpdateEmergencySettingsBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobUpdateEmergencySettingsBatchParams::with(
     *   emergency_enabled: ..., phone_numbers: ...
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
     * @param list<string> $phone_numbers
     */
    public static function with(
        bool $emergency_enabled,
        array $phone_numbers,
        ?string $emergency_address_id = null,
    ): self {
        $obj = new self;

        $obj['emergency_enabled'] = $emergency_enabled;
        $obj['phone_numbers'] = $phone_numbers;

        null !== $emergency_address_id && $obj['emergency_address_id'] = $emergency_address_id;

        return $obj;
    }

    /**
     * Indicates whether to enable or disable emergency services on the numbers.
     */
    public function withEmergencyEnabled(bool $emergencyEnabled): self
    {
        $obj = clone $this;
        $obj['emergency_enabled'] = $emergencyEnabled;

        return $obj;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Identifies the address to be used with emergency services. Required if emergency_enabled is true, must be null or omitted if emergency_enabled is false.
     */
    public function withEmergencyAddressID(?string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj['emergency_address_id'] = $emergencyAddressID;

        return $obj;
    }
}
