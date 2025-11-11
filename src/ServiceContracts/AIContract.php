<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AI\AIGetModelsResponse;
use Telnyx\AI\AISummarizeParams;
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
     * @param array<mixed>|AISummarizeParams $params
     *
     * @throws APIException
     */
    public function summarize(
        array|AISummarizeParams $params,
        ?RequestOptions $requestOptions = null
    ): AISummarizeResponse;
}
