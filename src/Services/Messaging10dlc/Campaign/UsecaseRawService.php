<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc\Campaign;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Campaign\Usecase\UsecaseGetCostParams;
use Telnyx\Messaging10dlc\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\Campaign\UsecaseRawContract;

final class UsecaseRawService implements UsecaseRawContract
{
    // @phpstan-ignore-next-line
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
     * @return BaseResponse<UsecaseGetCostResponse>
     *
     * @throws APIException
     */
    public function getCost(
        array|UsecaseGetCostParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = UsecaseGetCostParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: '10dlc/campaign/usecase/cost',
            query: $parsed,
            options: $options,
            convert: UsecaseGetCostResponse::class,
        );
    }
}
