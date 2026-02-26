<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;
use Telnyx\TextToSpeech\TextToSpeechStreamParams\AudioFormat;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TextToSpeechContract
{
    /**
     * @api
     *
     * @param string $elevenlabsAPIKeyRef Reference to your ElevenLabs API key stored in the Telnyx Portal
     * @param Provider|value-of<Provider> $provider Filter voices by provider
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listVoices(
        ?string $elevenlabsAPIKeyRef = null,
        Provider|string|null $provider = null,
        RequestOptions|array|null $requestOptions = null,
    ): TextToSpeechListVoicesResponse;

    /**
     * @api
     *
     * @param AudioFormat|value-of<AudioFormat> $audioFormat Audio output format override. Supported for Telnyx `Natural`/`NaturalHD` models only. Accepted values: `pcm`, `wav`.
     * @param bool $disableCache when `true`, bypass the audio cache and generate fresh audio
     * @param string $modelID Model identifier for the chosen provider. Examples: `Natural`, `NaturalHD` (Telnyx); `Polly.Generative` (AWS).
     * @param \Telnyx\TextToSpeech\TextToSpeechStreamParams\Provider|value-of<\Telnyx\TextToSpeech\TextToSpeechStreamParams\Provider> $provider TTS provider. Defaults to `telnyx` if not specified. Ignored when `voice` is provided.
     * @param string $socketID Client-provided socket identifier for tracking. If not provided, one is generated server-side.
     * @param string $voice Voice identifier in the format `provider.model_id.voice_id` or `provider.voice_id` (e.g. `telnyx.NaturalHD.Telnyx_Alloy` or `azure.en-US-AvaMultilingualNeural`). When provided, the `provider`, `model_id`, and `voice_id` are extracted automatically. Takes precedence over individual `provider`/`model_id`/`voice_id` parameters.
     * @param string $voiceID voice identifier for the chosen provider
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stream(
        AudioFormat|string|null $audioFormat = null,
        bool $disableCache = false,
        ?string $modelID = null,
        \Telnyx\TextToSpeech\TextToSpeechStreamParams\Provider|string $provider = 'telnyx',
        ?string $socketID = null,
        ?string $voice = null,
        ?string $voiceID = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
