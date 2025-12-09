<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams;

interface SetiRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|SetiRetrieveBlackBoxTestResultsParams $params
     *
     * @return BaseResponse<SetiGetBlackBoxTestResultsResponse>
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResults(
        array|SetiRetrieveBlackBoxTestResultsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
