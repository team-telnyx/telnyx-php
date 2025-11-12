<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Api;
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
 *   elevenlabs_api_key_ref?: string, provider?: Provider|value-of<Provider>
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
    #[Api(optional: true)]
    public ?string $elevenlabs_api_key_ref;

    /**
     * Filter voices by provider.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Api(enum: Provider::class, optional: true)]
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
        ?string $elevenlabs_api_key_ref = null,
        Provider|string|null $provider = null
    ): self {
        $obj = new self;

        null !== $elevenlabs_api_key_ref && $obj->elevenlabs_api_key_ref = $elevenlabs_api_key_ref;
        null !== $provider && $obj['provider'] = $provider;

        return $obj;
    }

    /**
     * Reference to your ElevenLabs API key stored in the Telnyx Portal.
     */
    public function withElevenlabsAPIKeyRef(string $elevenlabsAPIKeyRef): self
    {
        $obj = clone $this;
        $obj->elevenlabs_api_key_ref = $elevenlabsAPIKeyRef;

        return $obj;
    }

    /**
     * Filter voices by provider.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $obj = clone $this;
        $obj['provider'] = $provider;

        return $obj;
    }
}
