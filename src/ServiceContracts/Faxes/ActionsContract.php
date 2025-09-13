<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Faxes;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Faxes\Actions\ActionCancelResponse;
use Telnyx\Faxes\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
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
     * @return ActionRefreshResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function refresh(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse;

    /**
     * @api
     *
     * @return ActionRefreshResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function refreshRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse;
}
