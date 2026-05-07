<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\OpenAI\OpenAIListModelsResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface OpenAIContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listModels(
        RequestOptions|array|null $requestOptions = null
    ): OpenAIListModelsResponse;
}
