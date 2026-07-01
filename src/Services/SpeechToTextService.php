<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SpeechToTextContract;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\Provider;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse;
use Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams\InputFormat;
use Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams\Model;
use Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams\TranscriptionEngine;
use Telnyx\SpeechToText\SttServiceType;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SpeechToTextService implements SpeechToTextContract
{
    /**
     * @api
     */
    public SpeechToTextRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpeechToTextRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the canonical list of supported speech-to-text providers, models, accepted language codes, and the service types each model supports.
     *
     * Service types:
     *   * `streaming` — standalone WebSocket transcription via `/speech-to-text/transcription`.
     *   * `file_based` — file-based transcription via `/ai/audio/transcriptions`.
     *   * `in_call` — live call transcription via Call Control `transcription_start`.
     *   * `ai_assistant` — STT configured on a Call Control AI Assistant via voice-assistant `TranscriptionConfig` (covers both live-streaming and non-streaming/batch models).
     *
     * Use this endpoint to discover which (provider, model) combinations are available for the surface you need, and which language codes each accepts. `auto` in a `languages` array indicates the provider performs language detection.
     *
     * @param Provider|value-of<Provider> $provider Filter to entries for a specific STT provider. The enum mirrors the providers advertised across the speech-to-text spec (including `google` and `telnyx`, which are accepted as WebSocket transcription engines). A provider that has no models currently registered for any service type will return an empty `data` array rather than an error.
     * @param SttServiceType|value-of<SttServiceType> $serviceType Filter to entries that support the given service type. For backward compatibility with the values that briefly shipped before the product-aligned rename, the legacy aliases `file_transcription`, `in_call_transcription`, and `ai_assistant_transcription` are silently accepted and normalized to `file_based`, `in_call`, and `ai_assistant` respectively. The response always emits the canonical (post-rename) values.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listProviders(
        Provider|string|null $provider = null,
        SttServiceType|string|null $serviceType = null,
        RequestOptions|array|null $requestOptions = null,
    ): SpeechToTextListProvidersResponse {
        $params = Util::removeNulls(
            ['provider' => $provider, 'serviceType' => $serviceType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listProviders(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Open a WebSocket connection to stream audio and receive transcriptions in real-time. Authentication is provided via the standard `Authorization: Bearer <API_KEY>` header.
     *
     * Supported engines: `Azure`, `Deepgram`, `Google`, `Telnyx`, `xAI`, `Speechmatics`, `Soniox`.
     *
     * **Connection flow:**
     * 1. Open WebSocket with query parameters specifying engine, input format, and language.
     * 2. Send binary audio frames (mp3/wav format).
     * 3. Receive JSON transcript frames with `transcript`, `is_final`, and `confidence` fields.
     * 4. Close connection when done.
     *
     * @param InputFormat|value-of<InputFormat> $inputFormat the format of input audio stream
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine the transcription engine to use for processing the audio stream
     * @param int $endpointing Silence duration (in milliseconds) that triggers end-of-speech detection. When set, the engine uses this value to determine when a speaker has stopped talking. Supported by `xAI`, `Deepgram`, `Google`, `Speechmatics`, and `Soniox`. `Soniox` accepts values between 500 and 3000. Other engines may not support this parameter.
     * @param bool $interimResults whether to receive interim transcription results
     * @param string $keyterm A key term to boost in the transcription. The engine will be more likely to recognize this term. Can be specified multiple times for multiple terms.
     * @param string $keywords Comma-separated list of keywords to boost in the transcription. The engine will prioritize recognition of these words.
     * @param string $language the language spoken in the audio stream
     * @param Model|value-of<Model> $model the specific model to use within the selected transcription engine
     * @param string $redact Enable redaction of sensitive information (e.g., PCI data, SSN) from transcription results. Supported values depend on the transcription engine.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveTranscription(
        InputFormat|string $inputFormat,
        TranscriptionEngine|string $transcriptionEngine,
        ?int $endpointing = null,
        ?bool $interimResults = null,
        ?string $keyterm = null,
        ?string $keywords = null,
        ?string $language = null,
        Model|string|null $model = null,
        ?string $redact = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'inputFormat' => $inputFormat,
                'transcriptionEngine' => $transcriptionEngine,
                'endpointing' => $endpointing,
                'interimResults' => $interimResults,
                'keyterm' => $keyterm,
                'keywords' => $keywords,
                'language' => $language,
                'model' => $model,
                'redact' => $redact,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveTranscription(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
