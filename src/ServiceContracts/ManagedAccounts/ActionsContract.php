<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ManagedAccounts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\ManagedAccounts\Actions\ActionDisableResponse;
use Telnyx\ManagedAccounts\Actions\ActionEnableResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @return ActionDisableResponse<HasRawResponse>
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse;

    /**
     * @api
     *
     * @param bool $reenableAllConnections When true, all connections owned by this managed account will automatically be re-enabled. Note: Any connections that do not pass validations will not be re-enabled.
     *
     * @return ActionEnableResponse<HasRawResponse>
     */
    public function enable(
        string $id,
        $reenableAllConnections = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionEnableResponse;
}
