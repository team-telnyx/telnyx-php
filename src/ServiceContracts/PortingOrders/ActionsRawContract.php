<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\Actions\ActionActivateResponse;
use Telnyx\PortingOrders\Actions\ActionCancelResponse;
use Telnyx\PortingOrders\Actions\ActionConfirmResponse;
use Telnyx\PortingOrders\Actions\ActionShareParams;
use Telnyx\PortingOrders\Actions\ActionShareResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|ActionShareParams $params
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
    ): BaseResponse;
}
