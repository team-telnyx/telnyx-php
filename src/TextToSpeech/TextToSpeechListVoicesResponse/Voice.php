<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A voice available for text-to-speech synthesis.
 *
 * @phpstan-type VoiceShape = array{
 *   gender?: string|null,
 *   language?: string|null,
 *   name?: string|null,
 *   provider?: string|null,
 *   voiceID?: string|null,
 * }
 */
final class Voice implements BaseModel
{
    /** @use SdkModel<VoiceShape> */
    use SdkModel;

    /**
     * Voice gender.
     */
    #[Optional]
    public ?string $gender;

    /**
     * Language code.
     */
    #[Optional]
    public ?string $language;

    /**
     * Voice name.
     */
    #[Optional]
    public ?string $name;

    /**
     * The TTS provider.
     */
    #[Optional]
    public ?string $provider;

    /**
     * Voice identifier.
     */
    #[Optional('voice_id')]
    public ?string $voiceID;

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
        ?string $gender = null,
        ?string $language = null,
        ?string $name = null,
        ?string $provider = null,
        ?string $voiceID = null,
    ): self {
        $self = new self;

        null !== $gender && $self['gender'] = $gender;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $provider && $self['provider'] = $provider;
        null !== $voiceID && $self['voiceID'] = $voiceID;

        return $self;
    }

    /**
     * Voice gender.
     */
    public function withGender(string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * Language code.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Voice name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The TTS provider.
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Voice identifier.
     */
    public function withVoiceID(string $voiceID): self
    {
        $self = clone $this;
        $self['voiceID'] = $voiceID;

        return $self;
    }
}
