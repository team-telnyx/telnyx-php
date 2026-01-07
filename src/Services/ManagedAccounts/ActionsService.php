<?php

declare(strict_types=1);

namespace Telnyx\Services\ManagedAccounts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\ManagedAccounts\Actions\ActionDisableResponse;
use Telnyx\ManagedAccounts\Actions\ActionEnableResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ManagedAccounts\ActionsContract;

/**
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
     * Disables a managed account, forbidding it to use Telnyx services, including sending or receiving phone calls and SMS messages. Ongoing phone calls will not be affected. The managed account and its sub-users will no longer be able to log in via the mission control portal.
     *
     * @param string $id Managed Account User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionDisableResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->disable($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Enables a managed account and its sub-users to use Telnyx services.
     *
     * @param string $id Managed Account User ID
     * @param bool $reenableAllConnections When true, all connections owned by this managed account will automatically be re-enabled. Note: Any connections that do not pass validations will not be re-enabled.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        bool $reenableAllConnections = false,
        RequestOptions|array|null $requestOptions = null,
    ): ActionEnableResponse {
        $params = Util::removeNulls(
            ['reenableAllConnections' => $reenableAllConnections]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->enable($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
