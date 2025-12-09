<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Balance\BalanceGetResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BalanceContract;

final class BalanceService implements BalanceContract
{
    /**
     * @api
     */
    public BalanceRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BalanceRawService($client);
    }

    /**
     * @api
     *
     * Get user balance details
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BalanceGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(requestOptions: $requestOptions);

        return $response->parse();
    }
}
