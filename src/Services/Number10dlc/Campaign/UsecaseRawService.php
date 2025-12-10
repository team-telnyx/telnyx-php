<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc\Campaign;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Number10dlc\Campaign\Usecase\UsecaseRetrieveCostParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\Campaign\UsecaseRawContract;

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
     * @param array{usecase: string}|UsecaseRetrieveCostParams $params
     *
     * @return BaseResponse<UsecaseGetCostResponse>
     *
     * @throws APIException
     */
    public function retrieveCost(
        array|UsecaseRetrieveCostParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UsecaseRetrieveCostParams::parseRequest(
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
