<?php

declare(strict_types=1);

namespace Telnyx\Services\Faxes;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Faxes\Actions\ActionCancelResponse;
use Telnyx\Faxes\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Faxes\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Cancel the outbound fax that is in one of the following states: `queued`, `media.processed`, `originated` or `sending`
     *
     * @throws APIException
     */
    public function cancel(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionCancelResponse {
        /** @var BaseResponse<ActionCancelResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['faxes/%1$s/actions/cancel', $id],
            options: $requestOptions,
            convert: ActionCancelResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Refreshes the inbound fax's media_url when it has expired
     *
     * @throws APIException
     */
    public function refresh(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse {
        /** @var BaseResponse<ActionRefreshResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['faxes/%1$s/actions/refresh', $id],
            options: $requestOptions,
            convert: ActionRefreshResponse::class,
        );

        return $response->parse();
    }
}
