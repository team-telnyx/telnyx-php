<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SetiContract;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;

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
     * @param array{
     *   product?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[product]
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResults(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): SetiGetBlackBoxTestResultsResponse {
        $params = ['filter' => $filter];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveBlackBoxTestResults(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
