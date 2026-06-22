<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SpeechToTextRawContract;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\Provider;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse;
use Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams;
use Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams\InputFormat;
use Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams\Model;
use Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams\TranscriptionEngine;
use Telnyx\SpeechToText\SttServiceType;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SpeechToTextRawService implements SpeechToTextRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   provider?: value-of<Provider>,
     *   serviceType?: SttServiceType|value-of<SttServiceType>,
     * }|SpeechToTextListProvidersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpeechToTextListProvidersResponse>
     *
     * @throws APIException
     */
    public function listProviders(
        array|SpeechToTextListProvidersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpeechToTextListProvidersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'speech-to-text/providers' : 'https://api.telnyx.com/v2/speech-to-text/providers';

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: $path,
            query: Util::array_transform_keys(
                $parsed,
                ['serviceType' => 'service_type']
            ),
            options: $options,
            convert: SpeechToTextListProvidersResponse::class,
        );
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
     * @param array{
     *   inputFormat: InputFormat|value-of<InputFormat>,
     *   transcriptionEngine: TranscriptionEngine|value-of<TranscriptionEngine>,
     *   endpointing?: int,
     *   interimResults?: bool,
     *   keyterm?: string,
     *   keywords?: string,
     *   language?: string,
     *   model?: value-of<Model>,
     *   redact?: string,
     * }|SpeechToTextRetrieveTranscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveTranscription(
        array|SpeechToTextRetrieveTranscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpeechToTextRetrieveTranscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $path = $this
            ->client
            ->baseUrlOverridden ? 'speech-to-text/transcription' : 'wss://api.telnyx.com/v2/speech-to-text/transcription';

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: $path,
            query: Util::array_transform_keys(
                $parsed,
                [
                    'inputFormat' => 'input_format',
                    'transcriptionEngine' => 'transcription_engine',
                    'interimResults' => 'interim_results',
                ],
            ),
            headers: ['Content-Type' => 'application/octet-stream'],
            options: $options,
            convert: null,
        );
    }
}
