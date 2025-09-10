<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter;

use const Telnyx\Core\OMIT as omit;

interface SetiContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[product]
     */
    public function retrieveBlackBoxTestResults(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): SetiGetBlackBoxTestResultsResponse;
}
