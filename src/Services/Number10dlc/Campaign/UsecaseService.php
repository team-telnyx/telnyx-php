<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc\Campaign;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Number10dlc\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\Campaign\UsecaseContract;

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
    public function retrieveCost(
        string $usecase,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse {
        $params = Util::removeNulls(['usecase' => $usecase]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveCost(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
