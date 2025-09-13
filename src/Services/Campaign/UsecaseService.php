<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostParams;
use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return UsecaseGetCostResponse<HasRawResponse>
     */
    public function getCost(
        $usecase,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse {
        [$parsed, $options] = UsecaseGetCostParams::parseRequest(
            ['usecase' => $usecase],
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
