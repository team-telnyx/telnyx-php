<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Balance\BalanceGetResponse;
use Telnyx\Client;
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
     */
    public function retrieve(
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
