<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voicemail\VoicemailUpdateParams\Greeting\Mode;

/**
 * Controls the greeting a caller hears before leaving a voicemail. Set `mode` to `default` to play the standard system greeting, or to `custom_greeting` to play your own audio. When `mode` is `custom_greeting`, `media_name` is required and must reference an audio file already uploaded to your account through the Media Storage API.
 *
 * @phpstan-type GreetingShape = array{
 *   mediaName?: string|null, mode?: null|Mode|value-of<Mode>
 * }
 */
final class Greeting implements BaseModel
{
    /** @use SdkModel<GreetingShape> */
    use SdkModel;

    /**
     * The name of the media file to play as the greeting. Required when `mode` is `custom_greeting`; ignored when `mode` is `default`. The value must match the `media_name` of a file you previously uploaded with the Media Storage API (`POST /v2/media`).
     */
    #[Optional('media_name', nullable: true)]
    public ?string $mediaName;

    /**
     * The greeting mode. `default` plays the standard system greeting. `custom_greeting` plays the audio referenced by `media_name`.
     *
     * @var value-of<Mode>|null $mode
     */
    #[Optional(enum: Mode::class)]
    public ?string $mode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Mode|value-of<Mode>|null $mode
     */
    public static function with(
        ?string $mediaName = null,
        Mode|string|null $mode = null
    ): self {
        $self = new self;

        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $mode && $self['mode'] = $mode;

        return $self;
    }

    /**
     * The name of the media file to play as the greeting. Required when `mode` is `custom_greeting`; ignored when `mode` is `default`. The value must match the `media_name` of a file you previously uploaded with the Media Storage API (`POST /v2/media`).
     */
    public function withMediaName(?string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * The greeting mode. `default` plays the standard system greeting. `custom_greeting` plays the audio referenced by `media_name`.
     *
     * @param Mode|value-of<Mode> $mode
     */
    public function withMode(Mode|string $mode): self
    {
        $self = clone $this;
        $self['mode'] = $mode;

        return $self;
    }
}
