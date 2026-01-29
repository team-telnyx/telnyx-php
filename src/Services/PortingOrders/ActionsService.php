<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\PortingOrders\Actions\ActionActivateResponse;
use Telnyx\PortingOrders\Actions\ActionCancelResponse;
use Telnyx\PortingOrders\Actions\ActionConfirmResponse;
use Telnyx\PortingOrders\Actions\ActionShareParams\Permissions;
use Telnyx\PortingOrders\Actions\ActionShareResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActionsContract;

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
     * Activate each number in a porting order asynchronously. This operation is limited to US FastPort orders only.
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function activate(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionActivateResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->activate($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Cancel a porting order
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionCancelResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Confirm and submit your porting order.
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function confirm(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionConfirmResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->confirm($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates a sharing token for a porting order. The token can be used to share the porting order with non-Telnyx users.
     *
     * @param string $id Porting Order id
     * @param int $expiresInSeconds The number of seconds the token will be valid for
     * @param Permissions|value-of<Permissions> $permissions The permissions the token will have
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function share(
        string $id,
        ?int $expiresInSeconds = null,
        Permissions|string|null $permissions = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionShareResponse {
        $params = Util::removeNulls(
            ['expiresInSeconds' => $expiresInSeconds, 'permissions' => $permissions]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->share($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
