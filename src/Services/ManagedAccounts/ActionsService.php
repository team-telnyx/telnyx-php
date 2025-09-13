<?php

declare(strict_types=1);

namespace Telnyx\Services\ManagedAccounts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\ManagedAccounts\Actions\ActionDisableResponse;
use Telnyx\ManagedAccounts\Actions\ActionEnableParams;
use Telnyx\ManagedAccounts\Actions\ActionEnableResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ManagedAccounts\ActionsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @return ActionDisableResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse {
        $params = [];

        return $this->disableRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ActionDisableResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function disableRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['managed_accounts/%1$s/actions/disable', $id],
            options: $requestOptions,
            convert: ActionDisableResponse::class,
        );
    }

    /**
     * @api
     *
     * Enables a managed account and its sub-users to use Telnyx services.
     *
     * @param bool $reenableAllConnections When true, all connections owned by this managed account will automatically be re-enabled. Note: Any connections that do not pass validations will not be re-enabled.
     *
     * @return ActionEnableResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        $reenableAllConnections = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionEnableResponse {
        $params = ['reenableAllConnections' => $reenableAllConnections];

        return $this->enableRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionEnableResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function enableRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionEnableResponse {
        [$parsed, $options] = ActionEnableParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['managed_accounts/%1$s/actions/enable', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionEnableResponse::class,
        );
    }
}
