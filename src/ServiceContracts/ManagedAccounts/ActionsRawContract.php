<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ManagedAccounts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ManagedAccounts\Actions\ActionDisableResponse;
use Telnyx\ManagedAccounts\Actions\ActionEnableParams;
use Telnyx\ManagedAccounts\Actions\ActionEnableResponse;
use Telnyx\RequestOptions;

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id Managed Account User ID
     *
     * @return BaseResponse<ActionDisableResponse>
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Managed Account User ID
     * @param array<mixed>|ActionEnableParams $params
     *
     * @return BaseResponse<ActionEnableResponse>
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        array|ActionEnableParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
