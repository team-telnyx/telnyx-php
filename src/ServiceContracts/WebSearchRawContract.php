<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WebSearch\WebSearchContentsParams;
use Telnyx\WebSearch\WebSearchContentsResponse;
use Telnyx\WebSearch\WebSearchCreateParams;
use Telnyx\WebSearch\WebSearchNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WebSearchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WebSearchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebSearchNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WebSearchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WebSearchContentsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebSearchContentsResponse>
     *
     * @throws APIException
     */
    public function contents(
        array|WebSearchContentsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
