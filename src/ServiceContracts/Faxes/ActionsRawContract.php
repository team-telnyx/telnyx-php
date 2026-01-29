<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Faxes;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Faxes\Actions\ActionCancelResponse;
use Telnyx\Faxes\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id the unique identifier of a fax
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
     * @param string $id the unique identifier of a fax
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRefreshResponse>
     *
     * @throws APIException
     */
    public function refresh(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
