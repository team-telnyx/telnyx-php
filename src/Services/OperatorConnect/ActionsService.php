<?php

declare(strict_types=1);

namespace Telnyx\Services\OperatorConnect;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OperatorConnect\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OperatorConnect\ActionsContract;

/**
 * External Connections operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * This endpoint will make an asynchronous request to refresh the Operator Connect integration with Microsoft Teams for the current user. This will create new external connections on the user's account if needed, and/or report the integration results as [log messages](https://developers.telnyx.com/api-reference/external-connections/list-all-log-messages#list-all-log-messages).
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refresh(
        RequestOptions|array|null $requestOptions = null
    ): ActionRefreshResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->refresh(requestOptions: $requestOptions);

        return $response->parse();
    }
}
