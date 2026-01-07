<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ManagedAccounts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ManagedAccounts\Actions\ActionDisableResponse;
use Telnyx\ManagedAccounts\Actions\ActionEnableParams;
use Telnyx\ManagedAccounts\Actions\ActionEnableResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id Managed Account User ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionDisableResponse>
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Managed Account User ID
     * @param array<string,mixed>|ActionEnableParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionEnableResponse>
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        array|ActionEnableParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
