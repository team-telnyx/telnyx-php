<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SpeechToTextContract;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\Provider;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\ServiceType;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse;

/**
 * Discover available speech-to-text providers, models, and supported languages.
 *
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
     * @param ServiceType|value-of<ServiceType> $serviceType Filter to entries that support the given service type. For backward compatibility with the values that briefly shipped before the product-aligned rename, the legacy aliases `file_transcription`, `in_call_transcription`, and `ai_assistant_transcription` are silently accepted and normalized to `file_based`, `in_call`, and `ai_assistant` respectively. The response always emits the canonical (post-rename) values.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listProviders(
        Provider|string|null $provider = null,
        ServiceType|string|null $serviceType = null,
        RequestOptions|array|null $requestOptions = null,
    ): SpeechToTextListProvidersResponse {
        $params = Util::removeNulls(
            ['provider' => $provider, 'serviceType' => $serviceType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listProviders(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
