<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\PortingOrders\Actions\ActionActivateResponse;
use Telnyx\PortingOrders\Actions\ActionCancelResponse;
use Telnyx\PortingOrders\Actions\ActionConfirmResponse;
use Telnyx\PortingOrders\Actions\ActionShareParams\Permissions;
use Telnyx\PortingOrders\Actions\ActionShareResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     */
    public function activate(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionActivateResponse;

    /**
     * @api
     */
    public function cancel(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionCancelResponse;

    /**
     * @api
     */
    public function confirm(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionConfirmResponse;

    /**
     * @api
     *
     * @param int $expiresInSeconds The number of seconds the token will be valid for
     * @param Permissions|value-of<Permissions> $permissions The permissions the token will have
     */
    public function share(
        string $id,
        $expiresInSeconds = omit,
        $permissions = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionShareResponse;
}
