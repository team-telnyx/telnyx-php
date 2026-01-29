<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;

/**
 * @phpstan-import-type PhoneNumberWithVoiceSettingsShape from \Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings
 *
 * @phpstan-type VoiceGetResponseShape = array{
 *   data?: null|PhoneNumberWithVoiceSettings|PhoneNumberWithVoiceSettingsShape
 * }
 */
final class VoiceGetResponse implements BaseModel
{
    /** @use SdkModel<VoiceGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PhoneNumberWithVoiceSettings $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberWithVoiceSettings|PhoneNumberWithVoiceSettingsShape|null $data
     */
    public static function with(
        PhoneNumberWithVoiceSettings|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PhoneNumberWithVoiceSettings|PhoneNumberWithVoiceSettingsShape $data
     */
    public function withData(PhoneNumberWithVoiceSettings|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
