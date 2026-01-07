<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AI\AIGetModelsResponse;
use Telnyx\AI\AISummarizeParams;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AIRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AIGetModelsResponse>
     *
     * @throws APIException
     */
    public function retrieveModels(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AISummarizeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AISummarizeResponse>
     *
     * @throws APIException
     */
    public function summarize(
        array|AISummarizeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
