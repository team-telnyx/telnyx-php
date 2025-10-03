<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostParams;
use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Campaign\UsecaseContract;

final class UsecaseService implements UsecaseContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Campaign Cost
     *
     * @param string $usecase
     *
     * @throws APIException
     */
    public function getCost(
        $usecase,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse {
        $params = ['usecase' => $usecase];

        return $this->getCostRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getCostRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse {
        [$parsed, $options] = UsecaseGetCostParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'campaign/usecase/cost',
            query: $parsed,
            options: $options,
            convert: UsecaseGetCostResponse::class,
        );
    }
}
