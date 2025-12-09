<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Campaign\UsecaseContract;

final class UsecaseService implements UsecaseContract
{
    /**
     * @api
     */
    public UsecaseRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsecaseRawService($client);
    }

    /**
     * @api
     *
     * Get Campaign Cost
     *
     * @throws APIException
     */
    public function getCost(
        string $usecase,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse {
        $params = ['usecase' => $usecase];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getCost(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
