<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ManagedAccounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\ManagedAccounts\Actions\ActionDisableResponse;
use Telnyx\ManagedAccounts\Actions\ActionEnableParams;
use Telnyx\ManagedAccounts\Actions\ActionEnableResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionEnableParams $params
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        array|ActionEnableParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionEnableResponse;
}
