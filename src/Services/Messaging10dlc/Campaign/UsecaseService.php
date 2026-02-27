<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc\Campaign;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\Campaign\UsecaseContract;

/**
 * Campaign operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCost(
        string $usecase,
        RequestOptions|array|null $requestOptions = null
    ): UsecaseGetCostResponse {
        $params = Util::removeNulls(['usecase' => $usecase]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getCost(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
