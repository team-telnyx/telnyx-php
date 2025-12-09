<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create voicemail settings for a phone number.
 *
 * @see Telnyx\Services\PhoneNumbers\VoicemailService::create()
 *
 * @phpstan-type VoicemailCreateParamsShape = array{enabled?: bool, pin?: string}
 */
final class VoicemailCreateParams implements BaseModel
{
    /** @use SdkModel<VoicemailCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether voicemail is enabled.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * The pin used for voicemail.
     */
    #[Optional]
    public ?string $pin;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $enabled = null, ?string $pin = null): self
    {
        $self = new self;

        null !== $enabled && $self['enabled'] = $enabled;
        null !== $pin && $self['pin'] = $pin;

        return $self;
    }

    /**
     * Whether voicemail is enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * The pin used for voicemail.
     */
    public function withPin(string $pin): self
    {
        $self = clone $this;
        $self['pin'] = $pin;

        return $self;
    }
}
