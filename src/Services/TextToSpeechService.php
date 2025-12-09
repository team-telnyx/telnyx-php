<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TextToSpeechContract;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

final class TextToSpeechService implements TextToSpeechContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Converts the provided text to speech using the specified voice and returns audio data
     *
     * @param array{
     *   text: string, voice: string
     * }|TextToSpeechGenerateSpeechParams $params
     *
     * @throws APIException
     */
    public function generateSpeech(
        array|TextToSpeechGenerateSpeechParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = TextToSpeechGenerateSpeechParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<string> */
        $response = $this->client->request(
            method: 'post',
            path: 'text-to-speech/speech',
            headers: ['Accept' => 'audio/mpeg'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of voices that can be used with the text to speech commands.
     *
     * @param array{
     *   elevenlabsAPIKeyRef?: string,
     *   provider?: 'aws'|'azure'|'elevenlabs'|'telnyx'|Provider,
     * }|TextToSpeechListVoicesParams $params
     *
     * @throws APIException
     */
    public function listVoices(
        array|TextToSpeechListVoicesParams $params,
        ?RequestOptions $requestOptions = null,
    ): TextToSpeechListVoicesResponse {
        [$parsed, $options] = TextToSpeechListVoicesParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<TextToSpeechListVoicesResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'text-to-speech/voices',
            query: Util::array_transform_keys(
                $parsed,
                ['elevenlabsAPIKeyRef' => 'elevenlabs_api_key_ref']
            ),
            options: $options,
            convert: TextToSpeechListVoicesResponse::class,
        );

        return $response->parse();
    }
}
