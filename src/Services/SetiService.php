<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SetiContract;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter;

use const Telnyx\Core\OMIT as omit;

final class SetiService implements SetiContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the results of the various black box tests
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
    ): SetiGetBlackBoxTestResultsResponse {
        $params = ['filter' => $filter];

        return $this->retrieveBlackBoxTestResultsRaw($params, $requestOptions);
    }

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
    ): SetiGetBlackBoxTestResultsResponse {
        [$parsed, $options] = SetiRetrieveBlackBoxTestResultsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'seti/black_box_test_results',
            query: $parsed,
            options: $options,
            convert: SetiGetBlackBoxTestResultsResponse::class,
        );
    }
}
