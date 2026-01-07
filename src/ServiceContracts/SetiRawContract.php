<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SetiRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SetiRetrieveBlackBoxTestResultsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SetiGetBlackBoxTestResultsResponse>
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResults(
        array|SetiRetrieveBlackBoxTestResultsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
