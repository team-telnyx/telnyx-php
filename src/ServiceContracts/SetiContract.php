<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return SetiGetBlackBoxTestResultsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResults(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): SetiGetBlackBoxTestResultsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SetiGetBlackBoxTestResultsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResultsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SetiGetBlackBoxTestResultsResponse;
}
