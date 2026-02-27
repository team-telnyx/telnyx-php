<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SetiContract;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter;

/**
 * Observability into Telnyx platform stability and performance.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SetiService implements SetiContract
{
    /**
     * @api
     */
    public SetiRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SetiRawService($client);
    }

    /**
     * @api
     *
     * Returns the results of the various black box tests
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[product]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResults(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): SetiGetBlackBoxTestResultsResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveBlackBoxTestResults(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
