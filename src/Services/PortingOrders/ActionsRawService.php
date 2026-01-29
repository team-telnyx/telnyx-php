<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\Actions\ActionActivateResponse;
use Telnyx\PortingOrders\Actions\ActionCancelResponse;
use Telnyx\PortingOrders\Actions\ActionConfirmResponse;
use Telnyx\PortingOrders\Actions\ActionShareParams;
use Telnyx\PortingOrders\Actions\ActionShareParams\Permissions;
use Telnyx\PortingOrders\Actions\ActionShareResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\ActionsRawContract;

/**
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
     * Activate each number in a porting order asynchronously. This operation is limited to US FastPort orders only.
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionActivateResponse>
     *
     * @throws APIException
     */
    public function activate(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionCancelResponse>
     *
     * @throws APIException
     */
    public function cancel(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionConfirmResponse>
     *
     * @throws APIException
     */
    public function confirm(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id Porting Order id
     * @param array{
     *   expiresInSeconds?: int, permissions?: Permissions|value-of<Permissions>
     * }|ActionShareParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionShareResponse>
     *
     * @throws APIException
     */
    public function share(
        string $id,
        array|ActionShareParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionShareParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/actions/share', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionShareResponse::class,
        );
    }
}
