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
     *   * `file_transcription` — file-based transcription via `/ai/audio/transcriptions`.
     *   * `in_call_transcription` — live call transcription via Call Control `transcription_start`.
     *
     * Use this endpoint to discover which (provider, model) combinations are available for the surface you need, and which language codes each accepts. `auto` in a `languages` array indicates the provider performs language detection.
     *
     * @param Provider|value-of<Provider> $provider Filter to entries for a specific STT provider. The enum mirrors the providers advertised across the speech-to-text spec (including `google` and `telnyx`, which are accepted as WebSocket transcription engines). A provider that has no models currently registered for any service type will return an empty `data` array rather than an error.
     * @param ServiceType|value-of<ServiceType> $serviceType filter to entries that support the given service type
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
