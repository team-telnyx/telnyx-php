<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type job_update_emergency_settings_batch_response = array{
 *   data?: PhoneNumbersJob|null
 * }
 */
final class JobUpdateEmergencySettingsBatchResponse implements BaseModel
{
    /** @use SdkModel<job_update_emergency_settings_batch_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PhoneNumbersJob $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PhoneNumbersJob $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PhoneNumbersJob $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
