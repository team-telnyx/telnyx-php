<?php

declare(strict_types=1);

namespace Telnyx\Services\ManagedAccounts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ManagedAccounts\Actions\ActionDisableResponse;
use Telnyx\ManagedAccounts\Actions\ActionEnableParams;
use Telnyx\ManagedAccounts\Actions\ActionEnableResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ManagedAccounts\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Disables a managed account, forbidding it to use Telnyx services, including sending or receiving phone calls and SMS messages. Ongoing phone calls will not be affected. The managed account and its sub-users will no longer be able to log in via the mission control portal.
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse {
        /** @var BaseResponse<ActionDisableResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['managed_accounts/%1$s/actions/disable', $id],
            options: $requestOptions,
            convert: ActionDisableResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Enables a managed account and its sub-users to use Telnyx services.
     *
     * @param array{reenableAllConnections?: bool}|ActionEnableParams $params
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        array|ActionEnableParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionEnableResponse {
        [$parsed, $options] = ActionEnableParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ActionEnableResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['managed_accounts/%1$s/actions/enable', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionEnableResponse::class,
        );

        return $response->parse();
    }
}
