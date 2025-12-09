<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Migrations;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Migrations\Actions\ActionStopResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id unique identifier for the data migration
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionStopResponse;
}
