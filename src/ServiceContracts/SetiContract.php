<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;

interface SetiContract
{
    /**
     * @api
     *
     * @param array{
     *   product?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[product]
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResults(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): SetiGetBlackBoxTestResultsResponse;
}
