<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingOrders\Actions\ActionActivateResponse;
use Telnyx\PortingOrders\Actions\ActionCancelResponse;
use Telnyx\PortingOrders\Actions\ActionConfirmResponse;
use Telnyx\PortingOrders\Actions\ActionShareParams;
use Telnyx\PortingOrders\Actions\ActionShareParams\Permissions;
use Telnyx\PortingOrders\Actions\ActionShareResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActionsContract;

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
     * Activate each number in a porting order asynchronously. This operation is limited to US FastPort orders only.
     *
     * @return ActionActivateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function activate(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionActivateResponse {
        $params = [];

        return $this->activateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ActionActivateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function activateRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionActivateResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/actions/activate', $id],
            options: $requestOptions,
            convert: ActionActivateResponse::class,
        );
    }

    /**
     * @api
     *
     * Cancel a porting order
     *
     * @return ActionCancelResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function cancel(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionCancelResponse {
        $params = [];

        return $this->cancelRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ActionCancelResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function cancelRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionCancelResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/actions/cancel', $id],
            options: $requestOptions,
            convert: ActionCancelResponse::class,
        );
    }

    /**
     * @api
     *
     * Confirm and submit your porting order.
     *
     * @return ActionConfirmResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function confirm(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionConfirmResponse {
        $params = [];

        return $this->confirmRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ActionConfirmResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function confirmRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionConfirmResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/actions/confirm', $id],
            options: $requestOptions,
            convert: ActionConfirmResponse::class,
        );
    }

    /**
     * @api
     *
     * Creates a sharing token for a porting order. The token can be used to share the porting order with non-Telnyx users.
     *
     * @param int $expiresInSeconds The number of seconds the token will be valid for
     * @param Permissions|value-of<Permissions> $permissions The permissions the token will have
     *
     * @return ActionShareResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function share(
        string $id,
        $expiresInSeconds = omit,
        $permissions = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionShareResponse {
        $params = [
            'expiresInSeconds' => $expiresInSeconds, 'permissions' => $permissions,
        ];

        return $this->shareRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionShareResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function shareRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionShareResponse {
        [$parsed, $options] = ActionShareParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/actions/share', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionShareResponse::class,
        );
    }
}
