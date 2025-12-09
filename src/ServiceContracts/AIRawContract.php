<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AI\AIGetModelsResponse;
use Telnyx\AI\AISummarizeParams;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AIRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<AIGetModelsResponse>
     *
     * @throws APIException
     */
    public function retrieveModels(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AISummarizeParams $params
     *
     * @return BaseResponse<AISummarizeResponse>
     *
     * @throws APIException
     */
    public function summarize(
        array|AISummarizeParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
