<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AI\AIGetModelsResponse;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AIContract
{
    /**
     * @api
     *
     * @return AIGetModelsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveModels(
        ?RequestOptions $requestOptions = null
    ): AIGetModelsResponse;

    /**
     * @api
     *
     * @return AIGetModelsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveModelsRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): AIGetModelsResponse;

    /**
     * @api
     *
     * @param string $bucket the name of the bucket that contains the file to be summarized
     * @param string $filename the name of the file to be summarized
     * @param string $systemPrompt a system prompt to guide the summary generation
     *
     * @return AISummarizeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function summarize(
        $bucket,
        $filename,
        $systemPrompt = omit,
        ?RequestOptions $requestOptions = null,
    ): AISummarizeResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AISummarizeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function summarizeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AISummarizeResponse;
}
