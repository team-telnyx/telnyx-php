<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BotChallenge\BotChallengeNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BotChallengeContract
{
    /**
     * @api
     *
     * @param string $llmModelName name of the LLM the client is using
     * @param string $llmParameterCount parameter count of the client LLM
     * @param string $llmQuantization quantization of the client LLM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $llmModelName = null,
        ?string $llmParameterCount = null,
        ?string $llmQuantization = null,
        RequestOptions|array|null $requestOptions = null,
    ): BotChallengeNewResponse;
}
