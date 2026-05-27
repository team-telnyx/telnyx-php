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
use Telnyx\SpeechToText\SpeechToTextListProvidersParams\ServiceType;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse;

/**
 * Discover available speech-to-text providers, models, and supported languages.
 *
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
     *   * `file_transcription` — file-based transcription via `/ai/audio/transcriptions`.
     *   * `in_call_transcription` — live call transcription via Call Control `transcription_start`.
     *
     * Use this endpoint to discover which (provider, model) combinations are available for the surface you need, and which language codes each accepts. `auto` in a `languages` array indicates the provider performs language detection.
     *
     * @param array{
     *   provider?: value-of<Provider>, serviceType?: ServiceType|value-of<ServiceType>
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
}
