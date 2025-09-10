<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Faxes;

use Telnyx\Faxes\Actions\ActionCancelResponse;
use Telnyx\Faxes\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
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
    public function refresh(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse;
}
