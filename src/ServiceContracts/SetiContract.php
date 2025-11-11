<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams;

interface SetiContract
{
    /**
     * @api
     *
     * @param array<mixed>|SetiRetrieveBlackBoxTestResultsParams $params
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResults(
        array|SetiRetrieveBlackBoxTestResultsParams $params,
        ?RequestOptions $requestOptions = null,
    ): SetiGetBlackBoxTestResultsResponse;
}
