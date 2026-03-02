<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * ElevenLabs provider-specific parameters.
 *
 * @phpstan-type ElevenlabsShape = array{
 *   apiKey?: string|null,
 *   languageCode?: string|null,
 *   voiceSettings?: array<string,mixed>|null,
 * }
 */
final class Elevenlabs implements BaseModel
{
    /** @use SdkModel<ElevenlabsShape> */
    use SdkModel;

    /**
     * Custom ElevenLabs API key. If not provided, the default Telnyx key is used.
     */
    #[Optional('api_key')]
    public ?string $apiKey;

    /**
     * Language code.
     */
    #[Optional('language_code')]
    public ?string $languageCode;

    /**
     * ElevenLabs voice settings (stability, similarity_boost, etc.).
     *
     * @var array<string,mixed>|null $voiceSettings
     */
    #[Optional('voice_settings', map: 'mixed')]
    public ?array $voiceSettings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $voiceSettings
     */
    public static function with(
        ?string $apiKey = null,
        ?string $languageCode = null,
        ?array $voiceSettings = null,
    ): self {
        $self = new self;

        null !== $apiKey && $self['apiKey'] = $apiKey;
        null !== $languageCode && $self['languageCode'] = $languageCode;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;

        return $self;
    }

    /**
     * Custom ElevenLabs API key. If not provided, the default Telnyx key is used.
     */
    public function withAPIKey(string $apiKey): self
    {
        $self = clone $this;
        $self['apiKey'] = $apiKey;

        return $self;
    }

    /**
     * Language code.
     */
    public function withLanguageCode(string $languageCode): self
    {
        $self = clone $this;
        $self['languageCode'] = $languageCode;

        return $self;
    }

    /**
     * ElevenLabs voice settings (stability, similarity_boost, etc.).
     *
     * @param array<string,mixed> $voiceSettings
     */
    public function withVoiceSettings(array $voiceSettings): self
    {
        $self = clone $this;
        $self['voiceSettings'] = $voiceSettings;

        return $self;
    }
}
