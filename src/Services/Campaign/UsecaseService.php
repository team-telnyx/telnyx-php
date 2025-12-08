<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostParams;
use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
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
     * @param array{usecase: string}|UsecaseGetCostParams $params
     *
     * @throws APIException
     */
    public function getCost(
        array|UsecaseGetCostParams $params,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse {
        [$parsed, $options] = UsecaseGetCostParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<UsecaseGetCostResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'campaign/usecase/cost',
            query: $parsed,
            options: $options,
            convert: UsecaseGetCostResponse::class,
        );

        return $response->parse();
    }
}
