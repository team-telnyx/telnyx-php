<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SetiContract
{
    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[product]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResults(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): SetiGetBlackBoxTestResultsResponse;
}
