<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TextToSpeechContract;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;
use Telnyx\TextToSpeech\TextToSpeechStreamParams\AudioFormat;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TextToSpeechService implements TextToSpeechContract
{
    /**
     * @api
     */
    public TextToSpeechRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TextToSpeechRawService($client);
    }

    /**
     * @api
     *
     * Returns a list of voices that can be used with the text to speech commands.
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
    ): TextToSpeechListVoicesResponse {
        $params = Util::removeNulls(
            ['elevenlabsAPIKeyRef' => $elevenlabsAPIKeyRef, 'provider' => $provider]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listVoices(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Open a WebSocket connection to stream text and receive synthesized audio in real time. Authentication is provided via the standard `Authorization: Bearer <API_KEY>` header. Send JSON frames with text to synthesize; receive JSON frames containing base64-encoded audio chunks.
     *
     * Supported providers: `aws`, `telnyx`, `azure`, `murfai`, `minimax`, `rime`, `resemble`, `elevenlabs`.
     *
     * **Connection flow:**
     * 1. Open WebSocket with query parameters specifying provider, voice, and model.
     * 2. Send an initial handshake message `{"text": " "}` (single space) with optional `voice_settings` to initialize the session.
     * 3. Send text messages as `{"text": "Hello world"}`.
     * 4. Receive audio chunks as JSON frames with base64-encoded audio.
     * 5. A final frame with `isFinal: true` indicates the end of audio for the current text.
     *
     * To interrupt and restart synthesis mid-stream, send `{"force": true}` — the current worker is stopped and a new one is started.
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'audioFormat' => $audioFormat,
                'disableCache' => $disableCache,
                'modelID' => $modelID,
                'provider' => $provider,
                'socketID' => $socketID,
                'voice' => $voice,
                'voiceID' => $voiceID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stream(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
