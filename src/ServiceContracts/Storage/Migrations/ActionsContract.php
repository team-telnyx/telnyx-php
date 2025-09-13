<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Migrations;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Storage\Migrations\Actions\ActionStopResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @return ActionStopResponse<HasRawResponse>
     */
    public function stop(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionStopResponse;
}
