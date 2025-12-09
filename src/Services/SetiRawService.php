<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SetiRawContract;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams;

final class SetiRawService implements SetiRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the results of the various black box tests
     *
     * @param array{
     *   filter?: array{product?: string}
     * }|SetiRetrieveBlackBoxTestResultsParams $params
     *
     * @return BaseResponse<SetiGetBlackBoxTestResultsResponse>
     *
     * @throws APIException
     */
    public function retrieveBlackBoxTestResults(
        array|SetiRetrieveBlackBoxTestResultsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SetiRetrieveBlackBoxTestResultsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'seti/black_box_test_results',
            query: $parsed,
            options: $options,
            convert: SetiGetBlackBoxTestResultsResponse::class,
        );
    }
}
