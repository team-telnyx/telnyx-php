<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AI\AIGetModelsResponse;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AIContract
{
    /**
     * @api
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
     */
    public function summarize(
        $bucket,
        $filename,
        $systemPrompt = omit,
        ?RequestOptions $requestOptions = null,
    ): AISummarizeResponse;
}
