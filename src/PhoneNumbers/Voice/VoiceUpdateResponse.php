<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;

/**
 * @phpstan-type VoiceUpdateResponseShape = array{
 *   data?: PhoneNumberWithVoiceSettings
 * }
 */
final class VoiceUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VoiceUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PhoneNumberWithVoiceSettings $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PhoneNumberWithVoiceSettings $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PhoneNumberWithVoiceSettings $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
