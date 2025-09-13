<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return ActionActivateResponse<HasRawResponse>
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
     * @return ActionActivateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function activateRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionActivateResponse;

    /**
     * @api
     *
     * @return ActionCancelResponse<HasRawResponse>
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
     * @return ActionCancelResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function cancelRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionCancelResponse;

    /**
     * @api
     *
     * @return ActionConfirmResponse<HasRawResponse>
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
     * @return ActionConfirmResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function confirmRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionConfirmResponse;

    /**
     * @api
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
    ): ActionShareResponse;

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
    ): ActionShareResponse;
}
