<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Faxes;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Faxes\Actions\ActionCancelResponse;
use Telnyx\Faxes\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id the unique identifier of a fax
     *
     * @return BaseResponse<ActionCancelResponse>
     *
     * @throws APIException
     */
    public function cancel(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the unique identifier of a fax
     *
     * @return BaseResponse<ActionRefreshResponse>
     *
     * @throws APIException
     */
    public function refresh(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
