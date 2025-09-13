<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Balance\BalanceGetResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BalanceContract;

final class BalanceService implements BalanceContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get user balance details
     *
     * @return BalanceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BalanceGetResponse {
        $params = [];

        return $this->retrieveRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @return BalanceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): BalanceGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'balance',
            options: $requestOptions,
            convert: BalanceGetResponse::class,
        );
    }
}
