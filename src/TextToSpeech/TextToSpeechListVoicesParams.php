<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;

/**
 * Returns a list of voices that can be used with the text to speech commands.
 *
 * @see Telnyx\Services\TextToSpeechService::listVoices()
 *
 * @phpstan-type TextToSpeechListVoicesParamsShape = array{
 *   elevenlabsAPIKeyRef?: string, provider?: Provider|value-of<Provider>
 * }
 */
final class TextToSpeechListVoicesParams implements BaseModel
{
    /** @use SdkModel<TextToSpeechListVoicesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Reference to your ElevenLabs API key stored in the Telnyx Portal.
     */
    #[Optional]
    public ?string $elevenlabsAPIKeyRef;

    /**
     * Filter voices by provider.
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
     * @param Provider|value-of<Provider> $provider
     */
    public static function with(
        ?string $elevenlabsAPIKeyRef = null,
        Provider|string|null $provider = null
    ): self {
        $self = new self;

        null !== $elevenlabsAPIKeyRef && $self['elevenlabsAPIKeyRef'] = $elevenlabsAPIKeyRef;
        null !== $provider && $self['provider'] = $provider;

        return $self;
    }

    /**
     * Reference to your ElevenLabs API key stored in the Telnyx Portal.
     */
    public function withElevenlabsAPIKeyRef(string $elevenlabsAPIKeyRef): self
    {
        $self = clone $this;
        $self['elevenlabsAPIKeyRef'] = $elevenlabsAPIKeyRef;

        return $self;
    }

    /**
     * Filter voices by provider.
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
