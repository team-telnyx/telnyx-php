<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;

/**
 * Retrieve a list of available voices from one or all TTS providers. When `provider` is specified, returns voices for that provider only. Otherwise, returns voices from all providers.
 *
 * Some providers (ElevenLabs, Resemble) require an API key to list voices.
 *
 * @see Telnyx\Services\TextToSpeechService::listVoices()
 *
 * @phpstan-type TextToSpeechListVoicesParamsShape = array{
 *   apiKey?: string|null, provider?: null|Provider|value-of<Provider>
 * }
 */
final class TextToSpeechListVoicesParams implements BaseModel
{
    /** @use SdkModel<TextToSpeechListVoicesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * API key for providers that require one to list voices (e.g. ElevenLabs).
     */
    #[Optional]
    public ?string $apiKey;

    /**
     * Filter voices by provider. If omitted, voices from all providers are returned.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Provider|value-of<Provider>|null $provider
     */
    public static function with(
        ?string $apiKey = null,
        Provider|string|null $provider = null
    ): self {
        $self = new self;

        null !== $apiKey && $self['apiKey'] = $apiKey;
        null !== $provider && $self['provider'] = $provider;

        return $self;
    }

    /**
     * API key for providers that require one to list voices (e.g. ElevenLabs).
     */
    public function withAPIKey(string $apiKey): self
    {
        $self = clone $this;
        $self['apiKey'] = $apiKey;

        return $self;
    }

    /**
     * Filter voices by provider. If omitted, voices from all providers are returned.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }
}
