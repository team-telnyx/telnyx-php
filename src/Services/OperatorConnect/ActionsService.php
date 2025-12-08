<?php

declare(strict_types=1);

namespace Telnyx\Services\OperatorConnect;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OperatorConnect\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OperatorConnect\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint will make an asynchronous request to refresh the Operator Connect integration with Microsoft Teams for the current user. This will create new external connections on the user's account if needed, and/or report the integration results as [log messages](https://developers.telnyx.com/api/external-voice-integrations/list-external-connection-log-messages).
     *
     * @throws APIException
     */
    public function refresh(
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse {
        /** @var BaseResponse<ActionRefreshResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'operator_connect/actions/refresh',
            options: $requestOptions,
            convert: ActionRefreshResponse::class,
        );

        return $response->parse();
    }
}
