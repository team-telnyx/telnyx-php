<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     */
    public function retrieveBlackBoxTestResults(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): SetiGetBlackBoxTestResultsResponse {
        [$parsed, $options] = SetiRetrieveBlackBoxTestResultsParams::parseRequest(
            ['filter' => $filter],
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
