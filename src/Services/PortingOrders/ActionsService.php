<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
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
     */
    public function activate(
        string $id,
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
     */
    public function cancel(
        string $id,
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
     */
    public function confirm(
        string $id,
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
     */
    public function share(
        string $id,
        $expiresInSeconds = omit,
        $permissions = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionShareResponse {
        [$parsed, $options] = ActionShareParams::parseRequest(
            ['expiresInSeconds' => $expiresInSeconds, 'permissions' => $permissions],
            $requestOptions,
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
