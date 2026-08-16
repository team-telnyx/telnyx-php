<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\WebSearch;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WebSearch\Research\ResearchCreateParams;
use Telnyx\WebSearch\Research\ResearchGetResponse;
use Telnyx\WebSearch\Research\ResearchNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ResearchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ResearchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ResearchNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ResearchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $taskID the research task ID returned by `POST /web_search/research` with `background: true`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ResearchGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
