<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Audio\AudioTranscribeParams;
use Telnyx\AI\Audio\AudioTranscribeResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\AudioContract;

final class AudioService implements AudioContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Transcribe speech to text. This endpoint is consistent with the [OpenAI Transcription API](https://platform.openai.com/docs/api-reference/audio/createTranscription) and may be used with the OpenAI JS or Python SDK.
     *
     * @param array{
     *   model: "distil-whisper/distil-large-v2"|"openai/whisper-large-v3-turbo",
     *   file?: string,
     *   file_url?: string,
     *   response_format?: "json"|"verbose_json",
     *   timestamp_granularities__?: "segment",
     * }|AudioTranscribeParams $params
     *
     * @throws APIException
     */
    public function transcribe(
        array|AudioTranscribeParams $params,
        ?RequestOptions $requestOptions = null
    ): AudioTranscribeResponse {
        [$parsed, $options] = AudioTranscribeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/audio/transcriptions',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: AudioTranscribeResponse::class,
        );
    }
}
