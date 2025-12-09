<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VoicemailPrefResponseShape = array{
 *   enabled?: bool|null, pin?: string|null
 * }
 */
final class VoicemailPrefResponse implements BaseModel
{
    /** @use SdkModel<VoicemailPrefResponseShape> */
    use SdkModel;

    /**
     * Whether voicemail is enabled.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * The pin used for the voicemail.
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
     * The pin used for the voicemail.
     */
    public function withPin(string $pin): self
    {
        $self = clone $this;
        $self['pin'] = $pin;

        return $self;
    }
}
