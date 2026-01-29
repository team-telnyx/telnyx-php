<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AI\AIGetModelsResponse;
use Telnyx\AI\AISummarizeParams;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AIRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AIRawService implements AIRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint returns a list of Open Source and OpenAI models that are available for use. <br /><br /> **Note**: Model `id`'s will be in the form `{source}/{model_name}`. For example `openai/gpt-4` or `mistralai/Mistral-7B-Instruct-v0.1` consistent with HuggingFace naming conventions.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AIGetModelsResponse>
     *
     * @throws APIException
     */
    public function retrieveModels(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/models',
            options: $requestOptions,
            convert: AIGetModelsResponse::class,
        );
    }

    /**
     * @api
     *
     * Generate a summary of a file's contents.
     *
     *  Supports the following text formats:
     * - PDF, HTML, txt, json, csv
     *
     *  Supports the following media formats (billed for both the transcription and summary):
     * - flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm
     * - Up to 100 MB
     *
     * @param array{
     *   bucket: string, filename: string, systemPrompt?: string
     * }|AISummarizeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AISummarizeResponse>
     *
     * @throws APIException
     */
    public function summarize(
        array|AISummarizeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AISummarizeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/summarize',
            body: (object) $parsed,
            options: $options,
            convert: AISummarizeResponse::class,
        );
    }
}
