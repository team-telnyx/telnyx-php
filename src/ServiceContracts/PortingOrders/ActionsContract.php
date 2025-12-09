<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\Actions\ActionActivateResponse;
use Telnyx\PortingOrders\Actions\ActionCancelResponse;
use Telnyx\PortingOrders\Actions\ActionConfirmResponse;
use Telnyx\PortingOrders\Actions\ActionShareParams\Permissions;
use Telnyx\PortingOrders\Actions\ActionShareResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @throws APIException
     */
    public function activate(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionActivateResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @throws APIException
     */
    public function cancel(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionCancelResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @throws APIException
     */
    public function confirm(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionConfirmResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param int $expiresInSeconds The number of seconds the token will be valid for
     * @param 'porting_order.document.read'|'porting_order.document.update'|Permissions $permissions The permissions the token will have
     *
     * @throws APIException
     */
    public function share(
        string $id,
        ?int $expiresInSeconds = null,
        string|Permissions|null $permissions = null,
        ?RequestOptions $requestOptions = null,
    ): ActionShareResponse;
}
