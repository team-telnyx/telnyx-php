<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AI\AIGetModelsResponse;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AIContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveModels(
        ?RequestOptions $requestOptions = null
    ): AIGetModelsResponse;

    /**
     * @api
     *
     * @param string $bucket the name of the bucket that contains the file to be summarized
     * @param string $filename the name of the file to be summarized
     * @param string $systemPrompt a system prompt to guide the summary generation
     *
     * @throws APIException
     */
    public function summarize(
        string $bucket,
        string $filename,
        ?string $systemPrompt = null,
        ?RequestOptions $requestOptions = null,
    ): AISummarizeResponse;
}
