<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voicemail\VoicemailRequest\Greeting;

/**
 * @phpstan-import-type GreetingShape from \Telnyx\PhoneNumbers\Voicemail\VoicemailRequest\Greeting
 *
 * @phpstan-type VoicemailRequestShape = array{
 *   enabled?: bool|null, greeting?: null|Greeting|GreetingShape, pin?: string|null
 * }
 */
final class VoicemailRequest implements BaseModel
{
    /** @use SdkModel<VoicemailRequestShape> */
    use SdkModel;

    /**
     * Whether voicemail is enabled.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * Controls the greeting a caller hears before leaving a voicemail. Set `mode` to `default` to play the standard system greeting, or to `custom_greeting` to play your own audio. When `mode` is `custom_greeting`, `media_name` is required and must reference an audio file already uploaded to your account through the Media Storage API.
     */
    #[Optional]
    public ?Greeting $greeting;

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
     *
     * @param Greeting|GreetingShape|null $greeting
     */
    public static function with(
        ?bool $enabled = null,
        Greeting|array|null $greeting = null,
        ?string $pin = null
    ): self {
        $self = new self;

        null !== $enabled && $self['enabled'] = $enabled;
        null !== $greeting && $self['greeting'] = $greeting;
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
     * Controls the greeting a caller hears before leaving a voicemail. Set `mode` to `default` to play the standard system greeting, or to `custom_greeting` to play your own audio. When `mode` is `custom_greeting`, `media_name` is required and must reference an audio file already uploaded to your account through the Media Storage API.
     *
     * @param Greeting|GreetingShape $greeting
     */
    public function withGreeting(Greeting|array $greeting): self
    {
        $self = clone $this;
        $self['greeting'] = $greeting;

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
