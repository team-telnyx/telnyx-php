<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TextToSpeechListVoicesParams); // set properties as needed
 * $client->textToSpeech->listVoices(...$params->toArray());
 * ```
 * Returns a list of voices that can be used with the text to speech commands.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->textToSpeech->listVoices(...$params->toArray());`
 *
 * @see Telnyx\TextToSpeech->listVoices
 *
 * @phpstan-type text_to_speech_list_voices_params = array{
 *   elevenlabsAPIKeyRef?: string, provider?: Provider|value-of<Provider>
 * }
 */
final class TextToSpeechListVoicesParams implements BaseModel
{
    /** @use SdkModel<text_to_speech_list_voices_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Reference to your ElevenLabs API key stored in the Telnyx Portal.
     */
    #[Api(optional: true)]
    public ?string $elevenlabsAPIKeyRef;

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
        ?string $elevenlabsAPIKeyRef = null,
        Provider|string|null $provider = null
    ): self {
        $obj = new self;

        null !== $elevenlabsAPIKeyRef && $obj->elevenlabsAPIKeyRef = $elevenlabsAPIKeyRef;
        null !== $provider && $obj->provider = $provider instanceof Provider ? $provider->value : $provider;

        return $obj;
    }

    /**
     * Reference to your ElevenLabs API key stored in the Telnyx Portal.
     */
    public function withElevenlabsAPIKeyRef(string $elevenlabsAPIKeyRef): self
    {
        $obj = clone $this;
        $obj->elevenlabsAPIKeyRef = $elevenlabsAPIKeyRef;

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
        $obj->provider = $provider instanceof Provider ? $provider->value : $provider;

        return $obj;
    }
}
