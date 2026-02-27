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
use Telnyx\ServiceContracts\ManagedAccounts\ActionsRawContract;

/**
 * Managed Accounts operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Disables a managed account, forbidding it to use Telnyx services, including sending or receiving phone calls and SMS messages. Ongoing phone calls will not be affected. The managed account and its sub-users will no longer be able to log in via the mission control portal.
     *
     * @param string $id Managed Account User ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionDisableResponse>
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id Managed Account User ID
     * @param array{reenableAllConnections?: bool}|ActionEnableParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionEnableResponse>
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        array|ActionEnableParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionEnableParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['managed_accounts/%1$s/actions/enable', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionEnableResponse::class,
        );
    }
}
